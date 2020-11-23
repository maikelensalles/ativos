@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Solicitar Resgate</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($contratousers as $contratouser)
                <div class="col-xl-4 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        <div>
                            <br>
                            <h2 class="card-title-white text-center" >{{ $contratouser->contrato->titulo }}</h2>
                            <h3 class="card-title-white text-center"></h3>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Investimento:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $contratouser->valor }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Rentabilidade Alvo:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white ">R${{ $contratouser->contrato->rentabilidade_alvo }}</p>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Valor Captado:</h4>
                                        </div>
                                        <div class="col text-right">
                                            <p class="card-title-white">R${{ $contratouser->contrato->valor_captado }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col text-center">
                                            <a href="{{ route('contratos.show', $contratouser->contrato->id) }}" class="btn btn-success btn-sm">SOLICITAR SAQUE</a>
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