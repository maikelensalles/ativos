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
        $contratousers = ContratoUser::paginate(25);

        $contratos = Contrato::all();


        //SOMAR TOTAL EM ATIVOS
        $contratouser = DB::table('contrato_users')

                        ->join('users', 'contrato_users.user_id', '=', 'users.id')

                        ->select('user_id', DB::raw('sum(valor) as total'))

                        ->where('user_id', '=', Auth::id())

                        ->groupBy('user_id')

                        ->get();

        //SOMAR TOTAL DE RESGATE
        $contratousersaque = DB::table('contrato_users_saques')

                        ->join('users', 'contrato_users_saques.user_id', '=', 'users.id')

                        ->select('user_id', DB::raw('sum(saque) as total'))

                        ->where('user_id', '=', Auth::id())

                        ->groupBy('user_id')

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
    
        return view('dashboard', compact('contratousers', 'contratos', 'contratouser', 'contratousersaque', 'contratofech', 'estimado', 'usergestores'));
    }
}
