<?php

namespace App\Http\Controllers;

use App\Models\Admin\Exame;
use App\Http\Requests\StoreUpdateExame;
use Illuminate\Http\Request;

class ExameController extends Controller
{protected $repository;

    public function __construct(Exame $exame)
    {
        $this->repository = $exame;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exames = $this->repository->orderBy('name', 'asc')->get();

        return view('admin.pages.exames.index', compact('exames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.exames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateExame  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateExame $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('exames.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$exame = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.exames.show', compact('exame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$exame = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.exames.edit', compact('exame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateExame  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateExame $request, $id)
    {
        if (!$exame = $this->repository->find($id)) {
            return redirect()->back();
        }

        $exame->update($request->all());

        return redirect()->route('exames.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$exame = $this->repository->find($id)) {
            return redirect()->back();
        }

        $exame->delete();

        return redirect()->route('exames.index');
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

        $exames = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('codsus', $request->filter);
                                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                                }
                            })
                            ->paginate();

        return view('admin.pages.exames.index', compact('exames', 'filters'));
    }
}
