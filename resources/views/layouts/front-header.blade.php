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
                                        <a href="{{$mn['link']}}" class="nav-link {{$mn['item_class']}} txt-capitalize border rounded" id="{{ $mn['tab'] }}-tab" data-bs-toggle="tab" data-bs-target="#{{$mn['tab'] }}" type="button" role="tab" aria-controls="{{ $mn['tab'] }}" aria-selected="true">{{ $mn['title'] }}</a>
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