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
                        <li class="breadcrumb-item"><a href="{{ route('acao_adicionar') }}">Adicionar</a></li>
                        
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>   
                            <th scope="col">eixo</th>
                            <th scope="col">objetivo</th>
                            <th scope="col">tema</th>          
                            <th scope="col">titulo</th>            
                            <th scope="col">descricao</th>
                            <th scope="col">justificativa</th>
                            <th scope="col">objetivo_especifico</th>
                            <th scope="col">ator</th> 
                            <th scope="col">desempenho</th>             
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
                                        <td>{{$item['eixo_id']}}</td>             
                                        <td>{{$item['objetivo_id']}}</td>              
                                        <td>{{$item['tema_id']}}</td>                   
                                        <td>{{$item['descricao']}}</td>                    
                                        <td>{{$item['justificativa']}}</td>             
                                        <td>{{$item['objetivo_especifico']}}</td>                 
                                        <td>{{$item['ator']}}</td>                 
                                        <td>{{$item['desempenho']}}</td>                     
                                        <td>{{$item['data_registro']}}</td>                 
                                        <td>{{$item['active']}}</td>      
                                        <td>
                                            <a href="{{route('acao_editar',$item['id'])}}"> editar </a>
                                        </td>
                                    </tr>
                                @endforeach
                              @else
                              <tr>
                                  <th></th>
                                  <td></td>
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