<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/icone.png" class="navbar-brand-img" alt="..." style=" max-width: 90px; max-height: 40px;">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                                @if (auth()->user()->image)
                                <img src="{{ url('storage/'. auth()->user()->image) }}" alt="{{ auth()->user()->name }}">
                                @else
                                <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/sem-foto.jpg">
                                @endif                            
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Seja Bem Vindo!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Meu perfil') }}</span>
                    </a>
                   {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Sair') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="..." style=" max-width: 250px; max-height: 100px;">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form 
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>-->
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                         {{ __('Minha carreira') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#nabar" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="nabar">
                        <i class="fas fa-chevron-down text-secondary"></i>
                        <span class="nav-link-text">{{ __('Meus investimentos') }}</span>
                    </a>

                    <div class="collapse" id="nabar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resgates.create') }}">
                                     {{ __('Resgatar') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    {{ __('Antecipar') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('propostas.index') }}">
                                     {{ __('Investir') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                     {{ __('Extrato') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#naba" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="naba">
                        <i class="fas fa-chevron-down text-secondary"></i>
                        <span class="nav-link-text">{{ __('Contratos') }}</span>
                    </a>

                    <div class="collapse" id="naba">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contratos.index') }}">
                                 {{ __('Recebidos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    {{ __('Pendentes') }}
                                </a>
                            </li>
                        
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#nab" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="nab">
                        <i class="fas fa-chevron-down text-secondary"></i>
                        <span class="nav-link-text">{{ __('Resgates') }}</span>
                    </a>

                    <div class="collapse" id="nab">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resgates.create') }}">
                                 {{ __('Recebidos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    {{ __('Pendentes') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="#na" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="na">
                        <i class="fas fa-chevron-down text-secondary"></i>
                        <span class="nav-link-text">{{ __('Antecipação') }}</span>
                    </a>

                    <div class="collapse" id="na">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                 {{ __('Recebidos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    {{ __('Pendentes') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contratos.index') }}">
                     {{ __('Meus Contratos') }}
                    </a>
                </li>

                

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('novidades.index') }}">
                        {{ __('Notícia') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gestores.index')}}">
                         {{ __('Relátório') }}
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link " href="#navbar" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar">
                        
                        <span class="nav-link-text">{{ __('Mais') }}</span>
                    </a>

                    <div class="collapse" id="navbar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cadastros.edit') }}">
                                 
                                    {{ __('Dados cadastrais') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('propostas.search') }}">
                                    {{ __('Grupos WhatsApp') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('propostas.search') }}">
                                    {{ __('Simulador') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        @if (auth()->user()->image)
                                <img alt="Image placeholder" src="{{ url('storage/'. auth()->user()->image) }}" alt="{{ auth()->user()->name }}" class="rounded-circle">
                                @else
                                <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/sem-foto.jpg" class="rounded-circle">
                                @endif
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold"></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ __('Seja Bem Vindo!') }}</h6>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>{{ __('Meu perfil') }}</span>
                </a>
               {{-- <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>{{ __('Settings') }}</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>{{ __('Activity') }}</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>{{ __('Support') }}</span>
                </a>--}}
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>{{ __('Sair') }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>