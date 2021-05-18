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
                        <a class="btn btn-outline" href="{{route('objetivos')}}">visualizar</a>
                      </div>
                    </div>
                  @else
                      
                    <div>
                      <form action="{{$url}}" method="POST" name="editObjetivo">
                        @csrf
                        <div class="form-group">
                          <label for="data-titulo">Titulo</label>
                          <input name="dataTitulo" type="text" class="form-control" id="data-titulo" value="{{$results['dataTitulo']}}">
                        </div>
                        <div class="form-group">
                          <label for="data-descricao">Descrição</label>
                          <textarea name="dataDescricao" id="data-descricao" cols="30" rows="5" class="form-control" >{{$results['dataDescricao']}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="data-justificacao">Justificativa</label>
                          <textarea name="dataJustificativa" id="data-justificacao" cols="30" rows="5" class="form-control">{{$results['dataJustificativa']}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="data-dataRegistro">Data do Registro</label>
                          <input name="dataRegistro" type="text" class="form-control" id="data-dataRegistro"  value="{{$results['dataRegistro']}}">
                        </div>
                        <div class="form-group">
                          <label for="data-dataAtivo">Ativo</label>
                          <input type="checkbox" name="dataActivo" id="data-dataAtivo" {{ $results['dataAtivo'] == 1 ? 'checked' : ''}}>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Salvar Objetivo</button>
                        <a class="btn btn-outline" href="javascript: history.back(-1);">Voltar</a>
                      </form>
                    </div>

                  @endif

                </div>
            </div>
        </div>
       
    </div>
@endsection