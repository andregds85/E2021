@extends('layouts3.app')
@section('content')

<?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;

$id;
$itens = mapas::where('$id',$id)->get();
?>

<table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Hospital</th>
            <th>Nome do Mapa</th>
            <th>Nome</th>
            <th width="280px">Ação</th>
        </tr>
@foreach($itens as $item)
<tr>
      <td>{{$item->id}}</td>
      <td>{{$item->categoria_id}}</td>
      <td>{{$item->nome}}</td>
      
      <td>
            <form action="{{ route('hospital.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('pacientes.show',$item->id) }}">Mostrar</a>
                </form>
	        </td>
</tr>
 @endforeach
</table>

<a href="{{ route('users.create', ['id' => $item->id]) }}">Próxima Etapa</a>



<p class="text-center text-primary"><small>Hospital</small></p>
@endsection





