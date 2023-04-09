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
                        <div class="">
                            <div class="px-5 py-3 dark:text-neutral-200">
                              Cantidad de Inscripciones
                            </div>
                            <canvas class="p-10" id="chartLine"></canvas>
                            <!-- Required chart.js -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            
                            <!-- Chart line -->
                            <script>
                                const labels = ["Febrero", "Marzo", "Abril", "Mayo"];
                                const data = {
                                labels: labels,
                                datasets: [
                                    {
                                    label: "Inscripciones",
                                    backgroundColor: "rgb(3, 105, 161)",
                                    borderColor: "hsl(217, 57%, 51%)",
                                    data: [{{ count($iFebrero) }}, {{ count($iMarzo) }}, {{ count($iAbril) }}, {{ count($iMayo) }}],
                                    },
                                ],
                                };
                            
                                const configLineChart = {
                                type: "bar",
                                data,
                                options: {},
                                };
                            
                                var chartLine = new Chart(
                                document.getElementById("chartLine"),
                                configLineChart
                                );
                            </script>
                        </div>
                        <div class="ml-0 mt-6 grid grid-cols-2">
                            <div>
                                <div class="px-5 py-3">
                                    Cupos
                                </div>
                                <canvas class="p-10" id="chartPie1"></canvas>
                            </div>
                            <!-- Chart pie -->
                            <script>
                                const dataPie1 = {
                                labels: ["Vendidos", "Disponibles"],
                                datasets: [
                                    {
                                    label: "Cantidad",
                                    data: [{{ count($iTotal) }}, 300-{{ count($iTotal) }}],
                                    backgroundColor: [
                                        "rgb(34, 197, 94)",
                                        "rgb(239, 68, 68)",
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
                            <div>
                                <div class="px-5 py-3">
                                    Pagos
                                </div>
                                <canvas class="p-10" id="chartPie2"></canvas>
                            </div>
                            <!-- Chart pie -->
                            <script>
                                const dataPie2 = {
                                labels: ["Pagos", "Impagos"],
                                datasets: [
                                    {
                                    label: "Cantidad",
                                    data: [{{ count($pagos) }}, {{ count($impagos) }}],
                                    backgroundColor: [
                                        "rgb(34, 197, 94)",
                                        "rgb(239, 68, 68)",
                                    ],
                                    hoverOffset: 4,
                                    },
                                ],
                                };
                            
                                const configPie2 = {
                                type: "pie",
                                data: dataPie2,
                                options: {},
                                };
                            
                                var chartBar2 = new Chart(
                                document.getElementById("chartPie2"),
                                configPie2
                                );
                            </script>
                        </div>
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
</script>
</x-app-layout>