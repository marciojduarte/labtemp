<?php

use App\Models\Admin\AgendaExame;
use Illuminate\Database\Seeder;

class AgendaExameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AgendaExame::class, 700)->create();
    }
}
