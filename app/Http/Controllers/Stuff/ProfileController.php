<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stuff\Profile\EditRequest;
// use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function showEditProfile ()
    {
        return view('stuffs.edit_profile_form')
            // ->with('employee', Auth::employee());
            ->with('employee', Auth::user());
            // ->with('user', Auth::user());
    }

    /*
     Request formのバリデーションチェックを行う
     ValidationをControllerのMethodから切り離し、Validation専用のファイルを作り処理
     Controllerの処理記述量が減り、Validationの処理も別のファイルで管理→各々の処理がシンプルに記述することが可能
     */

    public function editProfile(EditRequest $request)
    {
        $employee = Auth::user();

        $employee->name = $request->input('name');

        // avatarが存在するかチェック
        if ($request->has('avatar')) {
            $fileName = $this->saveAvatar($request->file('avatar'));
            $employee->avatar_file_name = $fileName;
        }

        $employee->save();

        return redirect()->back()
            ->with('status', 'プロフィールを変更しました。');

    }

    /**
      * 画像をリサイズして保存
      * @param UploadedFile $file アップロードされたアバター画像
      * @return string ファイル名
    */

    /**
      * Laravelのデフォルト設定で、外部に公開するためにデータを保存すると...
      * "storage/app/public"
      * という風に、storageディレクトリの中が参照され、そこへデータが保存されるようになっています。
      * disk→データを保存する
      * Laravelでは"public"と呼ばれるディレクトリが二つある("public", "storage/app/public")
      * "public"にはロゴ画像やデザイン用のファイルなど、サービス側のリソースを配置する
      * "storage/app/public"にはユーザーが投稿した画像等のリソースを配置する
      * デフォルト設定で、Laravelのアプリのデータ保存先は"storage/app/public"になっている
    */

    private function saveAvatar (UploadedFile $file)
    {
        // 一時ファイル保存パス作成
        $tempPath = $this->makeTempPath();

        Image::make($file)->fit(200, 200)->save($tempPath);

        // 利用者が閲覧できる画像をローカルに保存したいため、publicディスクを指定
        $filePath = Storage::disk('public')
            // storage/app/public/avatarsに画像ファイルを保存
            ->putFile('avatars', new File($tempPath));
var_dump($filePath);
        return basename($filePath);
    }

    /**
     * 一時的なファイルパスを生成
    *
    * @return string ファイルパス
    **/

    private function makeTempPath()
    {
        $tmpFp = tmpfile();
        $meta = stream_get_meta_data($tmpFp);
        return $meta['uri'];
    }






}
