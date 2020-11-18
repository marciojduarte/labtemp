<?php

use App\Http\Livewire\{
    FiltroConvenio
};

//Route::get('filtros', FiltroConvenio::class);

Auth::routes();

Route::get('/', function () {
    return view('welcome');
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
    Route::resource('agenda{id}/exames', 'AgendaExameController',[
        'as' => 'agenda'
    ])->middleware('auth');




    /**
     * Exame x Paciente
     */
    Route::get('pacientes/{id}/exame/{idexame}/detach', 'ExamePacienteController@detachexamepaciente')->name('pacientes.exame.detach');
    Route::post('pacientes/{id}/exames', 'ExamePacienteController@attachexamespaciente')->name('pacientes.exames.attach');
    Route::any('pacientes/{id}/exames/create', 'ExamePacienteController@examesAvailable')->name('pacientes.exames.available');
    Route::get('pacientes/{id}/exames', 'ExamePacienteController@exames')->name('pacientes.exames');
    Route::get('exames/{id}/paciente', 'ExamePacienteController@pacientes')->name('exames.pacientes');

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
     * Routes agendas
     */
    Route::any('agendas/search', 'AgendaController@search')->name('agendas.search');
    Route::resource('agendas', 'AgendaController');
    /**
     * Routes calendarios
     */
    Route::any('calendarios/search', 'CalendarioController@search')->name('calendarios.search');
    Route::resource('calendarios', 'CalendarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
