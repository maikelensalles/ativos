@extends('layouts.app')

@section('content')
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <h1 class="text-center text-white display-3">Novidades da Plataforma</h1>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            @foreach ($novidades as $novidade)
                <div class="col-xl-6 mr-0">
                    <div class="card shadow mb-4 mb-xl-4">
                            <div class="card-body">
                                <h2>{{ $novidade->titulo }}</h2>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="text-gray">{{ $novidade->user->name }} | {{ date( 'd/m/Y' , strtotime($novidade->created_at)) }} {{ date( 'H:i' , strtotime($novidade->created_at)) }}</h4>
                                    </div>
                                </div>
                                
                                <p class="card-text"><b>{{ $novidade->descricao }}</b></p>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal-{{ $novidade->id }}">
                                    Saiba Mais
                                </button>
                            </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $novidade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Novidade</h4>
                                        
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-10 ">
                                                <h1>{{ $novidade->titulo }}</h1>
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="text-gray">{{ $novidade->user->name }} | {{ date( 'd/m/Y' , strtotime($novidade->created_at)) }} {{ date( 'H:i' , strtotime($novidade->created_at)) }}</h4>
                                                    </div>
                                                </div>
                                                
                                                <p>{{ $novidade->sub_titulo }}</p>
                                                <br>
                                                <p>{{ $novidade->descricao }}</p>
                                                <p>{{ $novidade->descricao_longa }}</p>
                                                <tr>
                                                    <td>
                                                        @if ($novidade->image)
                                                            <img src="http://ativos-master.test/storage/{{ $novidade->image}}" style="border-radius: 2px; background-size: cover; background-position: center top; max-width: 350px; max-height: 350px;">
                                                        @endif
                                                    </td>  
                                                </tr>
                                                <br>
                                                <br>
                                                <p>{{ $novidade->descricao_media }}</p>
                                                <p>{{ $novidade->obs }}</p>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                    {{--<button type="button" class="btn btn-primary">Concluído</button>--}}
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                                    <!-- APERTOU CONCLUIDO, TEM QUE ALTERAR STATUS DO PEDIDO + RETIRAR DA LISTA ATUAL -->
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


    
    

