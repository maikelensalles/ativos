@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-4 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Investimento: {{ $contratouser->contrato->titulo }}</h1>
            <p class="text-center text-white">Siga os passos abaixo para solicitar seu saque</p>
        </div>
    </div>
</div>
<div class="container-fluid mt--3">
    <div class="header-body">
                <div class="row ">
                    <div class="col text-center mb-xl-0">
                        <div class="col mb-4 mb-xl-0">
                            <div class="table-responsive mb-4 mb-xl-0">
                                <table class="table  table-flush">                                    
                                    <br>
                                    <br>
                                    <p>Informações aqui sobre o pradrão de daques...!</p>
                                    <p>Algo aqui</p>
                                    <h3 class="text-danger">Mantenha seus dados cadastrais e bancários sempre atualizados!</h3>
                                </table> 
                                <form method="post" action="{{ route('contratos.update', $contratouser) }}" autocomplete="off">
                                        @csrf 
                                        @method('put')
                                        <div class="form-group{{ $errors->has('saque') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-saque">{{ __('') }}</label>
                                            <select name="saque"  id="input-saque" class="form-control form-control-alternative{{ $errors->has('saque') ? ' is-invalid' : '' }}" required>
                                                <option value="SOLICITOU MINIMO">Solicitar saque minimo</option>
                                                <option value="SOLICITOU MÉDIO">Solicitar saque médio</option>
                                                <option value="SOLICITOU MAXIMO">Solicitar saque maximo</option>
                                                </select>                                    
                                            </div>
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
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush