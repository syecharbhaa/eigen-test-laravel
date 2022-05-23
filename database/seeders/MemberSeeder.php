<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 'M001', 'name' => 'Angga'],
            ['code' => 'M002', 'name' => 'Ferry'],
            ['code' => 'M003', 'name' => 'Putri'],
        ];
        DB::table('members')->insert($data);
    }
}
