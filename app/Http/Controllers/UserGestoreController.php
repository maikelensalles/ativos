<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGestoreRequest;
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserGestore $model)
    {
        $usergestores = UserGestore::paginate(25);

        return view('pages.gestores.index', compact('usergestores'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('pages.resgates.create', compact('users')); 
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