@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-1 pt-5 pt-md-8">
   
</div>
<div class="container-fluid">
    <div class="header-body">
        <div class="row">
                <div class="col-xl-6 mr-0 mt--4">
                    <div class="card shadow mb-4 mb-xl-0">
                        @if ($contrato->image)
                    <img src="http://ativos-master.test/storage/{{ $contrato->image }}"  style="border-radius: 5px; background-size: cover; background-position: center top; max-width: 500px; max-height: 400px;">

                        <div class="header align-items-center">
                            
                            @endif
                            <!-- Mask -->
                            <span class="mask bg-gradient-default opacity-3"></span>
                            <!-- Header container -->                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-6 mr-0">
                    <div class="col mb-4 mb-xl-0">
                        <div>                            
                            <div class="card-body">
                                <button type="button" class="btn btn-secondary btn-sm">{{ $contrato->setor->nome }}</button>
                                <br>
                                <br>
                                <h1 class="card-title-white text-left">{{ $contrato->titulo }}</h1> 
                                <p>{{ $contrato->sub_titulo }}</p>
                                <div class="row">
                                    <div class="col text-left">
                                        <h4 class="card-title-white">Rentabilidade Alvo:</h4>
                                    </div>
                                    <div class="col text-right">
                                        <p class="card-title-white">{{ $contrato->rentabilidade_alvo }}%</p>
                                    </div> 
                                </div>
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
                                        <p class="card-title-white">{{ $contrato->participacao }}% ao dia</p>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <h4 class="card-title-white">Valor Captado:</h4>
                                    </div>
                                    <div class="col text-right">

                                        <p class="card-title-white">R$ {{ $contratouser->sum('total') }}</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
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
        <hr>
        <div class="container-fluid">
            <div class="header-body">
                <div class="row ">
                    <div class="col text-center mb-xl-0">
                        <div class="col mb-4 mb-xl-0">
                            <div class="table-responsive mb-4 mb-xl-0">
                                <table class="table align-items-center table-flush">
                                    <br>
                                    <h1>SOBRE O INVESTIMENTO</h1>
                                    <p>{{ $contrato->body }}</p>
                                    <br>
                                    <img src="http://ativos-master.test/storage/{{ $contrato->image_body }}"  style="border-radius: 5px; background-size: cover; background-position: center top; max-width: 500px; max-height: 400px;">
                                    <br>
                                    <h1>O PROJETO</h1>
                                    <p>{{ $contrato->body_2 }}</p>
                                    <br>
                                    <img src="http://ativos-master.test/storage/{{ $contrato->image_body2 }}"  style="border-radius: 5px; background-size: cover; background-position: center top; max-width: 500px; max-height: 400px;">
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
