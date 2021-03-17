<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Convenio;
use App\Models\Admin\Calendario;
use Illuminate\Support\Facades\DB;

class CalendarioController extends Controller
{
    protected $repository;
    protected $editMode = false;

    public function __construct(Calendario $calendario)
    {
        $this->repository = $calendario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendarios = $this->repository->latest('data')->get();

        return view('admin.pages.calendarios.index',
            [
                'calendarios'=>$calendarios,
                'convenios'=>Convenio::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios = Convenio::all();
        return view('admin.pages.calendarios.create',['convenios'=>$convenios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('calendarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendario = Calendario::find($id);
        $agendas = $calendario->agendas()->get();
        return view('admin.pages.agendas.index',
            [
                'agendas'=>$agendas,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $calendario = $this->repository::findOrFail($id);
        if(!$calendario)
        redirect()->back();
        $this->editMode=true;
        return $this->index();

        // return view('admin.pages.calendarios.edit',[
        //     'calendario' => $calendario,
        //     'convenios' => Convenio::all()
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repository::findOrFail($id)->update($request->all());
        $this->editMode=false;
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendario  $calendario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $calendario = $this->repository->find($id);
        if (!count($calendario->agendas ) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Existem Agendamento nesta Data');
        }
        $calendario->delete();
        return redirect()->route('calendarios.index');
    }

    // public function examesCalendario()
    // {
    //     $exames = DB::table('exames')
    //                 ->select('calendarios.data','convenios.name', DB::raw ('sum(exames.price) as Total'))
    //                 ->join('agenda_exame', 'agenda_exame.exame_id','=','exames.id')
    //                 ->join('agendas','agendas.id','=','agenda_exame.agenda_id')
    //                 ->join('calendarios','calendarios.id','=', 'agendas.calendario_id')
    //                 ->join('convenios','convenios.id','=','calendarios.convenio_id')
    //                 ->groupBy('calendarios.data', 'convenios.name')

    //                 ->get();
    //     dd($exames);
    // }
}
