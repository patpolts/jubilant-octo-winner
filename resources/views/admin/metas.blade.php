<x-App-Layout>
    <!-- Head injections -->
        <x-slot name="head">
            <title>{{ $header_title }}</title>
        </x-slot>
    
    <!-- Content header-->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __($title) }}
            </h2>
        </x-slot>
        
        
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
                            <th scope="col">ativo</th>
                            <th scope="col">data</th>
                          </tr>
                        </thead>
                        <tbody>
                              @if (count($data) >= 1) 
                                {{-- @for ($i = 0; $i <= count($data); $i++)  --}}
                                @foreach ($data as $item)
                                {{-- {{ print_r('<pre>')}} 
                                    {{ print_r($item)}}  --}}
                                    <tr>
                                        <th scope="row">{{$item["id"]}}</th>
                                        
                                        <td>{{$item['titulo']}}</td>
                                        <td> -- </td>
                                        <td>{{$item['descricao']}}</td>
                                        <td>{{$item['justificativa']}}</td>
                                        <td>--</td>
                                        <td>
                                           --
                                        </td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td>--</td>
                                    </tr>
                                @endforeach
                                {{-- @endfor --}}
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
                </div>
            </div>
        </div>
       
    </div>
</x-App-Layout>
