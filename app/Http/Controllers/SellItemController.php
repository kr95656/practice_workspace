<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use App\Models\PlaceOfOrigin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SellItemController extends Controller
{
    public function showItemRegisterForm ()
    {
        $categories = PrimaryCategory::orderBy('sort_no')->get();
        $conditions = ItemCondition::orderBy('sort_no')->get();
        $place_of_origin = PlaceOfOrigin::orderBy('sort_no')->get();

        return view('sell_item')
            ->with('conditions', $conditions)
            ->with('categories', $categories)
            ->with('place_of_origins', $place_of_origin);
    }








    // CSV登録
    public function showItemCsvRegisterForm ()
    {
        return view('sell_item_csv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function ItemCsvRegister (Request $request)
    {
        $item = new Item();

        $validator = $this->validateUploadFile($request);

        // アップロードファイルに対してのバリデート
        if ($validator->fails() === true) {
            return redirect('sell_item_csv_register')
                ->with('message', $validator->errors()->first('csv_file'));
        }

        // CSVファイルをサーバーに保存
        $temporary_csv_file = $request->file('csv_file')->store('csv');

        // ファイルを開く
        $fp = fopen(storage_path('app/') . $temporary_csv_file, 'r') or exit("{$temporary_csv_file}をひらけませんでした。もう一度ファイルがcsvで保存されているか確認してください。");

        // 一行目（ヘッダ）読み込み
        $headers = fgetcsv($fp);

        $column_names = [];

        // CSVヘッダ(カラム)確認
        // ファイルをCSVのカンマ区切りで保存する
        foreach ($headers as $header) {
            $result = Item::retrieveTestColumnsByValue($header, 'SJIS-win');

            if ($result === null) {
                fclose($fp);
                Storage::delete($temporary_csv_file);
                return redirect('sell_item_csv_register')
                    ->with('message', '登録に失敗しました。CSVファイルのフォーマットが正しいことを確認してださい。');
            }

            $column_names[] = $result;
        }

        $registration_errors_list = [];
        $update_errors_list       = [];
        $i = 0;

        // TODO:サイズが大きいCSVファイルを読み込む場合、この処理ではメモリ不足になる可能性がある為改修が必要になる
        while ($row = fgetcsv($fp)) {

            // Excelで編集されるのが多いと思うのでSJIS-win→UTF-8へエンコード
            mb_convert_variables('UTF-8', 'SJIS-win', $row);
            $is_registration_row = false;

            foreach ($column_names as $column_no => $column_name) {

                // idがなければ登録、あれば更新と判断
                if ($column_name === 'id' && $row[$column_no] === '') {
                    $is_registration_row = true;
                }

                // 新規登録か更新かのチェック
                if($is_registration_row === true){
                    if ($column_name !== 'id') {
                        // 新規登録リスト
                        $registration_csv_list[$i][$column_name] = $row[$column_no] === '' ? null : $row[$column_no];
                    }

                } else {
                    // 更新用リスト
                    $update_csv_list[$i][$column_name] = $row[$column_no] === '' ? null : $row[$column_no];
                }

            }

            // バリデーションチェック
            $validator = Validator::make(
                $is_registration_row === true ? $registration_csv_list[$i] : $update_csv_list[$i], //第1引数
                $this->defineValidationRules(), //第2引数
                $this->defineValidationMessages() //第3引数
            );

            if ($validator->fails() === true) {
                if ($is_registration_row === true) {
                    $registration_errors_list[$i + 2] = $validator->errors()->all();
                } else {
                    $update_errors_list[$i + 2] = $validator->errors()->all();
                }
            }

            $i++;
        }

        // バリデーションエラーチェック
        if (count($registration_errors_list) > 0 || count($update_errors_list) > 0) {
            return redirect('sell_item_csv_register')
                ->with('errors', ['registration_errors' => $registration_errors_list, 'update_errors' => $update_errors_list]);
        }

        // 既存更新処理(update)
        if (isset($update_csv_list) === true) {
            foreach ($update_csv_list as $update_csv) {
                // ～更新用の処理～
                if ($item->find($update_csv['id'])) {
                    $item::where('id', $update_csv['id'])
                        ->update([
                            'name' => $update_csv['name'],
                            'price' => $update_csv['price'],
                        ]);
                }
            }
        }

        // // 新規登録処理(create)
        if (isset($registration_csv_list) === true) {
            foreach ($registration_csv_list as $registration_csv) {
                if ($item->create($registration_csv) === false) {
                    return redirect('sell_item_csv_register')->with('message', '新規登録処理に失敗しました。');
                }
            }
        }

        return redirect('sell_item_csv_register')->with('message', 'CSV登録が完了しました。' );

    }

    /**
     * アップロードファイルのバリデート
     * （※本来はFormRequestClassで行うべき）
     *
     * @param Request $request
     * @return Illuminate\Validation\Validator
     */
    private function validateUploadFile(Request $request)
    {
        // return \Validator::make($request->all(), [
        return Validator::make($request->all(), [
                'csv_file' => 'required|file|mimetypes:text/plain|mimes:csv,txt',
            ], [
                'csv_file.required'  => 'ファイルを選択してください。',
                'csv_file.file'      => 'ファイルアップロードに失敗しました。',
                'csv_file.mimetypes' => 'ファイル形式が不正です。',
                'csv_file.mimes'     => 'ファイル拡張子が異なります。',
            ]
        );
    }

    /**
     * バリデーションの定義
     *
     * @return array
     */
    private function defineValidationRules()
    {
        return [
            // CSVデータ用バリデーションルール
            // 'content' => 'required',
            'name' => 'required',
            'price' => 'required',
        ];
    }

    /**
     * バリデーションメッセージの定義
     *
     * @return array
     */
    private function defineValidationMessages()
    {
        return [
            // CSVデータ用バリデーションエラーメッセージ
            'name.required' => '内容を入力してください。',
            'price.required' => '値段を入力してください。',
        ];
    }
}
