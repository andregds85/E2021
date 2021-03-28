<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapasTable extends Migration
{
    
    public function up()
    {
        Schema::create('mapas', function (Blueprint $table) {
            $table->id();
            $table->string('categoria_id');
            $table->string('nome');
            $table->text('descricao');
            $table->string('especialidade');
            $table->string('cod_procedimento');
            $table->string('procedimento');
            $table->string('vagas');
            $table->string('passo1');
            $table->timestamps();
        });
    }

    
    public function down()
    {

        Schema::dropIfExists('mapas');
        
    }
}
