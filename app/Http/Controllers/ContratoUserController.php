<?php

namespace App\Http\Controllers; 

use App\Http\Requests\ContratoUserRequest;
use Illuminate\Http\Request;
use App\ContratoUser;
use App\Contrato;
use App\User;

class ContratoUserController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoUser $contratouser)
    {
        $this->request = $request;
        $this->repository = $contratouser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContratoUser $model)
    {
        $contratousers = ContratoUser::paginate(25);

        $contratos = Contrato::all();

        return view('pages.contratos.index', compact('contratousers', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        $contratos = Contrato::all();

        return back()->withStatus(__('Dados Cadastrais atualizados com sucesso.'), compact('user', 'contratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contrato $contrat0)
    {
        $data = $request->only('valor', 'contrato_id', 'user_id');

        $this->repository->create($data);

        return redirect()->route('contratos.index');
    }

    /**
     * Display the specified resource.
     * 
     *
     * @param  int  $idtouser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        return view('pages.contratos.show', [
           'contrato' => $contrato
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
        $contratouser = ContratoUser::all();

        if (!$contratouser = $this->repository->find($id))
            return redirect()->back();

        return view('pages.contratos.edit', compact('contratouser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if (!$contratouser = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        $contratouser->update($data);

        return redirect()->route('saques.saque');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contratouser = $this->repository->where('id', $id)->first();

        if (!$contratouser)
            return redirect()->back();

        $contratouser->delete();

        return redirect()->route('contratos.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saque(ContratoUser $model)
    {
        $contratousers = ContratoUser::paginate(25);

        $contratos = Contrato::all();

        return view('pages.saques.saque', compact('contratousers', 'contratos'));
    }
}
