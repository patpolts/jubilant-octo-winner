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
                            <li class="breadcrumb-item "><a href="{{ route('indicadores_anos_adicionar') }}">Adicionar</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Ano</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data </th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($results) >= 1)
                                @foreach ($results as $item)
                                <tr>
                                    <th scope="row">{{$item['id']}}</th>
                                    <td>{{$item['titulo']}}</td>
                                    <td>{{$item['ano']}}</td>
                                    <td>{{$item['valor']}}</td>
                                    <td>{{$item['data_registro']}}</td>
                                    <td>
                                        <a href="{{route('indicadores_anos_editar',$item['id'])}}"> editar</a>
                                    </td>
                                </tr>
                                @endforeach
                              @else
                              <tr>
                                  <th></th>
                                  <td></td>
                                  <td></td>
                                  <td>Nada Encontrado</td>
                                  <td></td>
                                  <td></td> 
                                  <td></td>
                                </tr>
                              @endif
                        </tbody>
                    </table>
                    @if (count($results) >= 1)
                        <p>
                            {{count($results)}} registros encontrados.
                        </p>
                    @endif
                </div>
            </div>
        </div>
       
    </div>

@endsection