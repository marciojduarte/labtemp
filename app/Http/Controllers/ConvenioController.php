<?php

namespace App\Http\Controllers;

use App\Models\Admin\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    protected $repository;

    public function __construct(Convenio $convenio)
    {
        $this->repository = $convenio;


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = $this->repository->orderBy('name', 'asc')->get();

        return view('admin.pages.convenios.index', compact('convenios'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convenio = $this->repository->find($id);
        $calendarios = $convenio->calendarios()->get();
        return view('admin.pages.convenios.show',[
            'convenio'=>$convenio,
            'calendarios'=>$calendarios
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenio)
    {
        //
    }
}
