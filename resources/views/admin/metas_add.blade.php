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
                          <li class="breadcrumb-item " ><a href="{{ route('metas') }}">Visualizar</a></li>
                          <li class="breadcrumb-item active" aria-current="adicionar"><a href="{{ route('metas_adicionar') }}">Adicionar</a></li>
                          <li class="breadcrumb-item"><a href="{{ route('metas_editar') }}">Editar</a></li>
                        
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                  @if ($message)
                      <div class="card">
                        <div class="card-body"> 
                          <p>{{$msg}}</p>
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
                            <option value="1">option</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-objetivo">Objetivos</label>
                          <select name="dataObjetivos" id="data-objetivo">
                            <option value="1">option</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-eixo">Eixos</label>
                          <select name="dataEixos" id="data-eixo">
                            <option value="1">option</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-ods">Ods</label>
                          <select name="dataOds" id="data-ods">
                            <option value="1">option</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-pne">Pne</label>
                          <select name="dataPne" id="data-pne" >
                            <option value="1">option</option>
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
                        {{-- <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection