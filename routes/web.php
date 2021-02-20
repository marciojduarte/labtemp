<?php

use App\Http\Livewire\{
    FiltroConvenio
};

//Route::get('filtros', FiltroConvenio::class);

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
   // return App\Models\Admin\Agenda::all();
   //$data = App\Models\Admin\Calendario::Where('data','LIKE',"2021-07-%")->Where('convenio_id','1')->get();
   $data = App\Models\Admin\Calendario::find('1');
   //$agendas = $data->agendas()->get();
   $agendas = $data->agendas()->find('6');
   $paciente = $agendas->paciente()->get();
    return $data;
    $paciente;
    //return App\Models\Admin\Calendario::count('data');
    // $totalPaciente = App\Models\Admin\Agenda::all();
    // $agendaExame = $totalPaciente->exame();
    // return $agendaExame;
    // //return $totalPaciente;
});

Route::get('admin/index', function () {
    return view('admin.index');
})->name('admin.index');

    /**
     * Paciente x Agenda
     */
     Route::resource('paciente/{id}/agenda', 'PacienteAgendaController',[
        'as' => 'paciente'
    ]);
    /**
     * Agenda x Exames
     */
    Route::resource('agenda/{id}/exames', 'AgendaExameController',[
        'as' => 'agenda'
    ]);

      /**
     * Routes exames
     */
    Route::any('exames/search', 'ExameController@search')->name('exames.search');
    Route::resource('exames', 'ExameController');

    /**
     * Routes pacientes
     */
    Route::any('pacientes/search', 'PacienteController@search')->name('pacientes.search');
    Route::resource('pacientes', 'PacienteController');

    /**
     * Routes convenios
     */
    Route::any('convenios/search', 'ConvenioController@search')->name('convenios.search');
    Route::resource('convenios', 'ConvenioController');

    /**
     * Routes agendas
     */
    Route::any('agendas/search', 'AgendaController@search')->name('agendas.search');
    Route::resource('agendas', 'AgendaController');
    /**
     * Routes calendarios
     */
    Route::resource('calendarios', 'CalendarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
