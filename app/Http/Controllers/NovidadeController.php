<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NovidadeRequest;

use Illuminate\Http\Request;
use App\Novidade;

class NovidadeController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Novidade $novidade)
    {
        $this->request = $request;
        $this->repository = $novidade;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novidades = Novidade::all();

        return view('pages.novidades.index', compact('novidades'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NovidadeRequest $request)
    {
        $data = $request->only('titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'image', 'descricao_media', 'obs');

        //$image = $request->file('image');

        //if($image) {
            //foreach ($image as $imag){
                //$path = $imag->store('image', 'public');
            //}
        //}

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('novidades', 'public');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);


        return redirect()->route('novidades.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NovidadeRequest $request, $id)
    {
        if (!$novidade = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if ($novidade->image && Storage::exists($novidade->image)) {
                Storage::delete($novidade->image);
            }

            $imagePath = $request->image->store('novidades');
            $data['image'] = $imagePath;
        }

        $novidade->update($data);

        return redirect()->route('novidades.index');
    }
}