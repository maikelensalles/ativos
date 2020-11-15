@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Olá') . ' '. auth()->user()->name,
        'description' => __('Esta é a sua página de perfil, mantenha seus dados cadastrais, bancários e login sempre atualizados!'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-6 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="card-header text-center border-0 pt-4 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('bancarios.edit') }}" class="btn btn-sm btn-info mr-4">{{ __('Atualizar Dados Bancários') }}</a>
                            <a href="{{ route('cadastros.edit') }}" class="btn btn-sm btn-default float-right">{{ __('Dados Cadastrais') }}</a>
                        </div>
                    </div>
                    
                    <div class="card-body pt-4 pt-md-4">
                            {{--<div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        <div>
                            {{--<h3>
                                {{ auth()->user()->name }}<span class="font-weight-light"></span>
                            </h3>--}}

                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                                @csrf
                                @method('put')
    
                                <h6 class="heading-small  text-center text-muted mb-4">{{ __('Atualizar Perfil') }}</h6>

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nome Completo') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome Completo') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
    
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
    
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
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
            <div class="col-xl-6 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-center text-muted mb-4">{{ __('Alterar Senha') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Senha Atual') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Senha Atual') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Nova Senha') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nova Senha') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirme a Nova Senha') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirme a Nova Senha') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Mudar Senha') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection