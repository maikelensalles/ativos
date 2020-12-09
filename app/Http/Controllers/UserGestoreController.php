<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGestoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\UserGestore;
use App\User;

class UserGestoreController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, UserGestore $usergestore)
    {
        $this->request = $request;
        $this->repository = $usergestore;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserGestore $model)
    {
        $usergestores = UserGestore::paginate(25);

        $gestores = DB::table('user_gestores')

                        ->join('users', 'user_gestores.user_id', '=', 'users.id')

                        //->select(DB::raw('count(user_gestores.nome) as total'))
                        ->select('user_id', DB::raw('count(nome) as total'))

                        ->groupBy('user_id')

                        ->get();   

        return view('pages.gestores.index', compact('usergestores', 'gestores'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('pages.gestores.create', compact('users')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserGestoreRequest $request)
    {
        $data = $request->only('nome', 'user_id');

        $this->repository->create($data);

        return redirect()->route('gestores.index');
    }
}