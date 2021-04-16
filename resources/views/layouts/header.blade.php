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
                    @if ($mobile)
                        <hgroup>
                            <h1>Plano de Desenvolvimento Institucional | Unifesp</h1>
                        </hgroup>
                    @endif
                    <figure>
                        <img src="{{asset('images/logo.jpeg')}}" class="rounded mx-auto d-block" alt="PDI 2021-2025">
                    </figure>
            </div>
        </div>
        @if ($isHome)
            <div class="container status-metas">
                <div class="row">
                    @foreach ($data["status_indicadores"] as $key => $value )
                        <div class="col-4">
                            <div class="button-metas">
                                <div class="btn btn-outline-secondary border-light">
                                    <span>{{ $value["valor"]}}</span>
                                    <span>{{ $value["legenda"]}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div> 
        @endif
    </header> 