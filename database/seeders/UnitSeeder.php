<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = [
            ['satuan' => 'Pcs'],
            ['satuan' => 'Kg'],
            ['satuan' => 'Sak'],
            ['satuan' => 'Dus'],
        ];

        DB::table('units')->insert($unit);
    }
}
