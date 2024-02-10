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
                            <a href="{{ route('admin.tokens') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-list-check pt-1 mr-3"></i>Tokens<span class="hidden sm:inline-block">&nbsp;Pass</span>
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a href="{{ route('admin.tickets') }}"  class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-ticket pt-1 mr-3"></i>Tickets
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer text-blue-600 border-b-2 border-blue-600 inline-flex p-4 rounded-t-lg group" aria-current="page">
                                <i class="fa-solid fa-shirt pt-1 mr-3"></i>Remeras
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a href="{{ route('admin.stats') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-chart-pie pt-1 mr-3"></i>Censo
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a href="{{ route('admin.settings') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">    
                                <i class="fa-solid fa-sliders pt-1 mr-3"></i>Ajustes
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="p-4" id="listadoToken">
                    <div class="flex justify-between">
                    @isset($shirts)
                        @if(count($shirts) > 0)
                        <div class="bg-white shadow-md rounded w-full">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Token Pass</th>
                                        <th class="py-3 px-6 text-left">Ticket</th>
                                        <th class="py-3 px-6 text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="listado" class="text-gray-600 text-sm font-light">
                                    @for( $i = 0 ; $i <= count($shirts)-1 ; $i++)
                                    <tr>
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <form action="{{ route('admin.ticket.token') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                    <input type="hidden" name="token" value="{{ $shirts[$i]->token }}" />
                                                    <a onclick="event.preventDefault();this.closest('form').submit();"><span class="cursor-pointer font-medium hover:underline">{{ $shirts[$i]->token }}</span></a>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                {{ $shirts[$i]->dni }} - {{ $shirts[$i]->apellidos}}, {{ $shirts[$i]->nombres }}
                                                <span class="font-medium">
                                                    @if($shirts[$i]->funcion=='pastor')
                                                    &nbsp;(pastor)
                                                    @elseif($shirts[$i]->funcion=='lider')
                                                    &nbsp;(l&iacute;der)
                                                    @endif
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                                @if($shirts[$i]->pago)
                                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                                    <span class="hidden md:inline-block">Pago registrado</span>
                                                @else
                                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">
                                                    <span class="hidden md:inline-block">Pago pendiente</span>
                                                    ({{ \Carbon\Carbon::parse($shirts[$i]->created_at)->diffForHumans(); }})
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="mt-6 text-yellow-600">No hay resultados para mostrar.</p>
                        @endif
                    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$('.tab-item').click(function(){
    $('.tab-item a').removeClass('text-blue-600 border-b-2 border-blue-600').addClass('border-transparent hover:text-gray-600 hover:border-gray-300');
    $('a', this).removeClass('border-transparent hover:text-gray-600 hover:border-gray-300').addClass('text-blue-600 border-b-2 border-blue-600');
});
const url = new URL(document.referrer)
if(url.pathname=='/admin/search/ticket')
{
    window.history.pushState(null,'','/admin/search/token');
}
</script>
</x-app-layout>