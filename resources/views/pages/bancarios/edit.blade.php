@extends('layouts.app', ['title' => __('Dados Bancários')])

@section('content')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ 'col-lg-7' ?? '' }}">
                <h1 class="display-2 text-white">{{  __('Olá') . ' '. auth()->user()->name, }}</h1>
                    <p class="text-white mt-0 mb-5">{{  __('Esta é a sua página de perfil, mantenha seus dados cadastrais, bancários e login sempre atualizados!'), }}</p>
            </div>
        </div>
    </div>
</div>  
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card card-profile shadow">
                <div class="card-header text-center border-0 pt-4 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('cadastros.edit') }}" class="btn btn btn-default mr-4">{{ __('Dados Cadastrais') }}</a>
                        <a href="{{ route('profile.edit') }}" class="btn btn btn-default float-right">{{ __('Login e senha') }}</a>
                    </div>
                </div>
                <br>                
                <div class="card-body pt-0 pt-md-4">
                    <form method="post" action="{{ route('bancarios.update') }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <h6 class="heading-small  text-center text-muted mb-4">{{ __('Atualizar Dados Bancários') }}</h6>
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('banco') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-banco">{{ __('Banco') }}</label>
                                <input type="text" name="banco" id="input-banco" class="form-control form-control-alternative{{ $errors->has('banco') ? ' is-invalid' : '' }}" placeholder="{{ __('Banco') }}" value="{{ old('banco', auth()->user()->banco) }}" required autofocus>

                                @if ($errors->has('banco'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('banco') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('agencia') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-agencia">{{ __('Agência') }}</label>
                                <input type="number" name="agencia" id="input-agencia" class="form-control form-control-alternative{{ $errors->has('agencia') ? ' is-invalid' : '' }}" placeholder="{{ __('Agência') }}" value="{{ old('agencia', auth()->user()->agencia) }}" required>

                                @if ($errors->has('agencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('agencia') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('conta_corrente') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-conta_corrente">{{ __('Conta Corrente') }}</label>
                                <input type="number" name="conta_corrente" id="input-conta_corrente" class="form-control form-control-alternative{{ $errors->has('conta_corrente') ? ' is-invalid' : '' }}" placeholder="{{ __('Conta Corrente') }}" value="{{ old('conta_corrente', auth()->user()->conta_corrente) }}" required>

                                @if ($errors->has('conta_corrente'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('conta_corrente') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection