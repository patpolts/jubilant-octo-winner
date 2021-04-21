<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="metas/">Visualizar</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="metas/editar/">Editar</a></li>
            <li class="breadcrumb-item " ><a href="metas/adicionar">Adicionar</a></li>
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
                  @if ($message !== null)
                    <div class="admin-msg" style="color: red;" onclick="return closeMessage();"> {{$message}}</div>
                  @endif
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">valor inicial</th>
                        <th scope="col">valor atual</th>
                        <th scope="col">valor final</th>
                        <th scope="col">atualizar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($metas) > 1)
                        <form action="/metas/editar" method="POST">
                            @for ($i = 0; $i < count($metas); $i++)
                            <tr>
                                <th scope="row">{{$metas[$i]['id']}}</th>
                                <td>
                                  <input type="text" name="edit_titulo" value="{{$metas[$i]['titulo']}}">
                                </td>
                                <td>
                                  <input type="text" name="edit_valor_inicial" value="{{$metas[$i]['valor_inicial']}}">
                                </td>
                                <td>
                                  <input type="text" name="edit_valor_atual" value="{{$metas[$i]['valor_atual']}}">
                                </td>
                                <td>
                                  <input type="text" name="edit_valor_final" value="{{$metas[$i]['valor_final']}}">
                                </td>
                                <td>
                                  <input type="hidden" name="metas_id" value="{{$metas[$i]['id'] }}">
                                  <input type="submit" name="metas_update" value="atualizar">
                                </td>
                            </tr>
                            @endfor
                          </form>
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
