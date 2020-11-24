<?php

namespace App\Http\Controllers; 

use App\Http\Requests\SaqueRequest;
use Illuminate\Http\Request;
use App\ContratoUser;
use App\Contrato;
use App\User;

class SaqueController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(SaqueRequest $request, ContratoUser $saque)
    {
        $this->request = $request;
        $this->repository = $saque;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Saque $model)
    {
        $saques = ContratoUser::paginate(25);

        $contratos = Contrato::all();

        return view('pages.saques.index', compact('saques', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.saques.show', compact('saques')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contrato $contrat0)
    {
        $data = $request->only('saque');

        $this->repository->create($data);

        return redirect()->route('saques.index');
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
        if (!$saque = $this->repository->find($id))
            return redirect()->back();

        return view('pages.saques.show', [
           'saque' => $saque
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaqueRequest $request, $id)
    {   
        if (!$saques = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        $saques->update($data);

        return redirect()->route('saques.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $saques = $this->repository->where('id', $id)->first();

        if (!$saques)
            return redirect()->back();

        $saques->delete();

        return redirect()->route('saques.index');
    }
}
