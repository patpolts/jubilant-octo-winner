<x-App-Layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($data["title"]) }}
        </h2>
        @include('components.navbar.admin');
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
                        <li class="breadcrumb-item"><a href="#">Editar</a></li>
                        </ol>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($data["results"]) >= 1)
                              {{ $item = $data["results"] }}
                                @for ($i = 0; $i < count($item  ); $i++)
                                <tr>
                                    <th scope="row">{{$item[$i]['id']}}</th>
                                    <td>{{$item[$i]['titulo']}}</td>
                                    <td>{{$item[$i]['descricao']}}</td>
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
</x-App-Layout>
