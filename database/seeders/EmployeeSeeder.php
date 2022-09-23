<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([

            'nama' => 'Riswau Hamzah',
            'jeniskelamin' => 'laki-laki',
            'notelpon' => '08212333',
        ]);
    }
}
