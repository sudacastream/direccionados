@props(['url'])
<tr>
<td class="header">
<a href="https://direccionados.ar" style="display: inline-block;">
@if (trim($slot) === 'Direccionados')
<img src="https://direccionados.ar/notification-logo.png" class="logo" alt="Direccionados Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
