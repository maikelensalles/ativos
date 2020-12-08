<?php

namespace App\Http\Controllers; 

use App\Http\Requests\ContratoUserSaqueRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ContratoUserSaque;
use App\ContratoUser;
use App\Contrato;
use App\User;

class ContratoUserSaqueController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoUserSaque $contratousersaque)
    {
        $this->request = $request;
        $this->repository = $contratousersaque;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContratoUserSaque $model)
    {
        $contratousersaques = ContratoUserSaque::paginate(25);

        $contratos = DB::table('contrato_users')

                     ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                     ->get();

        $propostas = ContratoUser::all();

        return view('pages.resgates.index', compact('contratousersaques', 'contratos', 'propostas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contratos = DB::table('contrato_users')

                    ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                    ->get();

        $users = User::all();

        return view('pages.resgates.create', compact('contratos', 'users')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoUserSaqueRequest $request)
    {
        $data = $request->only('solicitacao', 'contrato_id', 'user_id');

        $this->repository->create($data);

        return redirect()->route('resgates.index');
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
        //
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
    public function update(Request $request, $id)
    {   
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
    }
}