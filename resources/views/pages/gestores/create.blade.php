@extends('layouts.app', ['title' => __('Cadastrar Amigo')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Adicionar Amigo Cadastrado</h1>
            <p class="text-center text-white ">Registre aqui quando seu amigo se cadastrar</p>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row"> 
            <div class="col">
                <div class="card shadow">
                    <div class="p-4 bg-secondary">
                        <form method="post" action="{{ route('gestores.store') }}" autocomplete="off">
                        @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nome">Nome do Amigo</label>
                                    <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('nome') }}" required>
                                </div>

                                {{--<div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-user_id">Seu Nome</label>
                                    <select name="user_id" id="input-user_id" class="form-control form-control-alternative{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>
                                        <option value="{{auth()->user()->id}}" selected>{{auth()->user()->name}}</option>
                                    </select>                                            
                                </div>--}}

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                </div>
                            </div>
                        </form>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')

@endsection















