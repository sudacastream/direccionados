import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function(){
  window.localStorage.setItem('data-theme', 'dark');
  document.documentElement.setAttribute('data-theme', 'dark');
    var i=1;
    $('#add-ticket').click(function(){
        i++;
        $('#ticket-names').append(`<div id="row`+ i +`" class="ticket flex flex-wrap p-3 border-t border-1 border-gray-200">
        <div class="w-full pr-0 sm:pr-1.5 sm:w-3/12">
          <div>
            <label class="block font-medium text-sm text-gray-700" for="nombres">Nombres</label>
            <input class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="nombres[]" type="text" autocomplete="nombres" required value="">
          </div>
        </div>
        <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
          <div>
            <label class="block font-medium text-sm text-gray-700" for="apellidos">Apellidos</label>
            <input class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="apellidos[]" type="text" autocomplete="apellidos" required value="">
            
          </div>
        </div>
        <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
          <div>
            <label class="block font-medium text-sm text-gray-700" for="dni">DNI</label>
            <input class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="dni[]" type="text" required autocomplete="dni" value="">
          </div>
        </div>
        <div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-3/12">
          <label class="block font-medium text-sm text-gray-700" for="funcion">Función</label>
          <select name="funcion[]" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            <option value="no-informa"></option>
            <option value="pastor">Pastor/a</option>
            <option value="lider">Líder de Jóvenes</option>
          </select>
        </div>
        <div class="pt-6 pl-3">
            <div id="`+ i +`" class="remove-ticket p-3 px-4 rounded cursor-pointer inline-flex items-center font-semibold text-xs text-gray uppercase">
                <i class="fa-regular fa-trash-can"></i><span class="inline-block sm:hidden ml-2">Eliminar</span>
            </div>
        </div>
      </div>
`);
    });
    $(document).on('click', '.remove-ticket', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id).remove();
        });
});
