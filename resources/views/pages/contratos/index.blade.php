@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Meus Contratos</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($contratousers as $contratouser)
            @if($contratouser->user_id == auth()->user()->id)
            <div class="col-xl-4 mr-0">
                <div class="card shadow mb-4 mb-xl-4">
                    <div>
                        <br>
                        <h2 class="card-title-white text-center" >#ID: {{ $contratouser->contrato->id }}</h2>
                        <h2 class="card-title-white text-center" >{{ $contratouser->contrato->titulo }}</h2>
                        @if($contratouser->contrato->status == "LISTA DE ESPERA")
                            <h3 class="text-center text-warning ">{{ $contratouser->contrato->status }}</h3>
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
                                        <p class="card-title-white">R${{ $contratouser->valor }}</p>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <h4 class="card-title-white">Rentabilidade Alvo:</h4>
                                    </div>
                                    <div class="col text-right">
                                        <p class="card-title-white ">{{ $contratouser->contrato->rentabilidade_alvo }}%</p>
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
                                    <div class="col text-left">
                                        <a href="{{ route('propostas.single', ['slug' => $contratouser->contrato->slug]) }}" class="btn btn-secondary btn-sm">DETALHES</a>
 
                                    </div>
                                
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-block btn-warning btn-sm " data-toggle="modal" data-target="#modal-notification-{{ $contratouser->contrato->id }}">STATUS</button>
                                        <div class="modal fade" id="modal-notification-{{ $contratouser->contrato->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                          <div class="modal-content bg-gradient-danger">
                                              
                                              <div class="modal-header">
                                                  <h4 class="modal-title" id="modal-title-notification">Titulo fixo aqui...</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                  </button>
                                              </div>
                                              
                                              <div class="modal-body">
                                                  
                                                  <div class="py-3 text-center">
                                                      <i class="ni ni-bell-55 ni-3x"></i>
                                                      <h3 class="heading mt-4">Obrigado por investir conosco!</h3>
                                                      <h4 class="heading mt-4">{{ $contratouser->contrato->titulo }}:</h4>

                                                      <p>{{ $contratouser->status }}</p>
                                                  </div>
                                                  
                                              </div>

                                              
                                              <div class="text-center">
                                                  <button type="button" class="btn btn-white ml-auto" data-dismiss="modal">Ok, entendi</button>
                                                  <br>
                                              </div>
                                              <br>
                                          </div>
                                      </div>
                                  </div>
                                  
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            @else
               
            @endif
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