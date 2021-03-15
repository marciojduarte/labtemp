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

        return view('admin.pages.pacientes.agendas.exames.exames', compact('agenda', 'exames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idAgenda)
    {
        $agenda = $this->agenda->findOrFail($idAgenda);

        $exames = Exame::all();
        if (!$agenda) {
            return redirect()->back();
        }

        return view('admin.pages.pacientes.agendas.exames.create',[
            'agenda'=>$agenda,
            'exames'=>$exames
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idAgenda)
    {
        $agenda = $this->agenda->findOrFail($idAgenda);
        if (!$agenda) {
            return redirect()->back();
        }

        // if (!$request->exames || count($request->exames) == 0) {
        //     return redirect()
        //                 ->back()
        //                 ->with('info', 'Precisa escolher pelo menos uma exame');
        // }
        $agenda->exames()->attach($request->exames);
        $idAgenda = $agenda->id;
        return $this->index($idAgenda);
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
    public function destroy($idAgenda, $idExame)
    {   $agenda = $this->agenda->find($idAgenda);
        $exame = $this->exame->find($idExame);

        if (!$agenda || !$exame) {
            return redirect()->back();
        }

        $agenda->exames()->detach($exame);

        return redirect()->back();
    }
}
