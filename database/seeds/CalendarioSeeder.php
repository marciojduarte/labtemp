<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Calendario;

class CalendarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Calendario::class, 50)->create();

    }
}
