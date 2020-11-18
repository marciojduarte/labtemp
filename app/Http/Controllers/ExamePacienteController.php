<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Paciente;
use App\Models\Admin\Exame;


class ExamePacienteController    extends Controller
{
    protected $paciente, $exame;

    public function __construct(Paciente $paciente, Exame $exame)
    {
        $this->paciente = $paciente;
        $this->exame = $exame;

       // $this->middleware(['can:pacientes']);
    }

    public function exames($idPaciente)
    {
        $paciente = $this->paciente->find($idPaciente);

        if (!$paciente) {
            return redirect()->back();
        }

        $exames = $paciente->exames()->orderBy('name', 'asc')->paginate();
        $totalExames = $paciente->exames()->sum('price');

        return view('admin.pages.pacientes.exames.exames', compact('paciente', 'exames','totalExames'));
    }


    public function pacientes($idExame)
    {
        if (!$exame = $this->exame->find($idExame)) {
            return redirect()->back();
        }

        $pacientes = $exame->pacientes()->orderBy('name', 'asc')->paginate();

        return view('admin.pages.exames.pacientes.pacientes', compact('exame', 'pacientes'));
    }


    public function examesAvailable(Request $request, $idPaciente)
    {
        if (!$paciente = $this->paciente->find($idPaciente)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $exames = $paciente->examesAvailable($request->filter);

        return view('admin.pages.pacientes.exames.available', compact('paciente', 'exames', 'filters'));
    }


    public function attachExamesPaciente(Request $request, $idPaciente)
    {
        if (!$paciente = $this->paciente->find($idPaciente)) {
            return redirect()->back();
        }

        if (!$request->exames || count($request->exames) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $paciente->exames()->attach($request->exames);

        return redirect()->route('pacientes.exames', $paciente->id);
    }

    public function detachExamePaciente($idPaciente, $idExame)
    {
        $paciente = $this->paciente->find($idPaciente);
        $exame = $this->exame->find($idExame);

        if (!$paciente || !$exame) {
            return redirect()->back();
        }

        $paciente->exames()->detach($exame);

        return redirect()->route('pacientes.exames', $paciente->id);
    }
}
