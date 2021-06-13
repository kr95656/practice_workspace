<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // 在庫あり
    const STATE_IN_STOCK = 'in_stock';
    // 在庫なし
    const STATE_OUT_OF_STOCK = 'out_of_stock';

    // 在庫ありなしのアクセサ
    public function getIsStateSellingAttribute ()
    {
        return $this->state === self::STATE_IN_STOCK;
    }

    public function secondaryCategory()
    {
        return $this->belongsTo(SecondaryCategory::class);
    }

    public function placeOfOrigin()
    {
        return $this->belongsTo(PlaceOfOrigin::class);
    }

    public function secondaryKind()
    {
        return $this->belongsTo(SecondaryKind::class);
    }

    protected $fillable = ['id', 'name', 'price'];

    public static function retrieveTestColumnsByValue (string $header ,string $encoding)
    {
        // CSVヘッダとテーブルのカラムを関連付けておく
        $list = [
            'id' => "id",
            'name' => "name",
            'price' => "price",
        ];

        $header = mb_convert_encoding($header, "SJIS-win", "auto");

        foreach ($list as $key => $value) {
            if ($header === mb_convert_encoding($value, $encoding)) {
                return $key;
            }
        }
        return null;
    }
}
