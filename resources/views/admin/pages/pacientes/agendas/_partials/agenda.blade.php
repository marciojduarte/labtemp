  <div class="card">
            <div class="card-body">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Convênio</th>
                            <th>Solicitante</th>
                            <th>Data</th>
                            <th style="width: 40px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paciente->agendas as $agenda)
                            <tr>
                                <td>
                                    {{ $agenda->convenio->name }}
                                </td>
                                <td>
                                    {{ $agenda->solicitante->name }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($agenda->calendario->data)->format('d/m/Y')}}
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('agenda.exames.index', $agenda->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('paciente.agenda.destroy', [$paciente->id, $agenda->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer">

            </div>
        </div>
