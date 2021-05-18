@include('layouts.head')
@include('layouts.unesp_header')
@include('layouts.header')
<!-- Home content  --> 
        <main>
            <div class="container interna">
                <div class="row">
                    <div class="col">
                        @if (count($results["metas"]) >= 1)
                            
                            <div class="tab-content" >
                                @foreach ($results['metas'] as $metas )
                                    <div class="tabs tab-{{$loop->index}}" >
                                        <div class="card details">
                                            <div class="card-header border-0">
                                                <div class="meta-id" >
                                                        <span>meta</span>
                                                        <span>{{$metas["id"]}}</span>
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
                <div class="row">
                    <div class="col">
                        <div class="card interna">
                            <div class="card-header">
                                <h5>Objetivos globais para o Desenvolvimento Sustentável</h5>
                            </div>
                            <div class="card-body">
                                <div class="ods-list">
                                    @if (count($ods) >=1 )
                                        @foreach ($ods as $key => $item)
                                            @if($loop->index >= 6) 
                                                
                                            @else
                                                <span><img src="{{asset('images/'.$item->id.'-icon.png')}}" alt="{{$item->titulo}}"></span> 
                                            @endif
                                        @endforeach
                                        </ul>
                                    @else
                                        <p>sem registros</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card interna">
                            <div class="card-header">
                                <h5>Metas do PNE</h5>
                            </div>
                            <div class="card-body">
                                <div class="pne-list">
                                    @if (count($pne) >=1 )
                                        @foreach ($pne as $key =>$item)
                                            <span>{{$item['id']}}. {{$item['titulo']}}</span> 
                                           
                                        @endforeach
                                        </ul>
                                    @else
                                        <p>sem registros</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card interna">
                            <div class="card-header">
                                <h5>Serie historica</h5>
                            </div>
                            <div class="card-body">
                                <div class="graficoInterna" id="{{$metas['id']}}" data-grafico="[2290,2600,3250,3620,4200]" >
                                    <canvas id="metaChart-{{$metas['id']}}" width="100%" height="40%"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card interna">

                            <div class="card-header">
                                <h5>AÇÔES</h5>
                            </div>

                            <div class="card-body pne-list">
                                <div class="list-group" id="eixoList" role="tablist">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-action active" data-target="#eixo-1"">
                                            <a class="eixos-mn" data-toggle="list" href="#eixo-1" role="tab">Eixo 1</a>
                                        </li>
                                        <li class="list-group-item list-group-item-action "  data-target="#eixo-2"">
                                            <a class="eixos-mn" data-toggle="list" href="#eixo-2" role="tab">Eixo 2</a>
                                        </li>
                                        <li class="list-group-item list-group-item-action " data-target="#eixo-3"">
                                            <a class="eixos-mn"  href="#eixo-3" data-toggle="list" role="tab">Eixo 3</a>
                                        </li>
                                        <li class="list-group-item list-group-item-action " data-target="#eixo-4"">
                                            <a class="eixos-mn" data-toggle="list" href="#eixo-4" role="tab">Eixo 4</a>
                                        </li>
                                        <li class="list-group-item list-group-item-action " data-target="#eixo-5"" >
                                            <a class="eixos-mn" data-toggle="list" href="#eixo-5" role="tab">Eixo 5</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content acoes-box">
                                    <div class="tab-pane active" id="eixo-1" role="tabpanel">
                                        <h3>Modernização administrativa e eficiência na gestão de recursos financeiros</h3>

                                        <div class="acao-list table-responsive">
                                            <div class="objetivos">
                                                <small>Objetivo específico</small>
                                                <p>1. Garantir o adequado funcionamento das estruturas básicas para as atividades de pesquisa e extensão.</p>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ação</th>
                                                        <th scope="col">Ator envolvido</th>
                                                        <th scope="col">2021</th>
                                                        <th scope="col">2022</th>
                                                        <th scope="col">2023</th>
                                                        <th scope="col">2024</th>
                                                        <th scope="col">2025</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Abertura de vestibular para dois novos cursos</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aumentar número de vagas para 300</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Criar o portal de egressos</th>
                                                        <td>STI</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="acao-list table-responsive">
                                            <div class="objetivos">
                                                <small>Objetivo específico</small>
                                                <p>2. Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias.</p>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ação</th>
                                                        <th scope="col">Ator envolvido</th>
                                                        <th scope="col">2021</th>
                                                        <th scope="col">2022</th>
                                                        <th scope="col">2023</th>
                                                        <th scope="col">2024</th>
                                                        <th scope="col">2025</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Abertura de vestibular para dois novos cursos</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aumentar número de vagas para 300</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Criar o portal de egressos</th>
                                                        <td>STI</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="eixo-2" role="tabpanel">
                                        <h3>Modernização administrativa e eficiência na gestão de recursos financeiros</h3>
                                        
                                        <div class="acao-list table-responsive">
                                            <div class="objetivos">
                                                <small>Objetivo específico</small>
                                                <p>2. Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias.</p>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ação</th>
                                                        <th scope="col">Ator envolvido</th>
                                                        <th scope="col">2021</th>
                                                        <th scope="col">2022</th>
                                                        <th scope="col">2023</th>
                                                        <th scope="col">2024</th>
                                                        <th scope="col">2025</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Abertura de vestibular para dois novos cursos</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aumentar número de vagas para 300</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Criar o portal de egressos</th>
                                                        <td>STI</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="eixo-3" role="tabpanel">
                                        <h3>Modernização administrativa e eficiência na gestão de recursos financeiros</h3>
                                        
                                        <div class="acao-list table-responsive">
                                            <div class="objetivos">
                                                <small>Objetivo específico</small>
                                                <p>2. Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias.</p>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ação</th>
                                                        <th scope="col">Ator envolvido</th>
                                                        <th scope="col">2021</th>
                                                        <th scope="col">2022</th>
                                                        <th scope="col">2023</th>
                                                        <th scope="col">2024</th>
                                                        <th scope="col">2025</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Abertura de vestibular para dois novos cursos</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aumentar número de vagas para 300</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Criar o portal de egressos</th>
                                                        <td>STI</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <div class="tab-pane" id="eixo-4" role="tabpanel">
                                        <h3>Modernização administrativa e eficiência na gestão de recursos financeiros</h3>
                                        

                                        <div class="acao-list table-responsive">
                                            <div class="objetivos">
                                                <small>Objetivo específico</small>
                                                <p>1. Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias.</p>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ação</th>
                                                        <th scope="col">Ator envolvido</th>
                                                        <th scope="col">2021</th>
                                                        <th scope="col">2022</th>
                                                        <th scope="col">2023</th>
                                                        <th scope="col">2024</th>
                                                        <th scope="col">2025</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Abertura de vestibular para dois novos cursos</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aumentar número de vagas para 300</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Criar o portal de egressos</th>
                                                        <td>STI</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>

                                    <div class="tab-pane" id="eixo-5" role="tabpanel">
                                        <h3>Modernização administrativa e eficiência na gestão de recursos financeiros</h3>
                                        

                                        <div class="acao-list table-responsive">
                                            <div class="objetivos">
                                                <small>Objetivo específico</small>
                                                <p>1. Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias.</p>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Ação</th>
                                                        <th scope="col">Ator envolvido</th>
                                                        <th scope="col">2021</th>
                                                        <th scope="col">2022</th>
                                                        <th scope="col">2023</th>
                                                        <th scope="col">2024</th>
                                                        <th scope="col">2025</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Abertura de vestibular para dois novos cursos</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aumentar número de vagas para 300</th>
                                                        <td>PROGRAD</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Criar o portal de egressos</th>
                                                        <td>STI</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                        <td>100%</td>
                                                    </tr>
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
        </main>
        <!-- #end Homr content  -->
@include('layouts.footer')