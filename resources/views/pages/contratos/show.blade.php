@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
   
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
                <div class="col-xl-6 mr-0">
        
                    <div class="card shadow mb-4 mb-xl-0">
                        <div class="header pb-9 pt-6 pt-lg-9 d-flex align-items-center"  style="background-image: {{ url("contratos{$contrato->image}") }}; border-radius: 20px; background-size: cover; background-position: center top;">
                            <br>
                            <br>
                            
                            @if ($contrato->image)
                                <img src="{{ url("contratos{$contrato->image}") }}">
                            @endif
                            <!-- Mask -->
                            <span class="mask bg-gradient-default opacity-3"></span>
                            <!-- Header container -->                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-6 mr-0">
        
                    <div class="card shadow mb-4 mb-xl-0">
                        <div>
                            
                            <div class="card-body">
                                <button type="button" class="btn btn-secondary btn-sm">{{ $contrato->setor->nome }}</button>
                                <br>
                                <br>
                                <h1 class="card-title-white text-left">{{ $contrato->titulo }}</h1> 
                                <p>{{ $contrato->sub_titulo }}</p>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 ">
                                        <h4 class="card-title-white text-left">Rentabilidade Alvo:</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <p class="card-title-white text-right">R${{ $contrato->rentabilidade_alvo }}</p>
                                    </div> 
                                    <div class="col-xl-6 col-lg-6 ">
                                        <h4 class="card-title-white text-left">Valor da Cota:</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <p class="card-title-white text-right">R${{ $contrato->valor_cota }}</p>
                                    </div> 
                                    <div class="col-xl-6 col-lg-6 ">
                                        
                                        <h4 class="card-title-white text-left">Participação:</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <p class="card-title-white text-right">{{ $contrato->participacao }}% ao dia</p>
                                    </div> 
                                    <div class="col-xl-6 col-lg-6 ">
                                        <h4 class="card-title-white text-left">Valor Captado:</h4>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <p class="card-title-white text-right">R${{ $contrato->valor_captado }}</p>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
            <div class="header-body">
                <div class="row ">
                    <div class="col text-center mb-xl-0">
                        <div class="card shadow mb-4 mb-xl-0">
                            <div class="table-responsive mb-4 mb-xl-0">
                                <table class="table align-items-center table-flush">
                                    <br>
                                    <h1>SOBRE O INVESTIMENTO</h1>
                                    <p>{{ $contrato->body }}</p>
                                    <br>
                                    <br>
                                    <h1>O PROJETO</h1>
                                    <p>{{ $contrato->body_2 }}</p>
                                    <br>
                                    <br>
                                    <h1>{{ $contrato->descricao }}</h1>
                                    <p>{{ $contrato->body_3 }}</p>
                                </table>
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