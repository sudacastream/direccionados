@section('title', 'Tienda - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tienda') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('tienda.store') }}" class="mt-6 space-y-6" id="form-ticket">
      @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                  @if($email == 'ceo@sudacastream.com')
                  <section class="mb-6 pb-3 border-b border-solid border-gray-100">
                    <header>
                        <h1 class="font-semibold text-xl text-gray-900">
                            {{ __('Tickets') }}
                        </h1>
                        <p class="texto-comprar-tickets mt-1 mb-6 text-sm text-gray-600">
                          Complete los siguientes datos de carácter obligatorio.
                        </p>
                        <p class="texto-agregar-tickets mt-1 mb-6 text-sm text-gray-600">
                          Usted ya tiene tickets adquiridos. Si desea adquirir más, pulse "ADQUIRIR MÁS TICKETS".
                        </p>
                        <a id="comprar-ticket" class="mb-4 cursor-pointer inline-flex items-center px-4 py-2 bg-green-200 border border-transparent rounded-md font-semibold text-xs text-gray uppercase tracking-widest hover:bg-green-100 focus:bg-green-200 active:bg-green-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Adquirir más tickets</a>
                        <a id="no-comprar-ticket" class="mb-4 cursor-pointer inline-flex items-center px-4 py-2 bg-red-200 border border-transparent rounded-md font-semibold text-xs text-gray uppercase tracking-widest hover:bg-red-100  focus:bg-red-200 active:bg-red-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Eliminar tickets</a>
                    </header> 
                    @if(count($tokens) > 0)
                    <script>
                        var dale=0;
                        var cantidad=0;
                        var cantidadBuffet = 0;
                        $('#comprar-ticket').show();
                        $('#no-comprar-ticket').hide();
                        $('.texto-agregar-tickets').show();
                        $('.texto-comprar-tickets').hide();
                    </script>
                    @else
                    <script>
                        var dale=1;
                        var cantidad=1;
                        var cantidadBuffet = 0;
                        $('#comprar-ticket').hide();
                        $('#no-comprar-ticket').hide();
                        $('.texto-comprar-tickets').show();
                        $('.texto-agregar-tickets').hide();
                        $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                    </script>
                    @endif
                    <div id="formu">
                        <div id="ver-nover"></div>
                              @if ($errors->any())
                              <ul>
                                @foreach($errors->all() as $error)
                                  <li class="text-sm text-red-600 space-y-1">{{ $error }}</li>
                                @endforeach
                              @endif
                              </ul>
                            </div>
                          
                            <div id="btn-add-ticket" class="hidden flex items-center gap-4">
                              <a id="add-ticket" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray uppercase tracking-widest hover:bg-gray-100 focus:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">A&ntilde;adir otro ticket</a>    
                            </div>
                    </div>
                  </section>
                    <section class="my-6 pb-3 border-b border-solid border-gray-100">
                      <header class="mb-6">
                        <h1 class="font-semibold text-xl text-gray-900 ">
                          {{ __('Buffet') }}
                        </h1>
                        @if( count($tokens) > 0 )
                        <p class="mt-1 text-sm text-gray-600 ">
                          {{ __('Haga su pedido en el buffet del Congreso. Tenga en cuenta que no se tomarán pedidos de manera presencial.') }}
                        </p>
                        @endif
                      </header>
                      <div>
                        @if( count($tokens) > 0 )
                        <h2 class="text-lg font-medium text-gray-900 ">Combo &uacute;nico por ${{ $precioBuffet }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $comboDescripcion }}</p>
                        <div class="flex flex-wrap px-3">
                          <div class="w-full pr-0 sm:w-1/12 py-3">
                            <div>
                              <x-input-label for="cantidad" :value="__('Cantidad')" />
                              <input id="cantidadBuffet" type="number" min="0" value="0" name="cantidadBuffet" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="cantidadBuffet" value="{{ old('cantidadBuffet') }}" />
                            </div>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="box-border max-w-7xl mx-auto mb-3">
                        <p class="bg-red-200 text-red-600 mt-6 px-4 py-3 rounded"><span class="font-bold"><i class="fa-solid fa-shop-lock mr-2"></i></span> - Para poder acceder al buffet debe tener al menos un ticket adquirido.</p>
                      </div>
                      @endif
                    </section>
                    <section class="my-6 pb-3 border-b border-solid border-gray-100">
                      <header class="mb-6">
                        <h1 class="font-semibold text-xl text-gray-900 ">
                          {{ __('Merchandising') }}
                        </h1>
                        @if( count($tokens) > 0 )
                        <p class="mt-1 text-sm text-gray-600 ">
                          {{ __('Haga su pedido y un operador se pondrá en contacto con usted para elección de talle y color. Tenga en cuenta que no se tomarán pedidos de manera presencial.') }}
                        </p>
                        @endif
                      </header>
                      @if( count($tokens) > 0 )
                      <div>  
                        <h2 class="text-lg font-medium text-gray-900 ">Remera del Congreso por ${{ $precioRemera }}</h2>
                        <p class="mt-1 text-sm text-gray-600 w-full sm:w-1/3">{{ $remeraDescripcion }}</p>
                        <div class="flex flex-wrap px-3">
                          <div class="w-full pr-0 sm:w-1/12 py-3">
                            <div>
                              <x-input-label for="cantidadRemera" :value="__('Cantidad')" />
                              <input id="cantidadRemera" type="number" min="0" value="0" name="cantidadRemera" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="cantidadRemera" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>  
                        <h2 class="text-lg font-medium text-gray-900 ">Gorra del Congreso por ${{ $precioGorra }}</h2>
                        <p class="mt-1 text-sm text-gray-600 w-full sm:w-1/3">{{ $gorraDescripcion }}</p>
                        <div class="flex flex-wrap px-3">
                          <div class="w-full pr-0 sm:w-1/12 py-3">
                            <div>
                              <x-input-label for="cantidadGorra" :value="__('Cantidad')" />
                              <input id="cantidadGorra" type="number" min="0" value="0" name="cantidadGorra" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="cantidadGorra" />
                            </div>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="box-border max-w-7xl mx-auto mb-3">
                        <p class="bg-red-200 text-red-600 mt-6 px-4 py-3 rounded"><span class="font-bold"><i class="fa-solid fa-shop-lock mr-2"></i></span> - Para poder acceder al merchandi debe tener al menos un ticket adquirido.</p>
                      </div>
                      @endif
                    
                    </section>
                    <div class="flex items-center gap-4">
                      <x-primary-button>
                        {{ __('Pagar') }}
                        <div id="monto"><span class="ml-2">$</span><span id="numero-monto"></span></div>
                        <script>
                          $(document).ready(function(){
                             var cantidadRemera = $('#cantidadRemera').val();
                            var cantidadGorra = $('#cantidadGorra').val();
                            $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                            $('#add-ticket').click(function(){
                              cantidad = cantidad+1;
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                            });
                            $('#cantidadBuffet').change(function(){
                              cantidadBuffet = $(this).val();
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                            });
                            $('#cantidadRemera').change(function(){
                              cantidadRemera = $(this).val();
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                            });
                            $('#cantidadGorra').change(function(){
                              cantidadGorra = $(this).val();
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                            });
                            $(document).on('click', '.remove-ticket', function(){
                              cantidad = cantidad-1;
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                            });
                            $('#comprar-ticket').click(function(){
                              cantidad=1;
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                              $(this).hide();
                              $('#no-comprar-ticket').show();
                              $('#btn-add-ticket').show();
                              $('#ver-nover').append(`<div>
                                <h2 class="my-4 text-lg font-medium text-gray-900 ">Datos del grupo</h2>
                                                    <div class="flex flex-wrap px-3">
                                                      <div class="w-full pr-0 sm:pr-1.5 sm:w-1/5">
                                                      <div>
                                                        <label for="pais">País</label>
                                                        <input id="pais" name="pais" type="text" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" required autocomplete="pais" />
                                                      </div>
                                                    </div>
                                                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="provincia">Provincia</label>
                                                        <input id="provincia" name="provincia" type="text" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" required autocomplete="provincia" />
                                                      </div>
                                                    </div>
                                                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="ciudad">Ciudad</label>
                                                        <input id="ciudad" name="ciudad" type="text" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" required autocomplete="ciudad"  />
                                                      </div>
                                                    </div>
                                                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="congregacion">Congregación</label>
                                                        <input name="congregacion" type="text" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" required autocomplete="congregacion" />
                                                      </div>
                                                    </div>
                                                    <div class="w-full pl-0 sm:pl-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="pastor">Pastor</label>
                                                        <input id="pastor" name="pastor" type="text" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" required autocomplete="pastor" />
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
                                                          <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
                                                            <div>
                                                              <label class="block font-medium text-sm text-gray-700 " for="dni">DNI</label>
                                                              <input required class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="dni[]" type="text" autocomplete="dni" value="">
                            
                                                            </div>
                                                          </div>
                                                          <div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
                                                            <label class="block font-medium text-sm text-gray-700 " for="funcion">Función</label>
                                                            <select name="funcion[]" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                                              <option value="no-informa"></option>
                                                              <option value="pastor">Pastor/a</option>
                                                              <option value="lider">Líder de Jóvenes</option>
                                                            </select>
                                                          </div>
                                                        </div>
                                                        </div>                              `);
                              $('#lo-otro').show();
                            });
                            $('#no-comprar-ticket').click(function(){
                              cantidad=0;
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                              $(this).hide();
                              $('#btn-add-ticket').hide();
                              $('#comprar-ticket').show();
                              $('#ver-nover').children('div').remove();
                            });
                            if(dale==1)
                            {
                              $('#numero-monto').empty().append((cantidad * {{ $precioTicket }}) + (cantidadBuffet * {{ $precioBuffet }}) + (cantidadRemera * {{ $precioRemera }}) + (cantidadGorra * {{ $precioGorra }}));
                              $(this).hide();
                              $('#btn-add-ticket').show();
                              $('#ver-nover').append(`<div>
                                <h2 class="my-4 text-lg font-medium text-gray-900 ">Datos del grupo</h2>
                                                    <div class="flex flex-wrap px-3">
                                                      <div class="w-full pr-0 sm:pr-1.5 sm:w-1/5">
                                                      <div>
                                                        <label for="pais">País</label>
                                                        <input id="pais" name="pais" type="text" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="pais" />
                                                      </div>
                                                    </div>
                                                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="provincia">Provincia</label>
                                                        <input id="provincia" name="provincia" type="text" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="provincia" />
                                                      </div>
                                                    </div>
                                                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="ciudad">Ciudad</label>
                                                        <input id="ciudad" name="ciudad" type="text" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="ciudad"  />
                                                      </div>
                                                    </div>
                                                    <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="congregacion">Congregación</label>
                                                        <input name="congregacion" type="text" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="congregacion" />
                                                      </div>
                                                    </div>
                                                    <div class="w-full pl-0 sm:pl-1.5 mt-6 sm:mt-0 sm:w-1/5">
                                                      <div>
                                                        <label for="pastor">Pastor</label>
                                                        <input id="pastor" name="pastor" type="text" class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" required autocomplete="pastor" />
                                                    </div>
                                                  </div>
                                                </div>  

                                                      <h2 class="my-4 text-lg font-medium text-gray-900 ">Datos individuales</h2>
                                                      <div id="ticket-names">
                                                        <div id="row0" class="ticket flex flex-wrap p-3">
                                                          <div class="w-full pr-0 sm:pr-1.5 sm:w-3/12">
                                                            <div>
                                                              <label class="block font-medium text-sm text-gray-700 " for="nombres">Nombres</label>
                                                              <input required class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" name="nombres[]" type="text" autocomplete="nombres" value="">
                                                            </div>
                                                          </div>
                                                          <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
                                                            <div>
                                                              <label class="block font-medium text-sm text-gray-700 " for="apellidos">Apellidos</label>
                                                              <input required class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" name="apellidos[]" type="text" autocomplete="apellidos" value="">
                                                              
                                                            </div>
                                                          </div>
                                                          <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
                                                            <div>
                                                              <label class="block font-medium text-sm text-gray-700 " for="dni">DNI</label>
                                                              <input required class="border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm mt-1 block w-full" name="dni[]" type="text" autocomplete="dni" value="">
                            
                                                            </div>
                                                          </div>
                                                          <div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
                                                            <label class="block font-medium text-sm text-gray-700 " for="funcion">Función</label>
                                                            <select name="funcion[]" class="mt-1 block w-full border-gray-300    focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm">
                                                              <option value="no-informa"></option>
                                                              <option value="pastor">Pastor/a</option>
                                                              <option value="lider">Líder de Jóvenes</option>
                                                            </select>
                                                          </div>
                                                        </div>
                                                        </div>                              `);
                              $('#lo-otro').show();
                            }
                          });
                        </script>
                      </x-primary-button>
                      
                    </form>
                    </div>
                    @else
                    <div class="box-border max-w-7xl mx-auto mb-3">
                      <p class="bg-red-200 text-red-600 mt-6 px-4 py-3 rounded"><span class="font-bold"><i class="fa-solid fa-shop-lock mr-2"></i>SOLD OUT</span> - Tickets, Buffet y Merchandising agotados.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>