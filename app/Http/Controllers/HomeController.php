<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ContratoUserSaque;
use App\ContratoUser;
use App\UserGestore;
use App\Contrato;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoUser $contrato)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->repository = $contrato;
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(ContratoUser $model)
    {
        //CONTAR TOTAL DE CONTRATOS ASSINADOS E AGRUPAR POR MÊS
        $assinado = ContratoUser::obter_Dados();
                                   
        $contratoass = $assinado->pluck('contar');

        $contratoass->toJson();
        
        $nome_mes = $assinado->pluck('mes');
       
        $nome_mes->all();

        //SOMAR TOTAL DE RESGATES FEITOS E AGRUPAR POR MÊS 
        $contratousersaque = ContratoUserSaque::obter_Resgates();

        $saquesap = $contratousersaque->pluck('count');

        $saquesap->toJson();
        
        $resgatap = $contratousersaque->pluck('month');

        $resgatap->all();
        //dd($contratousersaque);

        //SOMAR TOTAL EM ATIVOS
        $contratouser = DB::table('contrato_users')

                        ->join('users', 'contrato_users.user_id', '=', 'users.id')

                        ->select('user_id', DB::raw('sum(valor) as total'))

                        ->where('user_id', '=', Auth::id())

                        ->groupBy('user_id')

                        ->get();

        //SOMAR TOTAL DE RESGATES FINALIZADOS
        $resgate = DB::table('contrato_users_saques')

                        ->join('users', 'contrato_users_saques.user_id', '=', 'users.id')
                    
                        ->select('user_id', DB::raw('sum(saque) as totalASS'))       
                        
                        ->where([
                            ['contrato_users_saques.status_saque', '=', 'Finalizado'],
                            ['user_id', '=', Auth::id()],
                        ])  

                        ->groupBy('user_id', 'contrato_users_saques.status_saque')

                        ->get();
        
        //SOMAR TOTAL DE RENTABILIDADE ALVO
        $contratofech = DB::table('contrato_users')

                        ->join('users', 'contrato_users.user_id', '=', 'users.id')

                        ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                        ->select('user_id', '=', 'contrato_id')

                        ->select('user_id', DB::raw('sum(rentabilidade_alvo) as total'))

                        ->where('user_id', '=', Auth::id())

                        ->groupBy('user_id')

                        ->get();
        
        //SOMAR TOTAL DE VALOR ESTIMADO ATUAL
        $estimado = DB::table('contrato_users')

                        ->join('users', 'contrato_users.user_id', '=', 'users.id')

                        ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                        ->select('user_id', '=', 'contrato_id')

                        ->select('user_id', DB::raw('sum(rentabilidade_alvo) as rent'), DB::raw('sum(valor) as val'))

                        ->where('user_id', '=', Auth::id())

                        ->groupBy('user_id')

                        ->get();

        $usergestores = UserGestore::paginate(25);

        $contratousers =    ContratoUser::all();

        $contratos = Contrato::all();

        //$buscas = ContratoUser::obterDados();
    
        return view('dashboard', compact('assinado', 'resgatap', 'resgate', 'contratoass', 'saquesap', 'nome_mes', 'contratos', 'contratouser', 'contratousersaque', 'contratofech', 'estimado', 'usergestores', 'contratousers'));
    }

    
}
