@extends('layouts.app', ['title' => __('Cadastrar Saque')])

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Solicitar Resgate</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
        <div class="header-body">
            <div class="row"> 
                <div class="col-xl-6 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div class="p-4 bg-secondary">
                            {{--<div class="text-center">--}}
                                <div class="pl-lg-4">
                                    <h2>Resgatar</h2>
                                    <p>Saldo dispinivel para saque</p> 
                                    <h1 class="card-title display-3">{{ $saldoo }} {{ $valuee }} {{ $porcentoo }}</h1>
                                </div>

                                {{--<form action="{{ route('resgates.index') }}">
                                    <button type="submit" class="btn btn-secondary mt-4">Ver todas solicitações</button>
                                </form>--}}
                            {{--</div>--}}
                                <form method="post" action="{{ route('resgates.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="pl-lg-4">
                                        {{--<div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-user_id">Seu Nome</label>
                                            <select name="user_id" id="input-user_id" class="form-control form-control-alternative{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>
                                                <option value="{{auth()->user()->id}}" selected>{{auth()->user()->name}}</option>
                                            </select>                                            
                                        </div>--}}

                                        <div class="form-group{{ $errors->has('saque') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-saque">{{ __('Qual valor você deseja resgatar?') }}</label>
                                            <input type="number" name="saque"  id="input-saque" class="form-control form-control-alternative{{ $errors->has('saque') ? ' is-invalid' : '' }}" value="{{ old('saque') }}" min='50' required>     
                                        </div>

                                        <h4>Valor minimo de R$50,00</h4>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                        </div>
                                    </div>
                                </form>         
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div class="p-4 bg-secondary">
                            {{--<div class="text-center">--}}
                                <div class="pl-lg-4">
                                    <i class="fas fa-comments-dollar display-1"></i>
                                    <h2>Recebimento do resgate:</h2>
                                    <p>em até 48 horas após data de agendamento.</p>
                                    <form action="{{ route('resgates.index') }}">
                                        <button type="submit" class="btn btn-secondary mt-4">Ver tudo</button>
                                    </form>
                                </div>
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')

@endsection
