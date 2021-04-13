<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="/metas">Metas</a></li>
                <li class="breadcrumb-item "><a href="/eixos">Eixos</a></li>
                <li class="breadcrumb-item"><a href="#">Ouse</a></li>
                <li class="breadcrumb-item " ><a href="#">Grande Tema</a></li>
                <li class="breadcrumb-item " ><a href="#">Ação</a></li>
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
                        <li class="breadcrumb-item"><a href="metas/editar">Editar</a></li>
                        <li class="breadcrumb-item " ><a href="metas/permissoes">Permissões</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">valor inicial</th>
                            <th scope="col">valor atual</th>
                            <th scope="col">valor final</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($metas) > 1)
                                @for ($i = 0; $i < count($metas); $i++)
                                <tr>
                                    <th scope="row">{{$metas[$i]['id']}}</th>
                                    <td>{{$metas[$i]['titulo']}}</td>
                                    <td>{{$metas[$i]['valor_inicial']}}</td>
                                    <td>{{$metas[$i]['valor_atual']}}</td>
                                    <td>{{$metas[$i]['valor_final']}}</td>
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
