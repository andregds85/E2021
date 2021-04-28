@extends('layouts3.app')
@section('content')
<?php 
$id=$_GET['id'];
echo $id;

$m=Auth::user()->macro;


use App\Models\Pacientes;
$tabela = Pacientes::all();
$itensP = Pacientes::where('id',$id)->get();

?>
@foreach ($itensP as $paciente)
<?php $mpac=$paciente->macro; ?>
@endforeach 
<?php   
if($mpac<>$m){
  ?>
      <script>
          window.location.href = "/";
      </script>
  
   }
   <?php }?> 

   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vincular paciente ao mapa</h2>
                <div><td>Macro:</td><td> {{Auth::user()->macro}}</td> </div>
            </div>
        </div>
    </div>

<!-- Código do Modal -->

<div class="alert alert-success" role="alert">
 <p>Antes de vincular o paciente ao mapa clique no botão
  abaixo para retirar o paciente da fila. </p>  
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Retirar paciente da fila</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">


            
      <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Solicitação</th>
            <th>cns</th>
            <th>Nome do Usuário</th>
            <th>Vizualização</th>
        </tr>

    @foreach ($itensP as $paciente)
	    <tr>
            <td>{{$paciente->id }}</td>
            <td>{{$paciente->solicitacao }}</td>
            <td>{{$paciente->cns }}</td>
            <td>{{$paciente->nomedousuario }}</td>
            <td>{{$paciente->statusSolicitacao}}</td>
      </tr>
    @endforeach 
</table>


<?php
Pacientes::where('id', $id)->update(['statusSolicitacao' => 'S']); 
?>

<div class="alert alert-dark" role="alert">

    


Operação realizada com sucesso 


        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
      </div>
        </div>
  </div>
</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve algum erro na sua entrada<br><br>
            <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     }  @endforeach
            </ul>
        </div>
    @endif

<p class="mb-0"></p>

<br>
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Caso tenha retirado o paciente da Fila.</h4>
  <p>E desistiu de continuar com a operação de vincular o paciente ao mapa</p>
  <hr>
  <p class="mb-0">Clique no botão abaixo para devolver o paciente a fila sem vinculação ao mapa.</p>
</div>

<p class="mb-0"></p>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Devolver paciente de volta a fila 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Devolvendo paciente de volta a fila</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>ID:         
        <?php
        echo $id;
        ?>
        </p>

        <p>Paciente devolvido a fila com sucesso</p>

        <p> Nome de Úsuario : {{$paciente->nomedousuario }}</p>

        <p> Solicitação : {{$paciente->solicitacao }} </p>
        <p> CNS : {{$paciente->cns }}<p>

        <?php
        Pacientes::where('id', $id)->update(['statusSolicitacao' => 'N']); 

        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
      </div>
    </div>
  </div>
</div>



<form action="{{ route('pacientes.store') }}" method="POST">
    	@csrf

<!-- chama  a tabela categorias dentro da tabela pacientes -->
<!-- fim do trecho de chamda de categorias -->
<br>

<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Solicitação:</strong>
		            <input type="text" name="solicitacao" class="form-control" placeholder="Entre com o Número da Solicitação ">
       </div>


        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>CNS:</strong>
		            <input type="text" name="cns" class="form-control" placeholder="Entre com o CNS">
        </div>



        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nome do Usuário:</strong>
		            <input type="text" name="nomedousuario" class="form-control" placeholder="Entre com o Nome do Usuário">
        </div>




        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nome do Municipio:</strong>
		            <input type="text" name="municipio" class="form-control" placeholder="Entre com o Nome do Municipio">
        </div>




          <div class="row">
		   <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Data de Solicitação</strong>
		            <input type="date" name="datasolicitacao" class="form-control" placeholder="Entre com a Data de Solicitação">
           </div>



      <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Unidade Desejada</strong>
		            <input type="text" name="unidadedesejada" class="form-control" placeholder="Entre com a Unidade Desejada">
           </div>



          <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Código</strong>
		            <input type="text" name="codigo" class="form-control" placeholder="Entre com o Código">
           </div>



        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 1 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao1" placeholder="Observacao 1"></textarea>
            </div>
        </div>
        </div>


        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 2 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao2" placeholder="Observacao 2"></textarea>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 3 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao3" placeholder="Observacao 3"></textarea>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 4 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao4" placeholder="Observacao 4"></textarea>
            </div>
        </div>
        </div>


        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Observacao 5 :</strong>
                <textarea class="form-control" style="height:150px" name="observacao5" placeholder="Observacao 1"></textarea>
            </div>
        </div>
        </div>




      <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Visualização em Mapa</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="statusSolicitacao" id="gridRadios1" value="S">
          <label class="form-check-label" for="gridRadios1">
           S
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="statusSolicitacao" id="gridRadios2" value="N" checked>
          <label class="form-check-label" for="gridRadios2">
            N
          </label>
        </div>
        </div>
    </div>
  </fieldset>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
		    </div>
		</div>
    </form>
@endsection




