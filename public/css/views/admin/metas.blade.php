<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($data["title"] ) }}
        </h2>
        {{-- @include('components.navbar.admin'); --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
                        <li class="breadcrumb-item"><a href="metas/editar">Editar</a></li>
                        {{-- <li class="breadcrumb-item " ><a href="metas/permissoes">Permissões</a></li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">nome</th>
                            <th scope="col">indicador</th>
                            <th scope="col">meta</th>
                            <th scope="col">status</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($data["results"]) > 1)
                              {{$item = $data["results"]}}
                                @for ($i = 0; $i < count($item); $i++)
                                <tr>
                                    <th scope="row">{{$item[$i]["metas"]['id']}}</th>
                                    <td>{{$item[$i]["metas"]['nome']}}</td>
                                    <td>{{$item[$i]["indicadores"]['titulo']}}</td>
                                    <td>{{$item[$i]['valor_atual']}}</td>
                                    <td>{{$item[$i]['valor_final']}}</td>
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
