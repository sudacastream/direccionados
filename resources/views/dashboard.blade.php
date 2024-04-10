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
                <div class="w-12 h-12 rounded-full bg-red-900 grid place-content-center">
                    <span class="text-white font-bold">3x2</span>
                </div>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center text-right translate-x-2 w-5 h-5 bg-greens-500 rounded-full">
                    <svg class="w-5 h-5 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.597 3.2A1 1 0 0 0 7.04 4.289a3.49 3.49 0 0 1 .057 1.795 3.448 3.448 0 0 1-.84 1.575.999.999 0 0 0-.077.094c-.596.817-3.96 5.6-.941 10.762l.03.049a7.73 7.73 0 0 0 2.917 2.602 7.617 7.617 0 0 0 3.772.829 8.06 8.06 0 0 0 3.986-.975 8.185 8.185 0 0 0 3.04-2.864c1.301-2.2 1.184-4.556.588-6.441-.583-1.848-1.68-3.414-2.607-4.102a1 1 0 0 0-1.594.757c-.067 1.431-.363 2.551-.794 3.431-.222-2.407-1.127-4.196-2.224-5.524-1.147-1.39-2.564-2.3-3.323-2.788a8.487 8.487 0 0 1-.432-.287Z"/>
                    </svg>                      
                </span>
            </div>
            <div class="ms-3 text-sm font-normal">
                <div class="text-sm font-semibold text-gray-900">¡3x2 en tickets!</div>
                <div class="text-sm font-normal">Compra 3 tickets y paga 2.</div> 
                <span class="text-xs font-medium text-verde">{{ \Carbon\Carbon::parse('2024-04-10 00:00 GMT-0300')->diffForHumans() }}</span>
            </div>
        </div>
    </div>

</x-app-layout>
