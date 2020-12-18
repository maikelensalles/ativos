<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CadastroRequest;
use Illuminate\Http\Request;

class CadastroController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.propostas.show');     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.cadastros.edit');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CadastroRequest $request)
    {
        auth()->user()->update($request->all());

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if (auth()->user()->image && Storage::exists(auth()->user()->image)) {
                Storage::delete(auth()->user()->image);
            }

            $imagePath = $request->image->store('users');
            $data['image'] = $imagePath;
        }

        auth()->user()->update($data);

        return back()->withStatus(__('Dados Cadastrais atualizados com sucesso.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CadastroRequest $request)
    {
        auth()->user()->update($request->all());

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if (auth()->user()->image && Storage::exists(auth()->user()->image)) {
                Storage::delete(auth()->user()->image);
            }

            $imagePath = $request->image->store('users');
            $data['image'] = $imagePath;
        }

        auth()->user()->update($data);

        return back()->withStatus(__('Dados Cadastrais atualizados com sucesso.'));
    }
}