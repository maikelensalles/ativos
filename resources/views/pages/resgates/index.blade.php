@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Solicitações de Resgate</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            
            <div class="col">

                <div class="card shadow"> 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Solicitações de resgate</h3>
                                <p>Algo aqui</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Saldo disponivel</th>
                                    <th scope="col">Data de solicitação</th>
                                    <th scope="col" width="100">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contratousersaques as $contratousersaque)
                                @if($contratousersaque->user_id == auth()->user()->id)
                                @if($contratousersaque->deleted_at == NULL)
                                @if($contratousersaque->status_saque == NULL)

                                <tr>
                                    <td>R${{ $contratousersaque->saque}}</td>
                                    <td>R$0</td>
                                    
                                    <td>{{ date( 'd/m/Y' , strtotime($contratousersaque->created_at)) }}</td>
                                        <td>
                                            <div class="col text-left">
                                                <a href="#" class="btn btn-secondary btn-sm">Algo aqui</a>
                                            </div>
                                            <br>
                                        </td>
                                    </tr>
                                @else
                                @endif

                                @else
                                @endif

                                @else
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @if (isset($filters))
                            {!! $contratousersaques->appends($filters)->links() !!}
                            @else
                            {!! $contratousersaques->links() !!}
                            @endif
                    </div>
                </div>
<br>
                <div class="card shadow"> 
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Resgates aprovados</h3>
                                <p>Todos os saques efetuados com sucesso</p>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data de pagamento</th>
                                    <th scope="col" width="100">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contratousersaques as $contratousersaque)
                                @if($contratousersaque->deleted_at == NULL)
                                @if($contratousersaque->status_saque == "Finalizado")

                                <tr>
                                    <td>R${{ $contratousersaque->saque }}</td>
                                    <td>{{ date( 'd/m/Y' , strtotime($contratousersaque->created_at)) }}</td>
                                    <td>
                                        <div class="col text-left">
                                            <form action="#">
                                                <button type="submit" class="btn btn-success btn-sm">Atualizar</button>
                                            </form>  
                                        </div>
                                    <br>                                            
                                    </td>
                                </tr>
                                    @else
                                    @endif

                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <br>
            </div>

            {{--@foreach ($contratousersaques as $contratousersaque)
            @if($contratousersaque->user_id == auth()->user()->id)
            <div class="col-xl-6 mr-0">
                <div class="card shadow mb-4 mb-xl-4">
                    <div>
                        <br>
                        <h3 class="card-title-white text-center">{{ $contratousersaque->solicitacao }}</h3>
                        <h3 class="card-title-white text-center">#ID: {{ $contratousersaque->contrato_id }}</h3>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <h2 class="text-green">R$ {{ $contratousersaque->saque }}</h2>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    {{--<div class="col text-left">
                                        <a href="{{ route('propostas.single', ['slug' => $contratousersaque->contrato->contrato_id->slug]) }}" class="btn btn-secondary btn-sm">DETALHES</a>
                                    </div>
                                    <div class="col text-right">
                                        <button type="button" class="btn btn-block btn-warning btn-sm " data-toggle="modal" data-target="#modal-notification-{{ $contratousersaque->contrato }}">STATUS</button>
                                        <div class="modal fade" id="modal-notification-{{ $contratousersaque->contrato }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                                                      <h4 class="heading mt-4"></h4>
                                                      <p>{{ $contratousersaque->status_saque }}</p>
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
            @endforeach--}}

        </div>
    </div>
</div>
@include('layouts.footers.auth')
@endsection
