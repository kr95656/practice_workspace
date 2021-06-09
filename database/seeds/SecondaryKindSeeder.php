<?php

use App\Models\SecondaryKind;
use Illuminate\Database\Seeder;

class SecondaryKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 牛の品種
        factory(SecondaryKind::class)->create([
            'id'                  => 1,
            'name'                => '黒毛和種',
            'sort_no'             => 1,
            'primary_kind_id' => 1,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 2,
            'name'                => '褐毛和種',
            'sort_no'             => 2,
            'primary_kind_id' => 1,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 3,
            'name'                => '無角和種',
            'sort_no'             => 3,
            'primary_kind_id' => 1,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 4,
            'name'                => '日本短角種',
            'sort_no'             => 4,
            'primary_kind_id' => 1,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 5,
            'name'                => 'ホルスタイン',
            'sort_no'             => 5,
            'primary_kind_id' => 1,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 6,
            'name'                => '交雑種',
            'sort_no'             => 6,
            'primary_kind_id' => 1,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 7,
            'name'                => '銘柄種',
            'sort_no'             => 7,
            'primary_kind_id' => 1,
        ]);

        // 豚の品種
        factory(SecondaryKind::class)->create([
            'id'                  => 8,
            'name'                => '白豚',
            'sort_no'             => 8,
            'primary_kind_id' => 2,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 9,
            'name'                => '黒豚',
            'sort_no'             => 9,
            'primary_kind_id' => 2,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 10,
            'name'                => '銘柄種',
            'sort_no'             => 10,
            'primary_kind_id' => 2,
        ]);

        // factory(SecondaryKind::class)->create([
        //     'id'                  => 7,
        //     'name'                => '大ヨークシャー種',
        //     'sort_no'             => 7,
        //     'primary_kind_id' => 2,
        // ]);

        // factory(SecondaryKind::class)->create([
        //     'id'                  => 8,
        //     'name'                => 'ランドレース種',
        //     'sort_no'             => 8,
        //     'primary_kind_id' => 2,
        // ]);

        // factory(SecondaryKind::class)->create([
        //     'id'                  => 9,
        //     'name'                => 'デュロック種',
        //     'sort_no'             => 9,
        //     'primary_kind_id' => 2,
        // ]);

        // factory(SecondaryKind::class)->create([
        //     'id'                  => 10,
        //     'name'                => 'バークシャー種',
        //     'sort_no'             => 10,
        //     'primary_kind_id' => 2,
        // ]);

        // factory(SecondaryKind::class)->create([
        //     'id'                  => 11,
        //     'name'                => 'ハンプシャー種',
        //     'sort_no'             => 11,
        //     'primary_kind_id' => 2,
        // ]);

        //鶏の品種
        factory(SecondaryKind::class)->create([
            'id'                  => 11,
            'name'                => 'ブロイラー',
            'sort_no'             => 11,
            'primary_kind_id' => 3,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 12,
            'name'                => 'レイヤー',
            'sort_no'             => 12,
            'primary_kind_id' => 3,
        ]);

        factory(SecondaryKind::class)->create([
            'id'                  => 13,
            'name'                => '銘柄種',
            'sort_no'             => 13,
            'primary_kind_id' => 3,
        ]);
    }
}
