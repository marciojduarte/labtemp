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
        // $this->call(UsersTableSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(ExameSeeder::class);
        $this->call(SolicitanteSeeder::class);
        $this->call(ConvenioSeeder::class);
    }
}
