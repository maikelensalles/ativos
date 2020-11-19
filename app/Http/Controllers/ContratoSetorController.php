<?php

namespace App\Http\Controllers; 

use App\Contrato;
use Illuminate\Http\Request;
use App\ContratoSetor;
use App\Http\Requests\ContratoSetorRequest;

class ContratoSetorController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoSetor $setor)
    {
        $this->request = $request;
        $this->repository = $setor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContratoSetor $model)
    {
        $setors = ContratoSetor::paginate(25);

        return view('pages.setors.index', compact('setors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.setors.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoSetorRequest $request, ContratoSetor $setor)
    {
        $data = $request->only('nome');

        $this->repository->create($data);

        return redirect()->route('setors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContratoSetor $setor)
    {
        return view('admin.pages.setors.show', [
            'setor' => $setor,
            'contratos' => Contrato::where('contrato_setors_id', $setor->id)->paginate(25)
        ]);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$setor = $this->repository->find($id))
            return redirect()->back();

        return view('pages.setors.edit', compact('setor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoSetorRequest $request, $id)
    {   
        if (!$setor = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        $setor->update($data);

        return redirect()->route('setors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $setor = $this->repository->where('id', $id)->first();
        if (!$setor)
            return redirect()->back();

        $setor->delete();

        return redirect()->route('setors.index');
    }

}