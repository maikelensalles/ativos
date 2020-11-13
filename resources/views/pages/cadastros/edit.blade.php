@extends('layouts.app', ['title' => __('Dados Cadastrais')])

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
                <div class="card-body pt-0 pt-md-4">
                    <form method="post" action="{{ route('cadastros.update') }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small  text-center text-muted mb-4">{{ __('Atualizar Cadastro') }}</h6>

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('nascimento') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nascimento">{{ __('Data de Nascimento') }}</label>
                                <input type="date" name="nascimento" id="input-nascimento" class="form-control form-control-alternative{{ $errors->has('nascimento') ? ' is-invalid' : '' }}" placeholder="{{ __('Data de Nascimento') }}" value="{{ old('nascimento', $cadastro->nascimento) }}" required autofocus>

                                @if ($errors->has('nascimento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('genero') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-genero">{{ __('Gênero') }}</label>
                                <input type="text" name="genero" id="input-genero" class="form-control form-control-alternative{{ $errors->has('genero') ? ' is-invalid' : '' }}" placeholder="{{ __('Gênero') }}" value="{{ old('genero', $cadastro->genero) }}" required>

                                @if ($errors->has('genero'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('genero') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-cpf">{{ __('CPF') }}</label>
                                <input type="number" name="cpf" id="input-cpf" class="form-control form-control-alternative{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="{{ __('CPF') }}" value="{{ old('cpf', $cadastro->cpf) }}" required>

                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('rg') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-rg">{{ __('RG') }}</label>
                                <input type="number" name="rg" id="input-rg" class="form-control form-control-alternative{{ $errors->has('rg') ? ' is-invalid' : '' }}" placeholder="{{ __('RG') }}" value="{{ old('rg', $cadastro->rg) }}" required>

                                @if ($errors->has('rg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('orgao') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-orgao">{{ __('Órgão Exp/UF') }}</label>
                                <input type="text" name="orgao" id="input-orgao" class="form-control form-control-alternative{{ $errors->has('orgao') ? ' is-invalid' : '' }}" placeholder="{{ __('Órgão Exp/UF') }}" value="{{ old('orgao', $cadastro->orgao) }}" required>

                                @if ($errors->has('orgao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('orgao') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('estado_civil') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-estado_civil">{{ __('Estado civil') }}</label>
                                <input type="text" name="estado_civil" id="input-estado_civil" class="form-control form-control-alternative{{ $errors->has('estado_civil') ? ' is-invalid' : '' }}" placeholder="{{ __('Estado civil') }}" value="{{ old('estado_civil', $cadastro->estado_civil) }}" required>

                                @if ($errors->has('estado_civil'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado_civil') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-telefone">{{ __('Telefone') }}</label>
                                <input type="number" name="telefone" id="input-telefone" class="form-control form-control-alternative{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefone') }}" value="{{ old('telefone', $cadastro->telefone) }}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-cep">{{ __('CEP') }}</label>
                                <input type="number" name="cep" id="input-cep" class="form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" placeholder="{{ __('CEP') }}" value="{{ old('cep', $cadastro->telefone) }}" required>

                                @if ($errors->has('cep'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-endereco">{{ __('Endereço') }}</label>
                                <input type="text" name="endereco" id="input-endereco" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="{{ __('Endereço') }}" value="{{ old('endereco', $cadastro->endereco) }}" required>

                                @if ($errors->has('endereco'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-numero">{{ __('Número') }}</label>
                                <input type="number" name="numero" id="input-numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" placeholder="{{ __('Número') }}" value="{{ old('numero', $cadastro->numero) }}" required>

                                @if ($errors->has('numero'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('complemento') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-complemento">{{ __('Complemento') }}</label>
                                <input type="text" name="complemento" id="input-complemento" class="form-control form-control-alternative{{ $errors->has('complemento') ? ' is-invalid' : '' }}" placeholder="{{ __('Complemento') }}" value="{{ old('complemento', $cadastro->complemento) }}" required>

                                @if ($errors->has('complemento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('bairro') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-bairro">{{ __('Bairro') }}</label>
                                <input type="text" name="bairro" id="input-bairro" class="form-control form-control-alternative{{ $errors->has('bairro') ? ' is-invalid' : '' }}" placeholder="{{ __('Bairro') }}" value="{{ old('bairro', $cadastro->bairro) }}" required>

                                @if ($errors->has('bairro'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-cidade">{{ __('Cidade') }}</label>
                                <input type="text" name="cidade" id="input-cidade" class="form-control form-control-alternative{{ $errors->has('cidade') ? ' is-invalid' : '' }}" placeholder="{{ __('Cidade') }}" value="{{ old('cidade', $cadastro->cidade) }}" required>

                                @if ($errors->has('cidade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-estado">{{ __('Estado') }}</label>
                                <input type="text" name="estado" id="input-estado" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Estado') }}" value="{{ old('estado', $cadastro->estado) }}" required>

                                @if ($errors->has('estado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('empresa') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-empresa">{{ __('Empresa') }}</label>
                                <input type="text" name="empresa" id="input-empresa" class="form-control form-control-alternative{{ $errors->has('empresa') ? ' is-invalid' : '' }}" placeholder="{{ __('Empresa') }}" value="{{ old('empresa', $cadastro->empresa) }}" required>

                                @if ($errors->has('empresa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('profissao') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-profissao">{{ __('Profissão') }}</label>
                                <input type="text" name="profissao" id="input-profissao" class="form-control form-control-alternative{{ $errors->has('profissao') ? ' is-invalid' : '' }}" placeholder="{{ __('Profissão') }}" value="{{ old('profissao', $cadastro->profissao) }}" required>

                                @if ($errors->has('profissao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profissao') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cargo') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-cargo">{{ __('Cargo') }}</label>
                                <input type="text" name="cargo" id="input-cargo" class="form-control form-control-alternative{{ $errors->has('cargo') ? ' is-invalid' : '' }}" placeholder="{{ __('Cargo') }}" value="{{ old('cargo', $cadastro->cargo) }}" required>

                                @if ($errors->has('cargo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cargo') }}</strong>
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
