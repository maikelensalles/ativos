<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ContratoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ContratoSetor;
use App\ContratoUser;
use App\Contrato;
use App\User;

class ContratoController extends Controller
{
    protected $request;
    private $contrato;
    private $repository;

    public function __construct(Contrato $contrato, Request $request)
    {
        $this->request = $request;
        $this->repository = $contrato;
        $this->contrato = $contrato;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();

        $contratousers = ContratoUser::all();

        return view('pages.propostas.index', compact('contratos', 'contratousers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoRequest $request, Contrato $contrato)
    {
        $data = $request->only('valor', 'contrato_id', 'user_id');

        $this->repository->create($data);

        return redirect()->route('contratos.index');
    }
            
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        return view('pages.propostas.show', [
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
        $setores = ContratoSetor::all();

        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        return view('pages.propostas.edit', compact('contrato', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoRequest $request, $id)
    {
        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if ($contrato->image && Storage::exists($contrato->image)) {
                Storage::delete($contrato->image);
            }

            $imagePath = $request->image->store('novidades');
            $data['image'] = $imagePath;
        }

        $contrato->update($data);

        return redirect()->route('propostas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = $this->repository->where('id', $id)->first();
        if (!$contrato)
            return redirect()->back();
    
        if ($contrato->image && Storage::exists($contrato->image)) {
            Storage::delete($contrato->image);
        }

        $contrato->delete();

        return redirect()->route('propostas.index');
    }

    public function single($slug)
    {
        $contrato = $this->contrato->whereSlug($slug)->first();

         //SOMAR TOTAL CAPTADO DAS PROPOSTAS ASSINADAS
         $contratouser = DB::table('contrato_users')

         ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')
       
         ->select('contrato_id', DB::raw('sum(valor) as total'))       
         
         ->where([
            ['contrato_users.status', '=', 'Aprovado'],
            ['contrato_users.contrato_id', '=', $contrato->id],
        ])  

         ->groupBy('contrato_users.contrato_id', 'contrato_users.status')

         ->get();

        return view('single', compact('contrato', 'contratouser'));
    }

    /**
     * Search Contratos
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $contratos = $this->repository->search($request->filter);

        return view('pages.propostas.search', [
            'contratos' => $contratos,
            'filters' => $filters,
        ]);
    }
}