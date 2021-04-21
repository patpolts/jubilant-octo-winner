<x-App-Layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="metas/">Visualizar</a></li>
            <li class="breadcrumb-item "><a href="metas/editar/">Editar</a></li>
            <li class="breadcrumb-item active"  aria-current="page"><a href="metas/adicionar">Adicionar</a></li>
            <li class="breadcrumb-item " ><a href="metas/permissoes">Permissoes</a></li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                          <tr>
                                {{ print_r('<pre>') }}
                              {{ print_r($metas) }}
                            {{-- <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td> --}}
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
    </div>
</x-App-Layout>
