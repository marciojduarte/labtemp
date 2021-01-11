<?php

namespace App\Http\Controllers;

use App\Events\PacienteAgendado;
use Illuminate\Http\Request;
use App\Models\Admin\
{
    Solicitante,
    Calendario,
    Exame,
    Convenio,
    Paciente
};

class PacienteAgendaController extends Controller
{
    protected $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($idPaciente)
    {
        $paciente = $this->paciente->find($idPaciente);
        if (!$paciente) {
            return redirect()->back();
        }
        $agendas = $paciente->agendas()->latest()->paginate();
        return view('admin.pages.pacientes.agendas.index', compact('paciente', 'agendas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPaciente)
    {
        $paciente = $this->paciente->find($idPaciente);

        if (!$paciente) {
            return redirect()->back();
        }
        $solicitantes = Solicitante::all();
        $convenios = Convenio::all();
        $exames = Exame::all();
        //$calendarios = Calendario::all();


        return view('admin.pages.pacientes.agendas.create', [
            'paciente' =>$paciente,
            'solicitantes'=>$solicitantes,
            'convenios'=> $convenios,
            'exames'=> $exames,
            //'calendarios' => $calendarios

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, $idPaciente)
    {
       $paciente=$this->paciente->find($idPaciente);
       $data=$request->all();
       $data['user_id']= 1;
       $agenda = $paciente->agendas()->create($data);
       $agenda->exames()->attach($request->exames);
//teste updater
        return redirect()->route('paciente.agenda.index', $paciente->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPaciente, $idAgenda)
    {
        $paciente = Paciente::find($idPaciente);
        $agenda = $paciente->agendas()->find($idAgenda);

         if (!$paciente || !$agenda) {
            return redirect()->back();
         }

       $agenda->delete();

        return redirect()->route('paciente.agenda.index', $paciente->id);
    }
}
