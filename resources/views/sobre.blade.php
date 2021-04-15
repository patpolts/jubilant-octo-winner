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
        <link rel="stylesheet" href="{{getenv('APP_URL')}}css/home.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        
        {{-- unifesp--}}
        <link rel="stylesheet" type="text/css" href="https://webcode.unifesp.br/header-unifesp/style.css">


    <title>@yield('header_title', 'Pdi')</title>
</head>
    <body>
        <!-- UNIFESP header  -->
            <div id="unifesp-bar"></div>
            <div id="unesp-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-2">
                            <figure>
                                <img src="{{asset('images/header-logo.jpeg')}}" class="rounded mx-auto d-block" alt="Unifesp">
                            </figure>
                        </div>
                        <div class="col-8">
                            <h1>SuperintendÊncia de tecnologia da informação</h1>
                            <small>universidade federal de são paulo</small>
                        </div>
                        <div class="col-2">
                            <form action="">
                                <input type="search" name="search" class="form-control" placeholder="search">
                                {{-- <div class="input-group-text">@</div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <a href="{{$mn['link']}}" class="nav-link {{$mn['item_class']}} txt-capitalize  rounded" id="{{ $mn['tab'] }}-tab" >{{ $mn['title'] }}</a>
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
            </div> 
        </header>
        <main>
            <div class="content-sobre">
                <div class="container  border-ligt rounded">
                    <div class="row">
                        <div class="card">
                            <div class="col-12">
                                <h1>Sobre o PDI</h1>
                            </div>
                            <div class="col-12">
                                <p class="text-justify">
                                    O Plano de Desenvolvimento Institucional-PDI 2021 - 2025 é o documento que orienta a
                                    universidade em suas ações e desenvolvimento durante o período de cinco anos. Apresenta as
                                    estratégias a serem adotadas, estabelece objetivos e metas, busca consolidar diretrizes,
                                    identidade e princípios comuns a todos. Articula-se, de forma direta, com o Projeto
                                    Pedagógico Institucional-PPI, estruturando condições para sua adoção e desenvolvimento ao
                                    longo do tempo.
                                </p>
                                <p>
                                    Está alinhado com Metas e Estratégias do Plano Nacional de Educação e do ponto de vista
                                    global busca alinhamento com a Agenda 2030 para o Desenvolvimento Sustentável da
                                    Organização Nações Unidas, através dos 17 ODS – Objetivos para o Desenvolvimento
                                    Sustentável. Integra o processo avaliativo da universidade junto ao MEC e é o documento mais
                                    importante para informar a sociedade sobre o que fazemos e o que pretendemos alcançar.
                                </p>
                            </div>
                            <div class="col-12">
                                <h1>Missão</h1>
                            </div>
                            <div class="col-12">
                                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                            </div>
                            <div class="col-12">
                                <h1>Visão</h1>
                            </div>
                            <div class="col-12">
                                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                            </div>
                            <div class="col-12">
                                <h1>Valores</h1>
                            </div>
                            <div class="col-12">
                                <div class="select-group">
                                    @for ($i=0; $i <= 10; $i++)
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    @endfor
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary">Baixar PDI</button>
                                <button type="button" class="btn btn-primary">Baixar PPI</button>
                            </div>
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