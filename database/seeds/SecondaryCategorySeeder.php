<?php

use App\Models\SecondaryCategory;
use Illuminate\Database\Seeder;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 牛
        factory(SecondaryCategory::class)->create([
            'id'                  => 1,
            'name'                => 'うで',
            'sort_no'             => 1,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 2,
            'name'                => '肩ロース',
            'sort_no'             => 2,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 3,
            'name'                => 'ばら',
            'sort_no'             => 3,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 4,
            'name'                => 'サーロイン',
            'sort_no'             => 4,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 5,
            'name'                => 'すね',
            'sort_no'             => 5,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 6,
            'name'                => 'リブロース',
            'sort_no'             => 6,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 7,
            'name'                => 'ロース',
            'sort_no'             => 7,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 8,
            'name'                => 'らんいち',
            'sort_no'             => 8,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 9,
            'name'                => 'もも',
            'sort_no'             => 9,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 10,
            'name'                => 'ホルモン',
            'sort_no'             => 10,
            'primary_category_id' => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 11,
            'name'                => 'その他',
            'sort_no'             => 11,
            'primary_category_id' => 1,
        ]);

        // 豚
        factory(SecondaryCategory::class)->create([
            'id'                  => 12,
            'name'                => 'うで',
            'sort_no'             => 12,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 13,
            'name'                => '肩ロース',
            'sort_no'             => 13,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 14,
            'name'                => 'ばら',
            'sort_no'             => 14,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 15,
            'name'                => 'すね',
            'sort_no'             => 15,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 16,
            'name'                => 'ロース',
            'sort_no'             => 16,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 17,
            'name'                => 'らんいち',
            'sort_no'             => 17,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 18,
            'name'                => 'もも',
            'sort_no'             => 18,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 19,
            'name'                => 'ホルモン',
            'sort_no'             => 19,
            'primary_category_id' => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 20,
            'name'                => 'その他',
            'sort_no'             => 20,
            'primary_category_id' => 2,
        ]);

        //鶏
         // 豚
         factory(SecondaryCategory::class)->create([
            'id'                  => 21,
            'name'                => '胸',
            'sort_no'             => 21,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 22,
            'name'                => 'もも',
            'sort_no'             => 22,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 23,
            'name'                => '手羽先',
            'sort_no'             => 23,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 24,
            'name'                => 'ネック',
            'sort_no'             => 24,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 25,
            'name'                => 'やげんなんこつ',
            'sort_no'             => 25,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 26,
            'name'                => '肝',
            'sort_no'             => 26,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 27,
            'name'                => '砂ずり',
            'sort_no'             => 27,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 28,
            'name'                => 'はつ',
            'sort_no'             => 28,
            'primary_category_id' => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 29,
            'name'                => 'その他',
            'sort_no'             => 29,
            'primary_category_id' => 3,
        ]);

        // その他
        factory(SecondaryCategory::class)->create([
            'id'                  => 30,
            'name'                => '加工品',
            'sort_no'             => 30,
            'primary_category_id' => 4,
        ]);


    }

    // 子カテゴリとは独立させる
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 1,
    //         'name'                => 'うで',
    //         'sort_no'             => 1,
    //         'primary_category_id' => 1,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 2,
    //         'name'                => '肩ロース',
    //         'sort_no'             => 2,
    //         'primary_category_id' => 1,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 3,
    //         'name'                => 'ばら',
    //         'sort_no'             => 3,
    //         'primary_category_id' => 1,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 4,
    //         'name'                => 'サーロイン',
    //         'sort_no'             => 4,
    //         'primary_category_id' => 2,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 5,
    //         'name'                => 'すね',
    //         'sort_no'             => 5,
    //         'primary_category_id' => 2,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 6,
    //         'name'                => 'リブロース',
    //         'sort_no'             => 6,
    //         'primary_category_id' => 2,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 7,
    //         'name'                => 'ロース',
    //         'sort_no'             => 7,
    //         'primary_category_id' => 3,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 8,
    //         'name'                => 'らんいち',
    //         'sort_no'             => 8,
    //         'primary_category_id' => 3,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 9,
    //         'name'                => 'もも',
    //         'sort_no'             => 9,
    //         'primary_category_id' => 3,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 10,
    //         'name'                => 'ホルモン',
    //         'sort_no'             => 10,
    //         'primary_category_id' => 3,
    //     ]);
    //     factory(SecondaryCategory::class)->create([
    //         'id'                  => 11,
    //         'name'                => 'その他',
    //         'sort_no'             => 11,
    //         'primary_category_id' => 4,
    //     ]);
    // }
}
