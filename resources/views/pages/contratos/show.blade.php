@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-4 pt-5 pt-md-8">
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
                                <table class="table  table-flush">                                    
                                    <br>
                                    <br>
                                    <p>Insira o valor que deseja investir neste projeto!</p>
                                    <p>O valor mínimo do investimento é de R$ {{ $contrato->valor_cota }} sendo permitido valores múltiplos de R$ {{ $contrato->valor_cota }}.</p>
                                </table> 
                                <form method="post" action="{{ route('propostas.store') }}" autocomplete="off">
                                        @csrf                                   
                                        <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-valor">Valor do investimento (R$)</label>
                                            <input type="number" name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" value="{{ old('valor') }}" required>
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