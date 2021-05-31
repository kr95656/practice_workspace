<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class)->create([
            'name' => 'test',
            'email' => 'test@com.jp',
            'tel' => '0123456789',
            'prefecture' => '鹿児島県',
            'city' => '鹿児島市',
            'street' => '明和',
            'password' => Hash::make('testtest'),
        ]);

        factory(Employee::class, 5)->create();
    }
}
