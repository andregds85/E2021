@extends('layouts2.app')
@section('content')

<?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;


$tabela = mapas::all(); 
$itens = mapas::where('id',$id)->get();
?>
    <?php $hospUsr=Auth::user()->categorias_id; ?> 
<table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Hospital</th>
            <th>Nome do Mapa</th>
            <th>Nome</th>
            <th width="280px">Ação</th>
        </tr>
<tr>
@foreach ($itens as $mapa)
	    <tr>
	        <td>{{$mapa->id }}</td>
	        <td>{{$mapa->categoria_id}}</td>
<?php   $hospital=$mapa->categoria_id; 

        if ($hospital <> $hospUsr){
         ?>
              
    <script>
        window.location.href = "/";
    </script>

        <?php
        } ?>



	        <td>{{$mapa->nome}}</td>
            <td>{{$mapa->especialidade }}</td>
            <td>{{$mapa->procedimento}}</td>
            <td>{{$mapa->vagas}}</td>
	      
</tr>
 @endforeach
</table>




<p class="text-center text-primary"><small>Hospital</small></p>
@endsection

