<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mapas;
use App\Models\pacientes;



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
        $mapas = mapas::latest()->paginate(5);
        return view('mapasReg.index',compact('mapas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show()
    {
        return view('mapasReg.continua');
    }

    public function create()
    {
        return view('mapasReg.create');
    }

 
}






