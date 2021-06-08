<?php

use App\Models\PrimaryCategory;
use Illuminate\Database\Seeder;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PrimaryCategory::class)->create([
            'id'      => 1,
            'name'    => '牛',
            'sort_no' => 1,
        ]);
        factory(PrimaryCategory::class)->create([
            'id'      => 2,
            'name'    => '豚',
            'sort_no' => 2,
        ]);
        factory(PrimaryCategory::class)->create([
            'id'      => 3,
            'name'    => '鶏',
            'sort_no' => 3,
        ]);
        factory(PrimaryCategory::class)->create([
            'id'      => 4,
            'name'    => '羊',
            'sort_no' => 3,
        ]);
        factory(PrimaryCategory::class)->create([
            'id'      => 5,
            'name'    => '馬',
            'sort_no' => 5,
        ]);
        factory(PrimaryCategory::class)->create([
            'id'      => 6,
            'name'    => 'その他',
            'sort_no' => 6,
        ]);
    }
}
