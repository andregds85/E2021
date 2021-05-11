@extends('layouts5.app')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mapas</h2>
            </div>
        </div>
    </div>
   <div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
  <?php $macroUsr=Auth::user()->macro; ?> 

 <?php
use App\Models\incluir_mapa_p2;
use App\Http\Controllers\IncluirMapaP2sController;


$tabela = incluir_mapa_p2::all(); 
$itens = incluir_mapa_p2::where('macro',$macroUsr)->get();
?>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Id do Mapa</th>
            <th>Id do Paciente</th>
            <th width="280px">Ação</th>
        </tr>
	    @foreach ($itens as $m)
         <tr>
	     <td>{{$m->id }}
        <p class="card-text">
        <a  href="{{route('municipio.show',$m->id)}}">Mostrar</a>
       </p></td>
	 
     
       <td>{{$m->idMapa}}
       <p class="card-text">
        <a  href="{{route('municipio.show',$m->idMapa)}}">Mostrar</a>
       </p>
       </td>


	   <td>{{$m->idPaciente}}
       <p class="card-text">
        <a  href="{{url('munipac',$m->idPaciente)}}">Mostrar</a>
       </p>
       </td>
       

	    <td> Criar Uma Observação</td>
	    </tr>
	    @endforeach
    </table>
@endsection

