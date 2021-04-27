<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mapas;
use App\Models\pacientes;
use App\Models\incluir_mapa_p2;


class IncluirMapaP2sController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:mapas-list|mapas-create|mapas-edit|mapas-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mapas-create', ['only' => ['create','store']]);
         $this->middleware('permission:mapas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mapas-delete', ['only' => ['destroy']]);
    }
 
    public function index()
    {
        return view('IncluirMapaP2s.index',compact('mapas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    



}
