@if(Auth::user()->email=='ceo@sudacastream.com' || Auth::user()->email=='nahufidelibus@gmail.com')
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
                            <a href="{{ route('admin.tokens') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group" aria-current="page">
                                <i class="fa-solid fa-list-check pt-1 mr-3"></i>Tokens<span class="hidden sm:inline-block">&nbsp;Pass</span>
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a href="{{ route('admin.tickets') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-ticket pt-1 mr-3"></i>Tickets
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-chart-pie pt-1 mr-3"></i>Censo
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer text-blue-600 border-b-2 border-blue-600 inline-flex p-4 rounded-t-lg group">
                                <i class="fa-solid fa-sliders pt-1 mr-3"></i>Ajustes
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="p-4" id="listadoToken">
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
@else
{{ abort(404) }}
@endif