@extends('layouts2.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mapas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('mapas.create') }}">Novo Mapa</a>
            </div>
        </div>
    </div>
   
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Hospital</th>
            <th>Nome do Mapa</th>
            <th>Especialidade</th>
            <th>Procedimento</th>
            <th>Vagas</th>

            <th width="280px">Ação</th>
        </tr>
	    @foreach ($mapas as $mapa)
	    <tr>
	        <td>{{$mapa->id }}</td>
	        <td>{{$mapa->categoria_id}}</td>
	        <td>{{$mapa->nome}}</td>
            <td>{{$mapa->especialidade }}</td>
            <td>{{$mapa->procedimento}}</td>
            <td>{{$mapa->vagas}}</td>
	        <td>

                <form action="{{ route('mapas.destroy',$mapa->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('mapas.show',$mapa->id) }}">Mostrar</a>
                                                        
                    @csrf
                    @method('DELETE')
                    @can('mapas-delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $mapas->links() !!}
    {!! $mapas->links() !!}

@endsection
