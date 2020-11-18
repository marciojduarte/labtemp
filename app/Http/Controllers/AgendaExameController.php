<?php

namespace App\Http\Controllers;

use App\Models\Admin\Exame;
use App\Models\Admin\Agenda;
use Illuminate\Http\Request;

class AgendaExameController extends Controller
{
    private $exame, $agenda;


    public function __construct(Exame $exame, Agenda $agenda)
    {
        $this->exame = $exame;
        $this->agenda = $agenda;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idAgenda)
    {
        $agenda = $this->agenda->find($idAgenda);

        if (!$agenda) {
            return redirect()->back();
        }

        $exames = $agenda->exames()->orderBy('name', 'asc')->paginate();
        $totalExames = $agenda->exames()->sum('price');

        return view('admin.pages.pacientes.agendas.exames.exames', compact('agenda', 'exames','totalExames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
