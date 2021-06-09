<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(ItemConditionSeeder::class);
        $this->call(PrimaryCategorySeeder::class);
        $this->call(SecondaryCategorySeeder::class);
        $this->call(PrimaryKindSeeder::class);
        $this->call(SecondaryKindSeeder::class);
        $this->call(PlaceOfOriginSeeder::class);
    }
}
