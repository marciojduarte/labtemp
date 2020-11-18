<?php

use Illuminate\Database\Seeder;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convenios')->insert([
            ['name'=>'Laboratorio Rafha','amout'=>'1200.00'],
            ['name'=>'Laboratorio Aroldo Tourinho','amout'=>'1200.00'],
            ['name'=>'Laboratorio Santa Casa','amout'=>'1200.00'],
            ['name'=>'Laboratorio Funded','amout'=>'1200.00'],
        ]);
    }
}
