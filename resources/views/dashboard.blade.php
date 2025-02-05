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
                    <div class="bg-blue-200 flex items-center justify-between py-3 px-6 mb-6 rounded">
                        <h3 class="text-blue-600 text-center text-xl">Token Pass: <span class="font-semibold">{{ $tokens[$t] }}</span></h3>
                    </div>
                    @for($b=0;$b < count($tokensTicket);$b++)
                        @if($tokensTicket[$b] == $tokens[$t])
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold">Tickets</h3>
                            @for( $i = 0 ; $i <= count($tickets[$tokensTicket[$b]])-1 ; $i++)
                                @if($tokensTicket[$b] == $tokens[$t] && $tickets[$tokensTicket[$b]][$i]->pago)
                                <div class="flex gap-3 uppercase text-sm">
                                    <a href="/admin/ticket/{{ $tokens[$t] }}" target="_blank" class="flex pl-3 pr-2.5 pb-0.5 pt-1.5 rounded hover:underline gap-1 font-bold text-blue-600 border-blue-400 border">
                                        Ver
                                        <svg class="w-5 h-5 -mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z"/>
                                        </svg>                                    
                                    </a>
                                    <a href="/admin/ticket/download/{{ $tokens[$t] }}" class="flex pl-3 pr-2.5 pb-0.5 pt-1.5 rounded bg-blue-100 hover:underline gap-1 font-bold text-blue-600 border-blue-400 border">
                                        Descargar
                                        <svg class="w-5 h-5 -mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                        </svg>                                      
                                    </a>
                                </div>
                                @break
                                @endif
                            @endfor
                        </div>
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
</x-app-layout>
