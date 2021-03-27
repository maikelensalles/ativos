@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
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
                                            <p class="card-title-white ">{{ $contrato->participacao }}% ao dia</p>
                                        </div> 
                                    </div>
                                    {{--<div class="row">
                                        <div class="col text-left">
                                            <h4 class="card-title-white">Valor Captado:</h4>
                                        </div>
                                        @foreach ($contratousers as $contratouser)
                                        @if($contratouser->status == "Aprovado")
                                        @if($contratouser->contrato_id == $contrato->id)
                                        <div class="col text-right">
                                            <p class="card-title-white ">R${{ $contratouser->valor   }}</p>
                                        </div> 
                                        @else
                                        @endif
                                        @else
                                        @endif
                                        @endforeach
                                    </div>--}}
                                
                                    <hr>
                                    <div class="row">
                                        <div class="col text-left">
                                            <a href="{{ route('propostas.single', ['slug' => $contrato->slug]) }}" class="btn btn-secondary btn-sm">DETALHES</a>
     
                                        </div>
                                        <div class="col text-right">
                                            @if($contrato->status == "ENCERRADO")
                                                <a  class="btn btn-secondary btn-sm">{{ $contrato->status }}</a>
                                            @else
                                                <a href="{{ route('propostas.show', $contrato->id) }}" class="btn btn-warning btn-sm">{{ $contrato->status }}</a>
                                            @endif
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
