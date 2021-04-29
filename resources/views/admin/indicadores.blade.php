@extends('layouts.admin')
@section('header_title', $header_title)

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    @section('title', $title)
</h2>
<!-- Content -->
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
                        <li class="breadcrumb-item"><a href="#">Editar</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Justificativa</th>
                            <th scope="col">Ano </th>
                            <th scope="col">Valor</th>
                            <th scope="col">Meta</th>
                            <th scope="col">Indicador</th>
                            <th scope="col">Ano 5</th>
                            <th scope="col">Data</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($results) > 1)
                                @for ($i = 0; $i < count($results); $i++)
                                <tr>
                                    <th scope="row">{{$results[$i]['id']}}</th>
                                    <td>{{$results[$i]['titulo']}}</td>
                                    <td>{{$results[$i]['justificativa']}}</td>
                                    <td>{{$results[$i]['meta']}}</td>
                                    <td>{{$results[$i]['indicador']}}</td>
                                    <td>{{$results[$i]['ano']}}</td>
                                    <td>{{$results[$i]['valor']}}</td>
                                    <td>{{$results[$i]['data_registro']}}</td>
                                </tr>
                                @endfor
                              @else
                              <tr>
                                  <th></th>
                                  <td></td>
                                  <td></td>
                                  <td>Nada Encontrado</td>
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
