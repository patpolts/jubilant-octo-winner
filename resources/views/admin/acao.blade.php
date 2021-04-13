<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" ><a href="/metas">Metas</a></li>
                <li class="breadcrumb-item "><a href="/eixos">Eixos</a></li>
                <li class="breadcrumb-item"><a href="#">Ouse</a></li>
                <li class="breadcrumb-item "><a href="#">Grande Tema</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="#">Ação</a></li>
                <li class="breadcrumb-item " ><a href="/indicadores">Indicadores</a></li>
                <li class="breadcrumb-item " ><a href="#">Categorias</a></li>
                <li class="breadcrumb-item " ><a href="#">Tags</a></li>
                <li class="breadcrumb-item " ><a href="#">Permissões</a></li>
                <li class="breadcrumb-item " ><a href="#">Usuarios</a></li>
            </ol>
        </nav>
    </x-slot>

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
                            <th scope="col">Descrição</th>
                            <th scope="col">Justificativa</th>
                            <th scope="col">Ator</th>
                            <th scope="col">Ano</th>
                            <th scope="col">Andamento</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($acao) > 1)
                                @for ($i = 0; $i < count($acao); $i++)
                                <tr>
                                    <th scope="row">{{$acao[$i]['id']}}</th>
                                    <td>{{$acao[$i]['titulo']}}</td>
                                    <td>{{$acao[$i]['descricao']}}</td>
                                    <td>{{$acao[$i]['justificativa']}}</td>
                                    <td>{{$acao[$i]['ator']}}</td>
                                    <td>{{$acao[$i]['ano']}}</td>
                                    <td>{{$acao[$i]['andamento']}}</td>
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
</x-app-layout>
