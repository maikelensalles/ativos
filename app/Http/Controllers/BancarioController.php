<?php

namespace App\Http\Controllers;

use App\Http\Requests\BancarioRequest;
use Illuminate\Http\Request;

class BancarioController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.bancarios.edit');
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
    public function update(BancarioRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Dados Bancarios atualizados com sucesso.'));
    }
}