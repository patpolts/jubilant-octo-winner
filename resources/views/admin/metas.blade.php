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
                        <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
                        <li class="breadcrumb-item"><a href="metas/editar">Editar</a></li>
                        
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
                            <th scope="col">descricao</th>
                            <th scope="col">justificativa</th>
                            <th scope="col">valor</th>
                            <th scope="col">pne</th>
                            <th scope="col">ods</th>
                            <th scope="col">data</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($results) >= 1) 
                                @foreach ($results as $item)
                                    <tr>
                                        <th scope="row">{{$item["id"]}}</th>
                                        <td>{{$item['titulo']}}</td>
                                        <td> {{ $item['indicadores'][0]['titulo'] }}</td>
                                        <td>{{$item['descricao']}}</td>
                                        <td>{{$item['justificativa']}}</td>
                                        <td>{{$item['indicadores'][0]['valor'] }}</td>
                                        <td>
                                            @foreach ($item['pne'] as $key => $pne)
                                               <label for="pne">
                                                   <input type="checkbox" name="pne" id="pne_{{$key}}" value="pne_{{$key}}" checked>
                                                    <p>{{ $pne }}</p>
                                            </label> 
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item['ods'] as $key => $ods)

                                            <label for="pne">
                                                <input type="checkbox" name="ods" id="ods_{{$key}}" value="ods_{{$key}}" checked>
                                                <p>{{ $ods }}</p>
                                         </label> 
                                            @endforeach
                                        </td>
                                        <td>{{$item['data_registro']}}</td>
                                    </tr>
                                @endforeach
                              @else
                              <tr>
                                  <th></th>
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