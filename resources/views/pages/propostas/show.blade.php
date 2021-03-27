@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-4 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Investimento: {{ $contrato->titulo }}</h1>
            <p class="text-center text-white">Siga os passos abaixo para completar o seu investimento</p>
        </div>
    </div>
</div>
<div class="container-fluid mt--3">
    <div class="header-body">
        <div class="row ">
            <div class="col text-center mb-xl-0">
                <div class="col mb-4 mb-xl-0">
                    <div class="table-responsive mb-4 mb-xl-0">
                        {{-- ASSINAR CONTRATOS  --}}
                        <table class="table  table-flush">                                    
                            <br>
                            <br>
                            <p>Insira o valor que deseja investir neste projeto!</p>
                            <p>O valor mínimo do investimento é de R$ {{ $contrato->valor_cota }} sendo permitido valores múltiplos de R$ {{ $contrato->valor_cota }}.</p>
                           <br>
                            <h1>1. Valor do investimento</h1>
                        </table> 
                        <br>
                        <form method="post" action="{{ route('contratos.store') }}" autocomplete="off">
                        @csrf 
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-valor">Valor do investimento (R$)</label>
                            <input type="number" name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('valor') }}" min='{{ $contrato->valor_cota }}' required>
                            @if ($errors->has('valor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('valor') }}</strong>
                                </span>
                            @endif
                        </div>
                                {{--<div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Nome Completo</label>
                                    <select name="user_id" id="input-user" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        <option value="{{auth()->user()->id}}" selected>{{auth()->user()->name}}</option>
                                    </select>
                                </div> --}}

                                <div class="form-group{{ $errors->has('contrato_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-titulo">Proposta</label>
                                    <select name="contrato_id" id="input-contrato" class="form-control form-control-alternative{{ $errors->has('titulo') ? ' is-invalid' : '' }}" required>
                                        <option value="{{$contrato['id']}}" selected>{{$contrato['titulo']}}</option>
                                    </select>
                                </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Enviar</button>
                        </div>
                        <br>
                        </form>
                        <hr>
                        <h1>2. Forma de pagamento</h1>
                        <h3>{{ $contrato->forma_pagamento }}</h3>
                    </div>                          
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection
