@section('title', 'Enviar tickets - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enviar tickets') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">

                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap justify-between -mb-px text-sm font-medium text-center text-gray-500">
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer text-blue-600 border-b-2 border-blue-600 inline-flex p-4 rounded-t-lg group">
                                <i class="fa-solid fa-list-check pt-1 mr-3"></i>Listado
                            </a>
                        </li>
                        <li class="mr-2 mt-2 float-right">
                            <form action="{{ route('send.ticket') }}" method="POST">
                                @csrf
                                <a class="inline-flex cursor-pointer items-center px-4 py-2.5 text-green-600 bg-green-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-greeb-200 focus:bg-green-200 active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="fa-solid fa-paper-plane sm:mr-2"></i>
                                    <span class="hidden sm:inline-block">Enviar todos</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 pt-5">
                @foreach ($tokens as $token)
                    @php 
                        $email = '';
                        $cantidad = intval(count($tokens) / 3) + 1;
                    @endphp
                    @if($loop->first)
                    <div class="grid gap-4 flex items-stretch content-start">
                    @endif
                    @if($loop->iteration % $cantidad == 0)
                    </div><div class="grid gap-4 flex items-stretch content-start">
                    @endif
                    <div class="h-auto max-w-full bg-slate-50 border border-gray-200 rounded-lg shadow p-6 self-start">
                    <h3 class="text-center text-3xl font-bold text-gray-900">{{ $token }}</h3>
                    <ul class="list-disc px-5 py-3">
                    @php $total = 0; @endphp
                    @foreach ($tokensTicket as $tokenTicket)
                        @if ($tokenTicket == $token)
                            @for($i=0;$i < count($tickets);$i++)
                                @if ($tickets[$i]->token == $tokenTicket)
                                    <li><span class="underline">Ticket:</span> {{ $tickets[$i]->apellidos }}, {{ $tickets[$i]->nombres }} ({{ $tickets[$i]->dni }}).</li>
                                    @php $total = $total + $tickets[$i]->precio @endphp
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id == $tickets[$i]->usuario)
                                            @php $email = $usuario->email @endphp
                                        @endif
                                    @endforeach
                                @endif
                            @endfor
                        @else
                        @endif
                    @endforeach
                    @foreach ($tokensBuffet as $tokenBuffet)
                        @if ($tokenBuffet == $token)
                            @for($i=0;$i < count($buffet);$i++)
                                @if ($buffet[$i]->token == $tokenBuffet)
                                    @php $total = $total + ($buffet[$i]->precio * $buffet[$i]->cantidad) @endphp
                                    @if ($buffet[$i]->cantidad > 1)
                                        <li><span class="underline">Buffet:</span> {{ $buffet[$i]->cantidad }} combos.</li>
                                    @else
                                        <li><span class="underline">Buffet:</span> {{ $buffet[$i]->cantidad }} combo.</li>
                                    @endif
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id == $buffet[$i]->usuario)
                                            @php $email = $usuario->email @endphp
                                        @endif
                                    @endforeach
                                @endif
                            @endfor
                        @endif
                    @endforeach
                    @foreach ($tokensMerchandising as $tokenMerchandising)
                        @if ($tokenMerchandising == $token)
                            @for($i=0;$i < count($merchandising);$i++)
                                @if ($merchandising[$i]->token == $tokenMerchandising)
                                    @php $total = $total + ($merchandising[$i]->precio * $merchandising[$i]->cantidad) @endphp
                                    <li><span class="underline">Merchandising:</span> {{ $merchandising[$i]->cantidad }} {{ $merchandising[$i]->producto }}.</li>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id == $merchandising[$i]->usuario)
                                            @php $email = $usuario->email @endphp
                                        @endif
                                    @endforeach
                                @endif
                            @endfor
                        @endif
                    @endforeach
                    </ul>
                    @php echo $email @endphp
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900">${{ $total }}</span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reenviar</a>
                    </div>
                    </div>
                    @if($loop->last)
                    </div>
                    @endif
                @endforeach    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>