<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\incluir_mapa_p2;
use App\Models\mapas;




class mapasRegController extends Controller
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
        return view('mapasReg.index');
    }

    public function show()
    {
        return view('mapasReg.continua');
    }

    public function edit()
    {
        return view('mapasReg.teste');
    }

    public function create()
    {
        return view('mapasReg.create');
    }

 
}