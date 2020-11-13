<?php

namespace App\Http\Controllers;

use App\Http\Requests\BancarioRequest;
use Illuminate\Http\Request;
use App\Bancario;

class BancarioController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Bancario $bancario)
    {
        $this->request = $request;
        $this->repository = $bancario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancarios = Bancario::all();

        return view('pages.bancarios.index', compact('bancarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bancarios.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BancarioRequest $request)
    {
        $data = $request->only('banco', 'agencia', 'conta_corrente');

 
        $this->repository->create($data);


        return redirect()->route('bancarios.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BancarioRequest $request, $id)
    {
        if (!$bancario = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        $bancario->update($data);

        return redirect()->route('bancarios.create');
    }
}