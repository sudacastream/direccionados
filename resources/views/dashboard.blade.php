<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(count($tokens) == 0 && count($tokensBuffet) == 0 && count($tokensMerchandising) == 0)
    <div class="ticket-listado">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <p>Aún no se ha registrado la compra de tickets, combos o merchandising.</p>
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
                                                    {{ $tickets[$tokensTicket[$b]][$i]->nombres }}
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
</x-app-layout>
