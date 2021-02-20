<?php

namespace App\Http\Controllers;

use App\Models\Admin\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{


    public function __construct(Agenda $agenda)
    {
        $this->repository = $agenda;

       // $this->middleware(['can:agendas']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = $this->repository->latest()
                                         //   ->groupBy('calendario_id')
                                            ->get();


        return view('admin.pages.agendas.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pacientes = Paciente::all();
        // $solicitantes = Solicitante::all();
        // $convenios = Convenio::all();
        // $exames = Exame::all();


        // return view('admin.pages.agendas.create', [
        //     'pacientes' =>$pacientes,
        //     'solicitantes'=>$solicitantes,
        //     'convenios'=> $convenios,
        //     'exames'=> $exames
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateAgenda  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('agendas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$agenda = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.agendas.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$agenda = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.agendas.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateAgenda  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$agenda = $this->repository->find($id)) {
            return redirect()->back();
        }

        $agenda->update($request->all());

        return redirect()->route('agendas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$agenda = $this->repository->find($id)) {
            return redirect()->back();
        }

        $agenda->delete();

        return redirect()->route('agendas.index');
    }

}
