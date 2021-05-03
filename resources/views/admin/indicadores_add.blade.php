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
                          <li class="breadcrumb-item " ><a href="{{ route('indicadores') }}">Visualizar</a></li>
                          <li class="breadcrumb-item active" ><a href="{{ route('indicadores_adicionar') }}">Adicionar</a></li>
                          <li class="breadcrumb-item"><a href="{{ route('indicadores_editar') }}">Editar</a></li>
                        
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                  @if ($message)
                      <div class="card">
                        <div class="card-body"> 
                          <p>{{$message}}</p>
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
                          <label for="data-dataAnos">Indicador Ano</label>
                          <input name="dataAnos" type="number" class="form-control" id="data-dataAnos" value="1">
                          
                        </div>
                        <div class="form-group">
                          <label for="data-valorAtual">Valor Atual</label>
                          <input name="dataValorAtual" type="number" class="form-control" id="data-valorAtual" value="">
                        </div>
                        <div class="form-group">
                          <label for="data-valorMeta">Valor Meta</label>
                          <input name="dataValorMeta" type="number" class="form-control" id="data-valorMeta" value="">
                        </div>
                        <div class="form-group">
                          <label for="data-dataRegistro">Data do Registro</label>
                          <input name="dataRegistro" type="text" class="form-control" id="data-dataRegistro" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                      </form>
                    </div>

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection