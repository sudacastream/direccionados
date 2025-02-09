@section('title', 'Tienda - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tienda') }}
        </h2>
    </x-slot>
    
    @if(Auth::user()->email!='ceo@sudacastream.com')
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">            
            <div class="flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-semibold">¡Pes-ta-&ntilde;as-te!</span> Se acabaron los tickets de la primera tanda de preventa. <span class="font-bold">¡Estate atento! Pronto abriremos la sengunda tanda.</span>
              </div>
            </div>
          </div>
      </div>
    </div>
    @else
    <form method="POST" action="{{ route('tienda.store') }}" class="mt-6 space-y-6" id="form-ticket">
      @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!--<div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <span class="sr-only">Info</span>
                  <div>
                    <span class="font-medium">¡Aprovech&aacute;!</span> Comprando diez (10) tickets, ten&eacute;s uno (1) sin cargo.
                  </div>
                </div>-->
                <div>
                  <h2 class="my-4 text-lg font-medium text-gray-900 ">Datos de procedencia</h2>
                  <div class="flex flex-wrap px-3">
                    <div class="w-full pr-0 sm:pr-1.5 sm:w-1/5">
                      <div>
                        <label for="pais">País</label>
                        <input id="pais" name="pais" type="text" value="{{ old('pais') }}" class="border-gray-300 focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="pais" />
                      </div>
                    </div>
                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                      <div>
                        <label for="provincia">Provincia</label>
                        <input id="provincia" name="provincia" type="text" value="{{ old('provincia') }}" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="provincia" />
                      </div>
                    </div>
                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                      <div>
                        <label for="ciudad">Ciudad</label>
                        <input id="ciudad" name="ciudad" type="text" value="{{ old('ciudad') }}" class="border-gray-300 focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="ciudad"  />
                      </div>
                    </div>
                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                      <div>
                        <label for="congregacion">Congregación</label>
                        <input name="congregacion" type="text" value="{{ old('congregacion') }}" class="border-gray-300 focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="congregacion" />
                      </div>
                    </div>
                    <div class="w-full pl-0 sm:pl-1.5 mt-6 sm:mt-0 sm:w-1/5">
                      <div>
                        <label for="pastor">Pastores</label>
                        <input id="pastor" name="pastor" type="text" value="{{ old('pastor') }}" class="border-gray-300 focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="pastor" />
                      </div>
                    </div>
                  </div> 
                  <h2 class="my-4 text-lg font-medium text-gray-900 ">Datos individuales</h2>
                    <div id="ticket-names">
                      <div id="row0" class="ticket flex flex-wrap p-3">
                        <div class="w-full pr-0 sm:pr-1.5 sm:w-3/12">
                          <div>
                            <label class="block font-medium text-sm text-gray-700 " for="nombres">Nombres</label>
                            <input required class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="nombres[]" type="text" autocomplete="nombres" value="">
                          </div>
                        </div>
                        <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
                          <div>
                            <label class="block font-medium text-sm text-gray-700 " for="apellidos">Apellidos</label>
                            <input required class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="apellidos[]" type="text" autocomplete="apellidos" value="">
                          </div>
                        </div>
                        <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
                          <div>
                            <label class="block font-medium text-sm text-gray-700 " for="dni">DNI -sin puntos-</label>
                            <input required class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="dni[]" type="text" autocomplete="dni" value="">
                          </div>
                        </div>
                        <div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
                          <label class="block font-medium text-sm text-gray-700 " for="funcion">¿Es Pastor/a?</label>
                          <select name="funcion[]" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            <option value="no-informa">No</option>
                            <option value="pastor">Si</option>
                          </select>
                        </div>              
                        <!--<div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
                          <label class="block font-medium text-sm text-gray-700" for="funcion">¿Agregar remera?</label>
                          <select name="combo[]" onchange="combo(this.value)" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                          </select>
                        </div>-->
                      </div>
                    </div>
                    
                    @if ($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                        <li class="text-sm text-red-600 space-y-1">{{ $error }}</li>
                      @endforeach
                    @endif
                    </ul>
                  <div id="btn-add-ticket" class="flex items-center gap-4 my-4">
                    <a id="add-ticket" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">A&ntilde;adir otro ticket</a>    
                  </div>
                </div>                
                <div class="flex items-center gap-4">
                  <x-primary-button>
                    {{ __('Pagar') }}
                    <div id="monto"><span class="ml-2">$</span><span id="numero-monto"></span></div>
                  </x-primary-button>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endif
</x-app-layout>
<script>
  var cantidadTicket = 1;
  var cantidadCombo = 0;
  var montoTotal = cantidadTicket * parseInt({{ $precioTicket }}) + cantidadCombo * parseInt({{ $precioCombo }});
  $(document).ready(function(){
    $('#numero-monto').empty().append(montoTotal);
  });
  function combo(valor, id)
  {
    if(valor == 1)
    {
      cantidadTicket = cantidadTicket - 1;
      cantidadCombo = cantidadCombo + 1;
    }
    else
    {
      cantidadCombo = cantidadCombo - 1;
      cantidadTicket = cantidadTicket + 1;
    }
    montoTotal = cantidadTicket * parseInt({{ $precioTicket }}) + cantidadCombo * parseInt({{ $precioCombo }});
    $('#'+id).attr('data-combo', valor);
    $('#numero-monto').empty().append(montoTotal);
  }
  function addTicket(valor)
  {
    cantidadTicket = cantidadTicket + 1;
    if(cantidadTicket >= 10)
    {
      montoTotal = cantidadTicket * parseInt({{ $precioTicket }}) + cantidadCombo * parseInt({{ $precioCombo }});
      montoTotal = montoTotal - parseInt({{ $precioTicket }});
    }
    else
    {
      montoTotal = cantidadTicket * parseInt({{ $precioTicket }}) + cantidadCombo * parseInt({{ $precioCombo }});
    }
    $('#numero-monto').empty().append(montoTotal);
  }
  function removeTicket(valor)
  {
    if(valor == 1)
    {
      cantidadCombo = cantidadCombo - 1;
    }
    else
    {
      cantidadTicket = cantidadTicket - 1;
    }
    if(cantidadTicket >= 10)
    {
      montoTotal = cantidadTicket * parseInt({{ $precioTicket }}) + cantidadCombo * parseInt({{ $precioCombo }});
      montoTotal = montoTotal - parseInt({{ $precioTicket }});
    }
    else
    {
      montoTotal = cantidadTicket * parseInt({{ $precioTicket }}) + cantidadCombo * parseInt({{ $precioCombo }});
    }
    $('#numero-monto').empty().append(montoTotal);
  }
  function remover(id, combo)
  {
    $('#row'+id).remove();
    removeTicket(combo);
  }
</script>