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
                          <li class="breadcrumb-item active" aria-current="adicionar"><a href="{{ route('acao_adicionar') }}">Adicionar</a></li>
                        
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
                          <label for="data-eixos">Selecione o Eixo</label>
                          <select name="dataEixos" id="data-eixos">
                            @if (count(array()) >=1 )
                              @foreach ($results["eixoSelect"] as $item)
                                <option value="{{$item['id']}}">{{$item['titulo']}}</option>
                              @endforeach
                            @else
                              <option value="0">Sem eixos cadastrado</option>
                            @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-objetivoEspecifico">Objetivo Especifico</label>
                            <select name="dataObjetivoEspecifico" id="data-objetivoEspecifico">
                                <option value="1">Garantir o adequado funcionamento das estruturas básicas para as atividades de pesquisa e extensão.</option>
                                <option value="2">Aprimorar os fluxos e procedimentos da área de formalização e gestão de recursos para convênios e parcerias.</option>
                            </select>
                       
                        </div>
                        <div class="form-group">
                          <label for="data-descricao">Descrição da ação</label>
                          <input name="dataDescricao" type="text" class="form-control" id="data-descricao">
                        </div>
                        <div class="form-group">
                          <label for="data-ator">Ator</label>
                          <select name="dataAtor" id="data-ator">
                            @if (count($results["atorSelect"]) >=1 )
                              @foreach ($results["atorSelect"] as $item)
                                <option value="{{$item['id']}}">{{$item['titulo']}}</option>
                              @endforeach
                            @else
                              <option value="0">Sem eixos cadastrado</option>
                            @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-titulo">Titulo</label>
                          <input name="dataTitulo" type="text" class="form-control" id="data-titulo" aria-describedby="tituloHelp">
                          <small id="tituloHelp">Identificação única relacionada a ação</small>
                        </div>
                        <div class="form-group">
                          <div>
                            <label for="data-desempenho">Desempenho</label>
                            <input name="dataDesempenho" type="number" class="form-control" id="data-desempenho" value="">
                          </div>
                          <div>
                            <label for="data-dataRegistro">Data do Registro</label>
                            <input name="dataRegistro" type="text" class="form-control" id="data-dataRegistro" value="">
                          </div>
                          <div>
                            <label for="data-justificativa">Justificativa</label>
                            <input name="dataJustificativa" type="text" class="form-control" id="data-justificativa" >
                          </div>
                        </div>
                        <div class="form-group">
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a class="btn btn-outline" href="javascript: history.back(-1);">Voltar</a>
                      </form>
                    </div>

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection