<?php

use App\Models\ItemCondition;
use Illuminate\Database\Seeder;


class ItemConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ItemCondition::class)->create([
            'id'      => 1,
            'name'    => '1等級',
            'sort_no' => 1,
        ]);
        factory(ItemCondition::class)->create([
            'id'      => 2,
            'name'    => '2等級',
            'sort_no' => 2,
        ]);
        factory(ItemCondition::class)->create([
            'id'      => 3,
            'name'    => '3等級',
            'sort_no' => 3,
        ]);
        factory(ItemCondition::class)->create([
            'id'      => 4,
            'name'    => '4等級',
            'sort_no' => 4,
        ]);
        factory(ItemCondition::class)->create([
            'id'      => 5,
            'name'    => '5等級',
            'sort_no' => 5,
        ]);
        factory(ItemCondition::class)->create([
            'id'      => 6,
            'name'    => 'その他',
            'sort_no' => 6,
        ]);
    }
}
