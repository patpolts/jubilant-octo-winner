<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item active" aria-current="page">Home</li>
                          <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                          <li class="breadcrumb-item" ><a href="/metas">Metas</a></li>
                          <li class="breadcrumb-item" ><a href="/eixos">Eixos</a></li>
                          <li class="breadcrumb-item" ><a href="/grandetema">Grande Tema</a></li>
                          <li class="breadcrumb-item" ><a href="/ouse">Objetivo Ouse</a></li>
                          <li class="breadcrumb-item" ><a href="/indicadores">Indicadores</a></li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
