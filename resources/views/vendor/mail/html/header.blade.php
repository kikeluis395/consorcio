<tr>
<td class="header">
<a href="https://consorciogczorion.pe/" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('images/consorcio_gcz_orion.png')}}" style="object-fit: contain; width: 200px;" class="logo" alt="Consorcio Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
