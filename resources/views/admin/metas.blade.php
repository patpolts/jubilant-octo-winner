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
                        <li class="breadcrumb-item active" aria-current="visualizar">Visualizar</li>
                        <li class="breadcrumb-item"><a href="{{ route('metas_adicionar') }}">Adicionar</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('metas_editar') }}">Editar</a></li>
                        
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">titulo</th>
                            <th scope="col">indicadores</th>
                            <th scope="col">objetivos</th>
                            <th scope="col">eixos</th>
                            <th scope="col">ods</th>
                            <th scope="col">pne</th>
                            <th scope="col">valor</th>
                            <th scope="col">valor inicial</th>
                            <th scope="col">data</th>
                            <th scope="col">ativo</th>
                                      
                                      
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($results) >= 1) 
                                @foreach ($results as $item)
                                    <tr>
                                        <th scope="row">{{$item["id"]}}</th>
                                        <td>{{$item['titulo']}}</td>
                                        <td>{{$item['indicador_id']}}</td>             
                                        <td>{{$item['objetivo_id']}}</td>              
                                        <td>{{$item['eixo_id']}}</td>                   
                                        <td>{{$item['ods_id']}}</td>                    
                                        <td>{{$item['pne_id']}}</td>             
                                        <td>{{$item['valor']}}</td>                 
                                        <td>{{$item['valor_inicial']}}</td>                 
                                        <td>{{$item['data_registro']}}</td>                 
                                        <td>{{$item['active']}}</td>
                                    </tr>
                                @endforeach
                              @else
                              <tr>
                                  <th></th>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>Nada Encontrado</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              @endif
                        </tbody>
                    </table>
                    <p>
                        @if (count($results) >= 1)
                          {{count($results)}} registros encontrados.
                        @endif
                    </p>
                </div>
            </div>
        </div>
       
    </div>
@endsection