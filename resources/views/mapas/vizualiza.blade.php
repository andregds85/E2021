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
            <td>id</td>
            <td>Hospital</td>
            <td>Nome do Mapa</td>
            <td>Nome</td>
            <td width="280px">Ação</td>
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

