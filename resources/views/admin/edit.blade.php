@section('title', 'Administración - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administración') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">

                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer text-blue-600 border-b-2 border-blue-600 inline-flex p-4 rounded-t-lg group" aria-current="page">
                                <i class="fa-solid fa-list-check pt-1 mr-3"></i>Ver listado
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-chart-pie pt-1 mr-3"></i>Estad&iacute;sticas
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-sliders pt-1 mr-3"></i>Configuraci&oacute;n
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="p-4" id="listadoToken">
                    <div class="flex justify-between">
                        <form action="{{ route('admin.search') }}" method="POST">
                        @csrf
                        <label for="table-search" class="sr-only"></label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input @isset($token) value="{{ $token }}" @endisset type="text" name="token" required autocomplete="off" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5 " placeholder="Buscar por Token Pass">
                        </div>
                        </form>
                @isset($token)
                        @if(!$tickets[0]->pago)
                        <div class="mt-1.5">
                            <form action="{{ route('admin.paid') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="token" value="{{ $token }}" />
                            <a class="inline-flex cursor-pointer items-center px-4 py-2.5 text-green-600 bg-green-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-green-200 focus:bg-green-200 active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="fa-solid fa-dollar-sign mr-2"></i>
                                Pago realizado
                            </a>
                            </form>
                        </div>
                        @endif
                    </div>
                    @if(count($tickets) > 0 || count($buffet) > 0 || count($merchandising) > 0)
                    @if(count($tickets) > 0)
                    <h3 class="text-xl font-semibold mt-4 mb-3">Tickets</h3>
                    <div class="bg-white shadow-md rounded">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Token Pass</th>
                                    <th class="py-3 px-6 text-left">Ticket</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody id="listado" class="text-gray-600 text-sm font-light">
                                @for( $i = 0 ; $i <= count($tickets)-1 ; $i++)
                                <tr>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $tickets[$i]->token }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $tickets[$i]->dni }} - {{ $tickets[$i]->apellidos}}, {{ $tickets[$i]->nombres }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                            @if($tickets[$i]->pago)
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Pago registrado
                                            @else
                                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pago pendiente
                                                ({{ \Carbon\Carbon::parse($tickets[$i]->created_at)->diffForHumans(); }})
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @if(count($buffet) > 0)
                    <h3 class="text-xl font-semibold mt-4 mb-3">Buffet</h3>
                    <div class="bg-white shadow-md rounded">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Token Pass</th>
                                    <th class="py-3 px-6 text-left">Producto</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody id="listado" class="text-gray-600 text-sm font-light">
                                @for( $i = 0 ; $i <= count($buffet)-1 ; $i++)
                                <tr>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $buffet[$i]->token }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $buffet[$i]->cantidad }}
                                            @if($buffet[$i]->cantidad > 1)
                                            combos. 
                                            @else
                                            combo.
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                            @if($buffet[$i]->pago)
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Pago registrado
                                            @else
                                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pago pendiente
                                                ({{ \Carbon\Carbon::parse($buffet[$i]->created_at)->diffForHumans(); }})
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @if(count($merchandising) > 0)
                    <h3 class="text-xl font-semibold mt-4 mb-3">Merchandising</h3>
                    <div class="bg-white shadow-md rounded">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Token Pass</th>
                                    <th class="py-3 px-6 text-left">Producto</th>
                                    <th class="py-3 px-6 text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody id="listado" class="text-gray-600 text-sm font-light">
                                @for( $i = 0 ; $i <= count($merchandising)-1 ; $i++)
                                <tr>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $merchandising[$i]->token }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{ $merchandising[$i]->cantidad }} {{ $merchandising[$i]->producto }}.
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                            @if($merchandising[$i]->pago)
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Pago registrado
                                            @else
                                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pago pendiente
                                                ({{ \Carbon\Carbon::parse($merchandising[$i]->created_at)->diffForHumans(); }})
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @else
                    <p class="mt-6 text-red-600">No hay coincidencias con el Token Pass <span class="font-semibold">{{ $token }}</span>.</p>
                    @endif
                @endisset
                </div>
            </div>
        </div>
    </div>

<script>
$('.tab-item').click(function(){
    $('.tab-item a').removeClass('text-blue-600 border-b-2 border-blue-600').addClass('border-transparent hover:text-gray-600 hover:border-gray-300');
    $('a', this).removeClass('border-transparent hover:text-gray-600 hover:border-gray-300').addClass('text-blue-600 border-b-2 border-blue-600');
});
</script>
</x-app-layout>