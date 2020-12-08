<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\ContratoUserSaque;
use App\ContratoUser;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contratouser = DB::table('contrato_users')

                        ->join('users', 'contrato_users.user_id', '=', 'users.id')

                        ->select('user_id', DB::raw('sum(valor) as total'))

                        ->groupBy('user_id')

                        ->get();

        return view('dashboard', [
            'contratouser' => $contratouser,
        ]);
    }
}
