@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Simulador de investimentos alternativos</h1>
            <p class="text-center text-white">Saiba quanto você poderia ganhar se investisse seu dinheiro em nossas ofertas de Ativos Reais.</p>
            
            <div class="group mx-auto" style="width: 300px;">
                <form action="{{ route('propostas.search') }}" method="post" class="form form-inline text-center ">
                @csrf
                <input type="number" class="form-control" name="filter" placeholder="" aria-label="" aria-describedby="button-addon2" value="{{ $filters['filter'] ?? '' }}">
                <div class="input-group-append">
                  <button class="btn btn-warning" type="submit" id="button-addon2">Simular</button>
                </div>
                </form>
            </div>  
        </div>
    </div>
</div>


<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($contratos as $contrato)
                <div class="col-xl-4 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                        @if ($contrato->image)
                        <img src="http://ativos-master.test/storage/{{ $contrato->image }}"  style="border-radius: 5px; background-size: cover; background-position: center top; max-width: 500px; max-height: 400px;">
                        <div class="header align-items-center" >
                            @endif
                            <!-- Mask -->
                            <span class="mask bg-gradient-default opacity-3"></span>
                            <!-- Header container -->                            
                        </div>
                        <div>
                            <br>
                            <div class="col text-center">
                                @if($contrato->status == "ENCERRADO")
                                    <a  class="btn btn-secondary btn-sm"> CAPTAÇÃO {{ $contrato->status }}</a>
                                @else()
                                    <a href="{{ route('propostas.show', $contrato->id) }}" class="btn btn-success btn-sm">CAPTACÃO ABERTA</a>
                                @endif
                            </div>
                            <br>

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
                                    <div class="row">
                                        <div class="col text-center">
                                            <a href="{{ route('propostas.single', ['slug' => $contrato->slug]) }}" class="btn btn-secondary btn-lg btn-block">SAIBA MAIS</a>
     
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