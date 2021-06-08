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
        factory(SecondaryCategory::class)->create([
            'id'                  => 1,
            'name'                => 'うで',
            'sort_no'             => 1,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 2,
            'name'                => '肩ロース',
            'sort_no'             => 2,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 3,
            'name'                => 'ばら',
            'sort_no'             => 3,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 4,
            'name'                => 'サーロイン',
            'sort_no'             => 4,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 5,
            'name'                => 'すね',
            'sort_no'             => 5,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 6,
            'name'                => 'リブロース',
            'sort_no'             => 6,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 7,
            'name'                => 'ロース',
            'sort_no'             => 7,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 8,
            'name'                => 'らんいち',
            'sort_no'             => 8,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 9,
            'name'                => 'もも',
            'sort_no'             => 9,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 10,
            'name'                => 'ホルモン',
            'sort_no'             => 10,
        ]);
        factory(SecondaryCategory::class)->create([
            'id'                  => 11,
            'name'                => 'その他',
            'sort_no'             => 11,
        ]);
    }

    // 子カテゴリ
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
