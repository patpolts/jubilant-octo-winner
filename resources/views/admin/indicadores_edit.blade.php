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
                          <li class="breadcrumb-item active" ><a href="{{ route('indicadores_adicionar') }}">Adicionar</a></li>
                        
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
                      @if (count($results) >=1 )
                      <div>
                        <form action="{{route('indicadores_editar',$results[0]['id'])}}" method="POST" name="editIndicador">
                          @csrf
                          <div class="form-group">
                            <label for="data-titulo">Titulo</label>
                            <input name="dataTitulo" type="text" class="form-control" id="data-titulo" value="{{$results[0]['dataTitulo']}}">
                          </div>
                          <div class="form-group">
                            <label for="data-descricao">Descrição</label>
                            <input name="dataDescricao" type="text" class="form-control" id="data-descricao" value="{{$results[0]['dataDescricao']}}">
                          </div>
                          <div class="form-group">
                            <label for="data-dataAnos">Indicador Ano</label>
                            <input name="dataAnos" type="number" class="form-control" id="data-dataAnos" value="{{$results[0]['dataAnos']}}">
                            
                          </div>
                          <div class="form-group">
                            <label for="data-valorAtual">Valor Atual</label>
                            <input name="dataValorAtual" type="number" class="form-control" id="data-valorAtual" value="{{$results[0]['dataValorAtual']}}">
                          </div>
                          <div class="form-group">
                            <label for="data-valorMeta">Valor Meta</label>
                            <input name="dataValorMeta" type="number" class="form-control" id="data-valorMeta" value="{{$results[0]['dataValorMeta']}}">
                          </div>
                          <div class="form-group">
                            <label for="data-dataRegistro">Data do Registro</label>
                            <input name="dataRegistro" type="text" class="form-control" id="data-dataRegistro" value="{{$results[0]['dataRegistro']}}">
                          </div>
                          <div class="form-group">
                            <label for="data-ativo">Ativo</label>
                            <input name="dataAtivo" type="text" class="form-control" id="data-ativo" value="{{$results[0]['dataAtivo']}}">
                          </div>
                          <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                      </div>
                     
                      @endif
                    

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection