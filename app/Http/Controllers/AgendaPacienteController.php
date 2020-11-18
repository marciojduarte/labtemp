<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Agenda;
use App\Models\Admin\Paciente;
use App\Models\Admin\Solicitante;
use App\Models\Admin\Convenio;

class AgendaPacienteController extends Controller
{
    protected $paciente, $agenda;

    public function __construct(Paciente $paciente, Agenda $agenda)
    {
        $this->paciente = $paciente;
        $this->agenda = $agenda;

       // $this->middleware(['can:pacientes']);
    }

    public function index($idPaciente)
    {
        $paciente = $this->paciente->find($idPaciente);

        if (!$paciente) {
            return redirect()->back();
        }

        $agendas = $paciente->agendas()->paginate();


        return view('admin.pages.pacientes.agendas.agendas', compact('paciente', 'agendas'));

    }
    public function create($idPaciente)
    {
        $paciente = $this->paciente->find($idPaciente);

        if (!$paciente) {
            return redirect()->back();
        }
        $solicitantes = Solicitante::all();
        $convenios = Convenio::all();

        return view('admin.pages.pacientes.agendas.create', [
            'paciente' =>$paciente,
            'solicitantes'=>$solicitantes,
            'convenios'=> $convenios,
            ]);
    }

    public function store(Request $request)
    {   $data = $request->except('[_token]');
        $data['user_id'] = '1';
        Agenda::create($data);

        $paciente = $data['paciente_id'];
        $agendas = $paciente->agendas()->paginate();

        dd($agendas);
        return view('admin.pages.pacientes.agendas.agendas', compact('paciente', 'agendas'));
    }

    public function pacientes($idExame)
    {
        if (!$agenda = $this->agenda->find($idExame)) {
            return redirect()->back();
        }

        $pacientes = $agenda->pacientes()->orderBy('name', 'asc')->paginate();

        return view('admin.pages.agendas.pacientes.pacientes', compact('agenda', 'pacientes'));
    }


    public function examesAvailable(Request $request, $idPaciente)
    {
        if (!$paciente = $this->paciente->find($idPaciente)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $agendas = $paciente->examesAvailable($request->filter);

        return view('admin.pages.pacientes.agendas.available', compact('paciente', 'agendas', 'filters'));
    }


    public function attachExamesPaciente(Request $request, $idPaciente)
    {
        if (!$paciente = $this->paciente->find($idPaciente)) {
            return redirect()->back();
        }

        if (!$request->agendas || count($request->agendas) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $paciente->agendas()->attach($request->agendas);

        return redirect()->route('pacientes.agendas', $paciente->id);
    }

    public function detachExamePaciente($idPaciente, $idExame)
    {
        $paciente = $this->paciente->find($idPaciente);
        $agenda = $this->agenda->find($idExame);

        if (!$paciente || !$agenda) {
            return redirect()->back();
        }

        $paciente->agendas()->detach($agenda);

        return redirect()->route('pacientes.agendas', $paciente->id);
    }
}
