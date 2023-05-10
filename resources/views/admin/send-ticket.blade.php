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
                        <button id="{!! $token !!}" onclick="enviarTicket(this.id);" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
                    </div>
                    <div id="response{{ $token }}"></div>
                    </div>
                    @if($loop->last)
                    </div>
                    @endif
                @endforeach    
                </div>
            </div>
        </div>
    </div>
    <script>
        function enviarTicket(token)
        {
            $('#'+token).html('<svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/></svg>Enviando..')
            $.ajax({
                type: 'GET',
                url: '{{ route('send.ticket') }}'+'/'+token,
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#response'+token).html('<div class="flex p-4 mt-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert"><svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg><span class="sr-only">Info</span><div><span class="font-medium">'+data+'</span></div></div>');
                    $('#'+token).html('Enviar');
                }
            });
        }
    </script>
</x-app-layout>