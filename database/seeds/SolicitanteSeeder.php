<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitantes')->insert([
            ['name' => 'Edivan José', 'conselho' => 'CRM 23445'],
            ['name' => 'Renata Dias Veloso', 'conselho' => 'CRM 23445'],
            ['name' => 'Liliana Ananias', 'conselho' => 'CRM 23445'],
            ['name' => 'Felipe Ribeiro', 'conselho' => 'CRM 23445'],
            ['name' => 'Amanda Froes', 'conselho' => 'CRM 23445'],
            ['name' => 'Aluizio Noronha', 'conselho' => 'CRM 23445'],
        ]);
    }
}
