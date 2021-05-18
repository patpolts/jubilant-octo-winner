@extends('layouts.admin')
@section('header_title', $header_title)

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    @section('title', $title)
</h2>
<!-- Content -->
@section('content')
    <!-- Content -->
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item active" aria-current="adicionar"><a href="{{ route('metas_adicionar') }}">Adicionar</a></li>
                        
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                  @if ($message)
                    <div class="card">
                      <div class="card-body"> 
                        <p>{{$message}}</p>
                        <a class="btn btn-outline" href="javascript: history.back(-1);">Voltar</a>
                      </div>
                    </div>
                  @else
                      
                    <div>
                      <form action="{{$url}}" method="POST" name="addMetas">
                        @csrf
                        <div class="form-group">
                          <label for="data-titulo">Titulo</label>
                          <input name="dataTitulo" type="text" class="form-control" id="data-titulo" aria-describedby="tituloHelp">
                          <small id="tituloHelp">Identificação única relacionada a meta</small>
                        </div>
                        <div class="form-group">
                          <label for="data-descricao">Descrição</label>
                          <input name="dataDescricao" type="text" class="form-control" id="data-descricao" aria-describedby="tituloHelp">
                          <small id="tituloHelp">Descrição ou observação da meta</small>
                        </div>
                        <div class="form-group">
                          <label for="data-indicadores">Indicadores</label>
                              <select name="dataIndicadores" id="data-indicadores">
                            @if (count($results['indicadores']) >=1)
                                
                              @foreach ($results['indicadores'] as $idc)
                                  <option value="{{$idc['id']}}">{{$idc['titulo']}}</option>
                              @endforeach
                            @else
                                  <option value="0">sem indicador</option>
                            @endif
                              </select>
                        </div>
                        <div class="form-group">
                          <label for="data-objetivo">Objetivos</label>
                            <select name="dataObjetivos" id="data-objetivo">
                              @if (count($results['objetivos']) >=1)
                                @foreach ($results['objetivos'] as $obj)
                                    <option value="{{$obj['id']}}">{{$obj['titulo']}}</option>
                                @endforeach
                              @else
                                    <option value="0">sem objetivo</option>
                              @endif
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="data-eixo">Eixos</label>
                          <select name="dataEixos" id="data-eixo">
                              @if (count($results['eixos']) >=1)
                                @foreach ($results['eixos'] as $eixo)
                                  <option value="{{$eixo['id']}}">{{$eixo['titulo']}}</option>
                                @endforeach
                              @else
                                  <option value="0">sem eixo</option>
                              @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-ods">Ods</label>
                          <select name="dataOds" id="data-ods">
                              @if (count($results['ods']) >=1)
                                @foreach ($results['ods'] as $ods)
                                  <option value="{{$ods['id']}}">{{$ods['titulo']}}</option>
                                @endforeach
                              @else
                                  <option value="0">sem ods</option>
                              @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-pne">Pne</label>
                          <select name="dataPne" id="data-pne" >
                              @if (count($results['pne']) >=1)
                                @foreach ($results['pne'] as $pne)
                                  <option value="{{$pne['id']}}">{{$pne['titulo']}}</option>
                                @endforeach
                              @else
                                  <option value="0">sem pne</option>
                              @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-valor">Valor</label>
                          <input name="dataValor" type="number" class="form-control" id="data-valor" value="">
                        </div>
                        <div class="form-group">
                          <label for="data-valorInicial">Valor Inicial</label>
                          <input name="dataValorInicial" type="number" class="form-control" id="data-valorInicial" value="">
                        </div>
                        <div class="form-group">
                          <label for="data-dataRegistro">Data do Registro</label>
                          <input name="dataRegistro" type="text" class="form-control" id="data-dataRegistro" value="">
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-outline" href="javascript: history.back(-1);">Voltar</a>
                      </form>
                    </div>

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection