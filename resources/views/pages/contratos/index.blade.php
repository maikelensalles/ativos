@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Oportunidades em aberto</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($contratos as $contrato)
                <div class="col-xl-4 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"  style="background-image: {{ url("contratos{$contrato->image}") }}; border-radius: 8px; background-size: cover; background-position: center top;">
                            @if ($contrato->image)
                                <img src="{{ url("contratos{$contrato->image}") }}">
                            @endif
                            <!-- Mask -->
                            <span class="mask bg-gradient-default opacity-3"></span>
                            <!-- Header container -->                            
                        </div>
                        <div>
                            <h2 class="card-title-white text-center">{{ $contrato->titulo }}</h2>
                            <h3 class="card-title-white text-center">{{ $contrato->setor->nome }}</h3>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Valor da Cota:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $contrato->valor_cota }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Participação:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white ">{{ $contrato->participacao }}% ao ano</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Valor Captado:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R$ {{ $contrato->valor_captado }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col text-left">
                                            <a href="{{ route('contrato.single', ['slug' => $contrato->slug]) }}" class="btn btn-secondary btn-sm">VER DETALHES</a>
     
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{ route('contratos.show', $contrato->id) }}" class="btn btn-warning btn-sm">{{ $contrato->status }}</a>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush