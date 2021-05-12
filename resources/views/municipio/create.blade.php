@extends('layouts5.app')
@section('content')

<?php
  
$macro=Auth::user()->macro;
$perfil=Auth::user()->perfil;
$login=Auth::user()->login;
$cpf=Auth::user()->cpf;

?>







<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Observação do Mapa  </h2>
                <div><td>Macro:</td><td> {{Auth::user()->macro}}</td> </div>

            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('observacao') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve algum erro na sua entrada<br><br>
            <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     }@endforeach
            </ul>
        </div>
    @endif


<form action="{{ route('municipio.store') }}" method="POST">
    	@csrf


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Observação</label>
                <select class="form-control" name="categorias_id" id="categoria">
                <option value='1- Aguarda Cirugia'>1- Aguarda Cirugia</option>
                <option value='2- Ja Realizou no Sus'>2- Ja Realizou no Sus</option>
                <option value='3- Ja Realizou Particular'>3- Ja Realizou Particular</option>
                <option value='4- Não Deseja mais Realizar'>4- Não Deseja mais Realizar</option>
                <option value='5- Contra-Indicado o Procedimento'>5- Contra-Indicado o Procedimento</option>
                <option value='6- Sem contato'>6- Sem contato</option>
                <option value='7- Não Localizado'>7- Não Localizado</option>
                <option value='8- Óbito'>8- Óbito</option>
                <option value='10- Paciente com indicação de Uti'>10- Paciente com indicação de Uti</option>
                <option value='11. Paciente aguardando avaliação de outra especialidade'>11. Paciente aguardando avaliação de outra especialidade</option>
                <option value='12. Paciente não compareceu na data agendada da cirurgia'>12. Paciente não compareceu na data agendada da cirurgia</option>
                </select>
            </div>
        </div>
</div>




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="exampleInputCategoria">Observação</label>
                <select class="form-control" name="login" id="login">
                <option value=<?php echo $login; ?>><?php echo $login; ?></option>
                </select>
            </div>
        </div>
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


  
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
		    </div>
		</div>
    </form>

@endsection
