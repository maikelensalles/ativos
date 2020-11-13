<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CadastroRequest;
use Illuminate\Http\Request;
use App\Cadastro;

class CadastroController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Cadastro $cadastro)
    {
        $this->request = $request;
        $this->repository = $cadastro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cadastros.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CadastroRequest $request)
    {
        $data = $request->only('image', 'nascimento', 'genero', 'cpf', 'rg', 'orgao', 'estado_civil', 'telefone', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'empresa', 'profissao', 'cargo');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('cadastros');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('cadastros.create');    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CadastroRequest $request, $id)
    {
        if (!$cadastro = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        $cadastro->update($data);

        return redirect()->route('cadastros.create');    }
}