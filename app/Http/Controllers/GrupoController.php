<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoRequest;
use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::paginate(25);

        return view('pages.grupos.index', compact('grupos'));
    }
}