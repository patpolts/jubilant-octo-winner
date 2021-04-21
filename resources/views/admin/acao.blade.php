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
                            <th scope="col">nome</th>
                            <th scope="col">descrição</th>
                            <th scope="col">ator</th>
                            <th scope="col">eixo</th>
                            <th scope="col">desempenho</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($results) > 1)
                                @for ($i = 0; $i < count($results); $i++)
                                <tr>
                                    <th scope="row">{{$results[$i]['id']}}</th>
                                    <td>{{$results[$i]['nome']}}</td>
                                    <td>{{$results[$i]['descricao']}}</td>
                                    <td>{{$results[$i]['ator']}}</td>
                                    <td>
                                    @if ($results[$i]["eixo"])
                                        {{$results["eixo"]}}
                                        @else
                                         sem eixo
                                    @endif
                                    </td>
                                    <td>{{$results[$i]['desempenho']}}</td>
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
                </div>
            </div>
        </div>
       
    </div>
@endsection
