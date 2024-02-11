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
                            <a href="{{ route('admin.tickets') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-chart-pie pt-1 mr-3"></i>Tickets
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a href="{{ route('admin.shirts') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">
                                <i class="fa-solid fa-shirt pt-1 mr-3"></i>Remeras
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a class="cursor-pointer text-blue-600 border-b-2 border-blue-600 inline-flex p-4 rounded-t-lg group" aria-current="page">
                                <i class="fa-solid fa-ticket pt-1 mr-3"></i>Censo
                            </a>
                        </li>
                        <li class="mr-2 tab-item">
                            <a href="{{ route('admin.settings') }}" class="cursor-pointer border-transparent hover:text-gray-600 hover:border-gray-300 inline-flex p-4 border-b-2 rounded-t-lg group">    
                                <i class="fa-solid fa-sliders pt-1 mr-3"></i>Ajustes
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="p-4">
                    <div class="overflow-hidden">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 pt-5 mb-5">
                            <div class="h-auto max-w-full bg-slate-50 border border-gray-200 rounded-lg shadow py-3 px-5 self-start">
                                <span class="text-lg text-gray-900">Tickets Pagos</span>
                                <div class="flex items-center justify-between">
                                    <div class="text-3xl font-bold text-gray-900 cursor-pointer" title="Porcentaje de personas que pagaron">{{ number_format(count($pagos)*100/count($totales), 0, ',','') }}%</div>
                                    <div class="text-lg font-bold flex items-center justify-between">
                                        <span class="bg-green-100 text-green-800 mr-2 px-2.5 py-0.5 rounded-full cursor-pointer" title="Pagos">{{ count($pagos) }}</span>
                                        <span class="bg-red-100 text-red-800 mr-2 px-2.5 py-0.5 rounded-full cursor-pointer" title="Impagos">{{ count($totales)-count($pagos) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Required chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        
                        <div class="ml-0 mt-6 grid grid-cols-2">
                            <div>
                                <div class="px-5 py-3">
                                    Tickets Pagos
                                </div>
                                <canvas class="p-10" id="chartPie1"></canvas>
                            </div>
                            <!-- Chart pie -->
                            <script>
                                const dataPie1 = {
                                labels: ["Impagos", "Pagos"],
                                datasets: [
                                    {
                                    label: "Cantidad",
                                    data: [{{ count($totales)-count($pagos) }},{{ count($pagos) }}],
                                    backgroundColor: [
                                        "rgb(239, 68, 68)",
                                        "rgb(34, 197, 94)",
                                    ],
                                    hoverOffset: 4,
                                    },
                                ],
                                };
                            
                                const configPie1 = {
                                type: "pie",
                                data: dataPie1,
                                options: {},
                                };
                            
                                var chartBar1 = new Chart(
                                document.getElementById("chartPie1"),
                                configPie1
                                );
                            </script>
                        </div>
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nombre completo y DNI
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Iglesia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pastor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lugar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingresantes as $item)    
                        @if($loop->iteration % 2 == 0)
                        <tr class="border-b bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->apellidos }}, {{ $item->nombres }} ({{ $item->dni }})
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $item->congregacion }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $item->pastor }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $item->ciudad }}, {{ $item->provincia }}
                            </th>
                        </tr>
                        @else
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->apellidos }}, {{ $item->nombres }} ({{ $item->dni }})
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $item->congregacion }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $item->pastor }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ $item->ciudad }}, {{ $item->provincia }}
                            </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
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