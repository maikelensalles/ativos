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
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                            <div class="text-center">
                                <form action="{{ route('resgates.index') }}">
                                    <button type="submit" class="btn btn-secondary mt-4">Ver todas solicitações</button>
                                </form>
                            </div>
                                <form method="post" action="{{ route('resgates.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('solicitacao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-solicitacao">{{ __('Solicitar') }}</label>
                                            <select name="solicitacao"  id="input-solicitacao" class="form-control form-control-alternative{{ $errors->has('solicitacao') ? ' is-invalid' : '' }}" required>
                                                <option value="SOLICITOU MINIMO">Saque Minimo</option>
                                                <option value="SOLICITOU MÉDIO">Saque Médio</option>
                                                <option value="SOLICITOU MAXIMO">Saque Maximo</option>
                                            </select>      
                                        </div>

                                        <div class="form-group{{ $errors->has('contrato_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-titulo">Contrato</label>
                                            <select name="contrato_id" id="input-contrato" class="form-control form-control-alternative{{ $errors->has('titulo') ? ' is-invalid' : '' }}" required>
                                                @foreach ($contratos as $contrato)
                                                @if($contrato->user_id == auth()->user()->id)
                                                        @if($contrato->contrato_id == old('document'))
                                                            <option value="{{$contrato->contrato_id}}" selected>{{$contrato->titulo}}</option>
                                                        @else
                                                            <option value="{{$contrato->contrato_id}}">{{$contrato->titulo}}</option>
                                                        @endif
                                                @else
               
                                                @endif
                                                @endforeach
                                            </select>                                            
                                        </div>

                                        {{--<div class="form-group{{ $errors->has('contrato_setor_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-nome">Setor</label>
                                            <select name="contrato_setor_id" id="input-setor" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" required>
                                                @foreach ($setors as $setor)
                                                    @if($setor['id'] == old('document'))
                                                        <option value="{{$setor['id']}}" selected>{{$setor['nome']}}</option>
                                                    @else
                                                        <option value="{{$setor['id']}}">{{$setor['nome']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'contrato_setor_id'])
                                        </div>--}}

                                        <div class="form-group{{ $errors->has('user_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-user_id">Seu Nome</label>
                                            <select name="user_id" id="input-user_id" class="form-control form-control-alternative{{ $errors->has('user_id') ? ' is-invalid' : '' }}" required>
                                                <option value="{{auth()->user()->id}}" selected>{{auth()->user()->name}}</option>
                                            </select>                                            
                                        </div>

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
</div>
@include('layouts.footers.auth')

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
