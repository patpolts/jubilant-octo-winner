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
                          <li class="breadcrumb-item " ><a href="{{ route('indicadores_anos') }}">Visualizar</a></li>
                        
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
                      <form action="{{$url}}" method="POST" name="addIndicadorAnos">
                        @csrf
                        <div class="form-group">
                          <label for="data-titulo">Titulo</label>
                          <input name="dataTitulo" type="text" class="form-control" id="data-titulo" aria-describedby="tituloHelp">
                          <small id="tituloHelp">Identificação única relacionada ao ano, visível apenas ao administrador</small>
                        </div>
                        <div class="form-group">
                          <label for="data-indicador">Indicador</label>
                          <select name="dataIndicador" id="data-indicador">
                              @if (count($results["indicadores"]) >=1 )
                                  @foreach ($results["indicadores"] as $item)
                                    <option value="{{$item['id']}}">{{$item['id']}}. {{$item['titulo']}}</option>
                                  @endforeach
                              @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="data-ano">Ano</label>
                          <input name="dataAno" type="number" class="form-control" id="data-ano" value="">
                        </div>
                        <div class="form-group">
                          <label for="data-valor">Valor</label>
                          <input name="dataValor" type="number" class="form-control" id="data-valor" value="">
                        </div>
                        <div class="form-group">
                          <label for="data-dataRegistro">Data do Registro</label>
                          <input name="dataRegistro" type="text" class="form-control" id="data-dataRegistro" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Ano</button>
                        <a class="btn btn-outline-primary" href="javascript: history.back();">Voltar</a>
                      </form>
                    </div>

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection