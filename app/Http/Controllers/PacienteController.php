<?php

namespace App\Http\Controllers;

use App\Models\Admin\Paciente;
use App\Http\Requests\StoreUpdatePaciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected $repository;

    public function __construct(Paciente $paciente)
    {
        $this->repository = $paciente;

       // $this->middleware(['can:pacientes']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = $this->repository->latest()->get();

        return view('admin.pages.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePaciente  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePaciente $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$paciente = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$paciente = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePaciente  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePaciente $request, $id)
    {
        if (!$paciente = $this->repository->find($id)) {
            return redirect()->back();
        }

        $paciente->update($request->all());

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$paciente = $this->repository->find($id)) {
            return redirect()->back();
        }

        $paciente->delete();

        return redirect()->route('pacientes.index');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $pacientes = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('sus', $request->filter);
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->paginate();

        return view('admin.pages.pacientes.index', compact('pacientes', 'filters'));
    }
}
