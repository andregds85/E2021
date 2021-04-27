<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incluir_mapa_p2A extends Model
{
    use HasFactory;
    protected $table="mapas";
    protected $fillable = [
        'idMapa',
        'idPaciente',
        'codSolicitacao',
        'cns',
        'nomeUsuario',
        'municipio',
        'usuarioSistema',
        'cpfUsuarioSistema',
      ];
}

