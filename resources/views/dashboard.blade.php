@section('title', 'Dashboard - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="box-border max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-auth-session-status class="bg-green-200 text-green-600 mt-6 px-4 py-3 rounded" :status="session('status')" />
    </div>
    <div class="py-4">
    @if(count($tokens) == 0 && count($tokensBuffet) == 0 && count($tokensMerchandising) == 0)
    <div class="ticket-listado">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <p>Aún no se ha registrado la compra de tickets o merchandising.</p>
                <a href="{{ route('tienda') }}" class="inline-flex cursor-pointer items-center px-4 py-2 mt-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Ir a la Tienda
                    <i class="fa-solid fa-arrow-right-long ml-2"></i>
                </a>
            </div>
        </div>
    </div>
    @endif
    @for($t=0;$t < count($tokens);$t++)
        <div class="ticket-listado">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <h3 class="bg-blue-200 text-blue-600 py-2 text-center mb-6 rounded text-xl">Token Pass: <span class="font-semibold">{{ $tokens[$t] }}</span></h3>
                    @for($b=0;$b < count($tokensTicket);$b++)
                        @if($tokensTicket[$b] == $tokens[$t])
                        <h3 class="text-xl font-semibold">Tickets</h3>
                        <div class="w-full">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Token Pass</th>
                                            <th class="py-3 px-6 text-left">Ticket</th>
                                            <th class="py-3 px-6 text-center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado" class="text-gray-600 text-sm font-light">
                                        @for( $i = 0 ; $i <= count($tickets[$tokensTicket[$b]])-1 ; $i++)
                                        <tr>
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $tickets[$tokensTicket[$b]][$i]->token }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    {{ $tickets[$tokensTicket[$b]][$i]->dni }} - {{ $tickets[$tokensTicket[$b]][$i]->apellidos}}, {{$tickets[$tokensTicket[$b]][$i]->nombres }}
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                    @if($tickets[$tokensTicket[$b]][$i]->pago)
                                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Pago registrado
                                                    @else
                                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pago pendiente
                                                        ({{ \Carbon\Carbon::parse($tickets[$tokensTicket[$b]][$i]->created_at)->diffForHumans(); }})
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    @endfor
                    @for($b=0;$b < count($tokensBuffet);$b++)
                        @if($tokensBuffet[$b] == $tokens[$t])
                        <h3 class="text-xl font-semibold">Buffet</h3>
                        <div class="w-full">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Token Pass</th>
                                            <th class="py-3 px-6 text-left">Pedido</th>
                                            <th class="py-3 px-6 text-center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado" class="text-gray-600 text-sm font-light">
                                        @for( $i = 0 ; $i <= count($buffet[$tokensBuffet[$b]])-1 ; $i++)
                                        <tr>
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $buffet[$tokensBuffet[$b]][$i]->token }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    @if($buffet[$tokensBuffet[$b]][$i]->cantidad > 1)
                                                    <span>{{ $buffet[$tokensBuffet[$b]][$i]->cantidad }} combos.</span>
                                                    @else
                                                    <span>{{ $buffet[$tokensBuffet[$b]][$i]->cantidad }} combo.</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                    @if($buffet[$tokensBuffet[$b]][$i]->pago)
                                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Pago registrado
                                                    @else
                                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pago pendiente
                                                        ({{ \Carbon\Carbon::parse($buffet[$tokensBuffet[$b]][$i]->created_at)->diffForHumans(); }})
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    @endfor
                    @for($b=0;$b < count($tokensMerchandising);$b++)
                        @if($tokensMerchandising[$b] == $tokens[$t])
                        <h3 class="text-xl font-semibold">Merchandising</h3>
                        <div class="w-full">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Token Pass</th>
                                            <th class="py-3 px-6 text-left">Pedido</th>
                                            <th class="py-3 px-6 text-center">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listado" class="text-gray-600 text-sm font-light">
                                        @for( $i = 0 ; $i <= count($merchandising[$tokensMerchandising[$b]])-1 ; $i++)
                                        <tr>
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $merchandising[$tokensMerchandising[$b]][$i]->token }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{ $merchandising[$tokensMerchandising[$b]][$i]->cantidad }} {{ $merchandising[$tokensMerchandising[$b]][$i]->producto }}.</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                    @if($merchandising[$tokensMerchandising[$b]][$i]->pago)
                                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Pago registrado
                                                    @else
                                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pago pendiente
                                                        ({{ \Carbon\Carbon::parse($merchandising[$tokensMerchandising[$b]][$i]->created_at)->diffForHumans(); }})
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    @endfor
    </div>
    

<div id="toast-notification" class="w-full fixed z-50 bottom-5 right-5 max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow border" role="alert">
    <div class="flex items-center mb-3">
        <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Notificación</span>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
            <span class="sr-only">Cerrar</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative inline-block shrink-0">
            <div class="w-12 h-12 rounded-full bg-naranja grid place-content-center">
                <img class="w-8 mx-auto" src="https://direccionados.ar/direccionados-white.png" alt="Logo Direccionados">
            </div>
            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-3 h-3 bg-green-500 rounded-full"></span>
        </div>
        <div class="ms-3 text-sm font-normal">
            <div class="text-sm font-semibold text-gray-900">Tickets Generales</div>
            <div class="text-sm font-normal">ya est&aacute;n disponibles</div> 
            <span class="text-xs font-medium text-verde">{{ \Carbon\Carbon::parse('2024-03-01 06:00 GMT-0300')->diffForHumans() }}</span>
        </div>
    </div>
</div>

</x-app-layout>
