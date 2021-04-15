<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"  content="text/html;charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        
        {{-- unifesp--}}
        <link rel="stylesheet" type="text/css" href="https://webcode.unifesp.br/header-unifesp/style.css">


    <title>@yield('header_title', 'Pdi')</title>
</head>
    <body>
    <!-- UNIFESP header  -->
        <div id="unifesp-bar"></div>
        <div id="unesp-header"></div>
    <!-- #end UNIFESP header  -->

<!-- Monitor content  -->
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-12">
                    <!-- content header -->
                    <div class="content-header">
                        <nav>
                            <div class="nav">
                                <ul class="nav justify-content-end" id="navmenu" role="tablist">
                                    @foreach ($navmenu as $key => $mn )
                                        <li class="{{ $mn['class'] }} " role="{{ $mn['role'] }}">
                                        <a href="{{$mn['link']}}" class="nav-link {{$mn['item_class']}} txt-capitalize border-0 rounded" id="{{ $mn['tab'] }}-tab"  >{{ $mn['title'] }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- #end header -->
                </div>
                <div class="col-12">
                    <hgroup>
                        @if ($mobile)
                            <h1>Plano de Desenvolvimento Institucional | Unifesp</h1>
                        @endif
                        <figure>
                            <img src="{{ asset('images/logos.png')}}" class="rounded mx-auto d-block" alt="PDI 2021-2025">
                        </figure>
                    </hgroup>
                </div>
            </div>
            <div class="container status-metas">
                <div class="row">
                    @foreach ($data["status_indicadores"] as $key => $value )
                        <div class="col-4">
                            <div class="button-metas">
                                <div class="btn btn-outline-secondary border-light">
                                    <p>{{ $value["valor"]}}</p>
                                    <p>{{ $value["legenda"]}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div> 
        </header>
        <main>
            <div class=" head-filtros">
                <div class="row">
                    <div class="col-12">
                        <small>Use um dos filtros abaixo</small>
                    </div>
                </div>
            </div>
            <div class="box-filtros">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-filters">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                    <div class="col-6"> 
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class=" head-metas">
                <div class="row">
                    <div class="col-12">
                        <small>Ver todas as metas</small>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            @foreach ($navmenu as $key => $mn )
                                <div class="tab-pane {{$mn['item_class']}}" id="{{$mn['tab']}}" role="{{$mn['role']}}" aria-labelledby="{{$mn['tab']}}-tab">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="meta-id">
                                                <span>meta</span>
                                                <span>{{$key}}</span>
                                            </div>
                                            <div class="meta-descricao">
                                                <p>Special title treatment</p>
                                            </div>
                                            <div class="meta-buttons">
                                                <a href="#" class="btn btn-secondary"><i class="bi bi-pie-chart-fill"></i></a>
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bell-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body border-0">
                                          <h5 class="card-title">Special title treatment</h5>
                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                          
                                        </div>
                                        <div class="card-footer text-muted">
                                          2 days ago
                                        </div>
                                      </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div>
                <div>

                </div>
            </div>
        </footer>
    </div>
<!-- #end Monitor content  -->

    <!-- Scripts -->

    {{-- <script id="unifesp-js-code" src="https://webcode.unifesp.br/header-unifesp/script.js"></script> --}}
    <script id="unifesp-js-code" src="https://webcode.unifesp.br/header-unifesp/script.js?campus=barra-reitoria"></script>  
      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </body>
</html>