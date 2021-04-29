
<div class="container-fluid {{!$isHome ? 'single' : '' }}">
    <header >
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
                <figure aria-label="Plano de Desenvolvimento Institucional Unifesp">
                    <a href="{{getenv('APP_URL')}}">
                        <img src="{{asset('images/logo.png')}}" class="rounded mx-auto d-block" alt="PDI 2021-2025">
                    </a>
                </figure>
            </div>
        </div>
    </header> 