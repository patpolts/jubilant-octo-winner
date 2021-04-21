<x-App-Layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($data["title"]) }}
        </h2>
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
                            <th scope="col">nome</th>
                            <th scope="col">descrição</th>
                            <th scope="col">ator</th>
                            <th scope="col">eixo</th>
                            <th scope="col">desempenho</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($data["results"]["acao"]) > 1)
                                @for ($i = 0; $i < count($acao); $i++)
                                <tr>
                                    <th scope="row">{{$acao[$i]['id']}}</th>
                                    <td>{{$acao[$i]['nome']}}</td>
                                    <td>{{$acao[$i]['descricao']}}</td>
                                    <td>{{$acao[$i]['ator']}}</td>
                                    <td>
                                    @if ($data[[""]"eixo"])
                                        {{$acao["eixo"]}}
                                        @else
                                         sem eixo
                                    @endif
                                    </td>
                                    <td>{{$acao[$i]['desempenho']}}</td>
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
