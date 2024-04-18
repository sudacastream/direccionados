import './bootstrap';

import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function(){
  window.localStorage.setItem('data-theme', 'dark');
  document.documentElement.setAttribute('data-theme', 'dark');
  stickyMenu();
    var i=1;
    $('#add-ticket').on('click', function(){      
        i++;
          $('#ticket-names').append(`<div id="row`+ i +`" class="ticket flex flex-wrap p-3 border-t border-1 border-gray-200">
        <div class="w-full pr-0 sm:pr-1.5 sm:w-2/12">
          <div>
            <label class="block font-medium text-sm text-gray-700" for="nombres">Nombres</label>
            <input class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="nombres[]" type="text" autocomplete="nombres" required value="">
          </div>
        </div>
        <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
          <div>
            <label class="block font-medium text-sm text-gray-700" for="apellidos">Apellidos</label>
            <input class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="apellidos[]" type="text" autocomplete="apellidos" required value="">
            
          </div>
        </div>
        <div class="w-full px:0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
          <div>
            <label class="block font-medium text-sm text-gray-700" for="dni">DNI -sin puntos-</label>
            <input class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="dni[]" type="text" required autocomplete="dni" value="">
          </div>
        </div>
        <div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
          <label class="block font-medium text-sm text-gray-700" for="funcion">¿Es Pastor/a?</label>
          <select name="funcion[]" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            <option value="no-informa">No</option>
            <option value="pastor">Si</option>
          </select>
        </div>
        <div class="w-full px-0 sm:px-1.5 mt-6 sm:mt-0 sm:w-2/12">
          <label class="block font-medium text-sm text-gray-700" for="funcion">¿Agregar remera?</label>
          <select id="combo`+ i +`" name="combo[]" onchange="combo(this.value,`+ i +`)" class="combo border-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            <option value="0">No</option>
            <option value="1">Si</option>
          </select>
        </div>
        <div class="pt-6 pl-3">
            <div id="`+ i +`" data-combo="0" onclick="remover('`+ i +`', this.dataset.combo)" class="remove-ticket p-3 px-4 rounded cursor-pointer inline-flex items-center font-semibold text-xs text-gray uppercase">
                <i class="fa-regular fa-trash-can"></i><span class="inline-block sm:hidden ml-2">Eliminar</span>
            </div>
        </div>
      </div>
`);
addTicket($('#combo'+ i).val());
    });
    $('#lvision, #mvision').on('click', (e) => {
      e.preventDefault();
      $('#menu').removeClass('active');
      $('#backdrop').removeClass('fixed').addClass('hidden').removeClass('active');
      $('html, body').animate({
        scrollTop: $("#vision").offset().top
    }, 200);
    });
    $('#loradores, #moradores').on('click', (e) => {
      e.preventDefault();
      $('#menu').removeClass('active');
      $('#backdrop').removeClass('fixed').addClass('hidden').removeClass('active');
      $('html, body').animate({
        scrollTop: $("#oradores").offset().top
    }, 200);
    });
    $('#llugar, #mlugar').on('click', (e) => {
      e.preventDefault();
      $('#menu').removeClass('active');
      $('#backdrop').removeClass('fixed').addClass('hidden').removeClass('active');
      $('html, body').animate({
        scrollTop: $("#lugar").offset().top
    }, 200);
    });
    $('#ltickets, #mtickets').on('click', (e) => {
      e.preventDefault();
      $('#menu').removeClass('active');
      $('#backdrop').removeClass('fixed').addClass('hidden').removeClass('active');
      $('html, body').animate({
        scrollTop: $("#tickets").offset().top
    }, 200);
    });
    $('#lfaq, #mfaq').on('click', (e) => {
      e.preventDefault();
      $('#menu').removeClass('active');
      $('#backdrop').removeClass('fixed').addClass('hidden').removeClass('active');
      $('html, body').animate({
        scrollTop: $("#faq").offset().top
    }, 200);
    });
});
$('#menu-btn, #close-menu-btn, #backdrop').on('click',()=>{
  $('#menu').toggleClass('active');
  $('#backdrop').toggleClass('fixed').toggleClass('hidden').toggleClass('active');
});
$(window).on('scroll', () => {
  stickyMenu();
});
function stickyMenu() {
  if(window.scrollY > innerHeight - 1)
  {
    $('#sticky').addClass('fixed').addClass('bg-verde').addClass('shadow');
    $('#btn-tienda').removeClass('bg-verde').addClass('border');
  }
  else
  {
    $('#sticky').removeClass('fixed').removeClass('bg-verde').removeClass('shadow');
    $('#btn-tienda').removeClass('border').addClass('bg-verde');
  }
}