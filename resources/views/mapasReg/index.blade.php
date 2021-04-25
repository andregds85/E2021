@extends('layouts3.app')
@section('content')

<!-- Passo 1 !-->
  <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><b>Mapas da Regulação</b></h5>
        <h6 class="card-title"><b></b></h6>
              
        <p class="card-text"><b><div><td>Macro:</td><td> {{ Auth::user()->macro}}</td> </div>
        <?php $macroUsr=Auth::user()->macro; ?> </b></p>

        <p class="card-text"> <div><td>Hospital:</td><td> {{ Auth::user()->categorias_id}}</td> </div>
       <?php $hospUsr=Auth::user()->categorias_id; ?>  </p>
      </div>
    </div>
 <?php
use App\Http\Controllers\MapasController;
use App\Models\mapas;
/*
$tabela = mapas::all(); 
$itens = mapas::where('macro',$macroUsr)->get();  */

/* 
Na hora de cadastrar o Mapa precisa pegar qual 
macro é o hospital */ 

?>










    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif












    <!-- Passo 2 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Hospitais</b></h5>
          <h6 class="card-title"><b></b></h6>
            <BR>
          <p class="card-text"><b>Passo 2 </b></p>
          <p class="card-text">Cadastrar todos os Hospitais </p>
        </div>
      </div>


    <!-- Passo 3 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Usuários com perfil de  Regulação</b></h5>
          <h6 class="card-title"><b></b></h6>
            <BR>
          <p class="card-text"><b>Ao cadastrar usuários </b></p>
          <p class="card-text">Selecionar as Macros e não selecionar Hospital</p>
        </div>
      </div>


    <!-- Passo 4 !-->
    <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><b>Usuários com perfil de Hospital</b></h5>
          <h6 class="card-title"><b></b></h6>
            <BR>
          <p class="card-text"><b>Ao cadastrar usuários </b></p>
          <p class="card-text">Selecionar a Macro e  selecionar seu Hospital</p>
        </div>
      </div>









@endsection



