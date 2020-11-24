@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Meus Saques</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($saques as $saque)
                <div class="col-xl-4 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div>
                            <br>
                            <h2 class="card-title-white text-center" >{{ $saque->contrato->titulo }}</h2>
                            @if($saque->contrato->status == "LISTA DE ESPERA")
                                <h3 class="text-center text-warning ">{{ $saque->contrato->status }}</h3>
                            @else
                            @endif
                            <h3 class="card-title-white text-center"></h3>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Investimento:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $saque->valor }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Rentabilidade Alvo:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white ">R${{ $saque->contrato->rentabilidade_alvo }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Valor Captado:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $saque->contrato->valor_captado }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col text-left">
                                            <a href="{{ route('propostas.single', ['slug' => $saque->contrato->slug]) }}" class="btn btn-secondary btn-sm">DETALHES</a>
     
                                        </div>
                                        <div class="col text-right">
                                            <a href="³" class="btn btn-success btn-sm">Sacar</a>
     
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