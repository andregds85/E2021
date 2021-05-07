<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PacienteController;
use App\Models\Categoria;
use App\Models\Hospital;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:municipio-list|municipio-create|municipio-edit|municipio-delete', ['only' => ['index','show','__invoke']]);
         $this->middleware('permission:municipio-create', ['only' => ['create','store']]);
         $this->middleware('permission:municipio-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:municipio-delete', ['only' => ['destroy']]);
    }

    
    public function index()
    {
            return view('municipio.index');
    }

    

}
