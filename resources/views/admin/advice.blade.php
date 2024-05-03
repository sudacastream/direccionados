@section('title', 'Tickets adeudados - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets adeudados') }}
        </h2>
    </x-slot>
    <div class="box-border max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-auth-session-status class="bg-green-200 text-green-600 mt-6 px-4 py-3 rounded" :status="session('status')" />
    </div>
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
                                        Fecha de aviso
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acciones
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
                                            {{ \Carbon\Carbon::parse($pago->updated_at)->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-3">
                                            <form action="{{ route('advice.send') }}" method="POST">
                                                @csrf
                                                <a title="Dar aviso" class="inline-flex cursor-pointer items-center px-4 py-2.5 text-blue-600 bg-blue-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-200 focus:bg-blue-200 active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                                    <i class="fa-solid fa-paper-plane"></i>
                                                </a>
                                            </form>
                                            <form action="{{ route('advice.destroy') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="tokenPass" value="{{ $pago->token }}">
                                                <a title="Eliminar" class="inline-flex cursor-pointer items-center px-4 py-2.5 text-red-600 bg-red-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-200 focus:bg-red-200 active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </form>
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
                                            {{ \Carbon\Carbon::parse($pago->updated)->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-3">
                                            <form action="{{ route('advice.send') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="tokenPass" value="{{ $pago->token }}">
                                                <a title="Dar aviso" class="inline-flex cursor-pointer items-center px-4 py-2.5 text-blue-600 bg-blue-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-blue-200 focus:bg-blue-200 active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                                    <i class="fa-solid fa-paper-plane"></i>
                                                </a>
                                            </form>
                                            <form action="{{ route('advice.destroy') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="tokenPass" value="{{ $pago->token }}">
                                                <a title="Eliminar" class="inline-flex cursor-pointer items-center px-4 py-2.5 text-red-600 bg-red-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-200 focus:bg-red-200 active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="event.preventDefault();this.closest('form').submit();">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </form>
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