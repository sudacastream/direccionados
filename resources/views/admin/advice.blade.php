@section('title', 'Enviar Aviso de cambio de precio - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enviar aviso de cambio de precio') }}
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
                            <form action="{{ route('advice.send') }}" method="POST">
                                @csrf
                                <a class="inline-flex cursor-pointer items-center px-4 py-2.5 text-yellow-600 bg-yellow-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-yellow-200 focus:bg-yellow-200 active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="fa-solid fa-paper-plane sm:mr-2"></i>
                                    <span class="hidden sm:inline-block">Enviar aviso</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="p-4" id="listadoToken">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre completo y DNI
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email de usuario
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha de compra
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pago
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listado as $pago)
                                    @if($loop->iteration % 2 == 0)
                                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pago->apellidos }}, {{ $pago->nombres }} - {{ $pago->dni }}                                
                                            @if($pago->funcion == 'pastor')
                                            <span title="Pastor/a" class="inline-flex items-center bg-yellow-100 text-yellow-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            @elseif($pago->funcion == 'lider')
                                            <span title="L&iacute;der" class="inline-flex items-center bg-blue-100 text-blue-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                <i class="fa-solid fa-user-check"></i>
                                            </span>
                                            @endif
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ \Illuminate\Support\Facades\DB::table('users')->where('id','=',$pago->usuario)->pluck('email')[0] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($pago->created_at)->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            ${{ $pago->precio }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($pago->pago)
                                            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium p-2.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                            </span>
                                            @else                    
                                            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium p-2.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @else
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pago->apellidos }}, {{ $pago->nombres }} - {{ $pago->dni }}                                
                                            @if($pago->funcion == 'pastor')
                                            <span title="Pastor/a" class="inline-flex items-center bg-yellow-100 text-yellow-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </span>
                                            @elseif($pago->funcion == 'lider')
                                            <span title="L&iacute;der" class="inline-flex items-center bg-blue-100 text-blue-600 text-xs font-medium p-2.5 ml-2 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                <i class="fa-solid fa-user-check"></i>
                                            </span>
                                            @endif
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ \Illuminate\Support\Facades\DB::table('users')->where('id','=',$pago->usuario)->pluck('email')[0] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($pago->created_at)->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            ${{ $pago->precio }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($pago->pago)
                                            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium p-2.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                            </span>
                                            @else                    
                                            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium p-2.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>