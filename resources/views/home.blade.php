@include('layouts.head')
@include('layouts.unesp_header')
@include('layouts.header')
<!-- Home content  --> 
        <main>
            <div class="box-filtros">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-filters">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Escolha o grande tema estrategico</option>
                                        
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                    <div class="col-6"> 
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Escolha o ODS</option>
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
                                            <option selected>Escolha o objetivo ouse</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Escolha o ano de referência</option>
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
                        {{-- <small><em>Ver todas as metas</em></small> --}}
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        @if (count($results["metas"]) >= 1)
                            
                            <div class="tab-content" >
                                @foreach ($results['metas'] as $metas )
                                    <div class="tabs tab-{{$loop->index}}" >
                                        <div class="card details">
                                            <div class="card-header border-0">
                                                <div class="meta-id" >
                                                    <a href="{{route('public_metas_view',$metas['id'])}}">
                                                        <span>meta</span>
                                                        <span>{{$metas["id"]}}</span>
                                                    </a>
                                                </div>
                                                <div class="meta-descricao">
                                                    <div class="tema">
                                                        <small>Grande Tema Estratégico</small>
                                                        <p>{{$metas["indicadores"][0]["titulo"] ?? 'sem registro'}}</p>
                                                    </div>
                                                    <div class="objetivo">
                                                        <small>Objetivo Ouse</small>
                                                        <p>{{$metas["titulo"]}}</p>
                                                    </div>
                                                </div>
                                                <div class="meta-buttons">
                                                    <div>
                                                        <a href="#" class="btn btn-primary" data-target="{{$loop->index}}" data-content="notify">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                                            </svg>
                                                            <span>Receber notificações</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn btn-secondary" data-target="{{$loop->index}}" data-content="details">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                                                <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z"/>
                                                            </svg>
                                                            <span>Detalhes da meta</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-0">
                                                <div class="dados">
                                                    <small>Indicador</small>
                                                    <h5 class="card-title">{{$metas["indicadores"][0]["titulo"] ?? 'sem registro'}}</h5>
                                                    <div class="card-text">
                                                        <small>Ano referência</small>
                                                        <p>2021</p>
                                                    </div>
                                                    <div class="card-text">
                                                        <small>Meta do indicador</small>
                                                        <p>{{$metas["indicadores"][0]["valor_final"] ?? '4200'}}</p>
                                                    </div>
                                                    <div class="card-text">
                                                        <small>Valor do indicador</small>
                                                        <p>{{$metas["indicadores"][0]["valor"] ?? '3290'}}</p>
                                                    </div>
                                                    <div class="andamento">
                                                        <span>{{$metas["indicadores"][0]["valor_inicial"] ?? '50'}}%</span>
                                                        <span>Andamento geral</span>
                                                    </div>
                                                </div>
                                                <div class="grafico" id="{{$metas['id']}}" data-grafico="[{{$metas["indicadores"][0]["valor_atual"]}},{{$metas["indicadores"][0]["valor_meta"]}}]" >
                                                    <canvas id="homeChart-{{$metas['id']}}" width="100%" height="60%"></canvas>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="card notify" style="display: none">
                                            <div class="card-header border-0">
                                                <div class="meta-descricao">
                                                    <h5>Receba atualizações sobre esta meta no seu email</h5>
                                                    <small> Preencha os campos abaixo:</small>
                                                </div>
                                                <div class="meta-buttons">
                                                    <div>
                                                        <a href="#" class="btn btn-primary" data-target="{{$loop->index}}" data-content="notify">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                                            </svg>
                                                            <span>Receber notificações</span>
                                                        </a>
                                                    </div>

                                                    
                                                    <div>
                                                        <a href="#" class="btn btn-secondary" data-target="{{$loop->index}}" data-content="details">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pie-chart-fill" viewBox="0 0 16 16">
                                                                <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778l-5.5 5.5zM8.5.015V7.5h7.485A8.001 8.001 0 0 0 8.5.015z"/>
                                                            </svg>
                                                            <span>Detalhes da meta</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border-0">
                                                <form class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <label for="nome" class="sr-only">Nome</label>
                                                        <input type="text" name="nome" class="form-control" id="nome" value="">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="email" class="sr-only">Email</label>
                                                        <input type="text" name="email" class="form-control" id="email" value="">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            
                        <div class="tab-content" >
                                <div class="tabs tab-none" >
                                    <div class="card noresults">
                                        <p>Nenhum resultado encontrado</p>
                                    </div>
                                </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
        <!-- #end Homr content  -->
@include('layouts.footer')