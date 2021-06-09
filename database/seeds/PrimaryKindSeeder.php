<?php

use App\Models\PrimaryKind;
use Illuminate\Database\Seeder;

class PrimaryKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PrimaryKind::class)->create([
            'id'      => 1,
            'name'    => '牛',
            'sort_no' => 1,
        ]);

        factory(PrimaryKind::class)->create([
            'id'      => 2,
            'name'    => '豚',
            'sort_no' => 2,
        ]);

        factory(PrimaryKind::class)->create([
            'id'      => 3,
            'name'    => '鶏',
            'sort_no' => 3,
        ]);

        factory(PrimaryKind::class)->create([
            'id'      => 4,
            'name'    => 'その他',
            'sort_no' => 4,
        ]);
    }
}
