@extends('layouts.app')

@section('content')

<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
    <h1 class="text-center text-white">Entre em nossos grupos do Whatsapp</h1>
    <p class="text-center text-white">E fique por dentro de todas as novidades</p>
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            {{--<div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-0">JÁ FORAM RESGATADOS</h4>                                    
                                    <span class="h2 font-weight-bold mb-0">{{ $gestores->sum('total') }} amigos</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-0">Convide amigos</h4>
                                    <span class="h2 font-weight-bold mb-0">agora</span>
                                </div>
                                <div class="col-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                        convidar
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Escolha por onde enviar o convite...</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Seu link de indicação:</p>
                                                    <script>
                                                        function copiarTexto() {
                                                          var textoCopiado = document.getElementById("link");
                                                          textoCopiado.select();
                                                          document.execCommand("Copy");
                                                        }
                                                      </script>

                                                    <div class="input-group mb-3">
                                                        <input type="text" id="link" name="link" class="form-control" value="teste"> 
                                                        <div class="input-group-append">
                                                        <button class="btn btn-outline-success" type="button" onClick="copiarTexto()" data-toggle="tooltip" data-placement="top" title="Copiar"><span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <div class="col text-center">
                                                        <button type="button" class="btn btn-success text-center">
                                                            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                                            Compartilhar via Whatsapp
                                                        </button>
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
            </div>--}}
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="header-body">
                <div class="row ">
                    <div class="col">
                        <div class="card shadow"> 
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Basta Clicar</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" width="100">Grupo</th>
                                            <th scope="col" width="100">Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ $grupo->titulo }}</td>
                                            <td><a href="https://api.whatsapp.com/send?phone=55{{ $grupo->link }}" target="_blank">{{ $grupo->link }}</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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