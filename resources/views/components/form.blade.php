@props([
    'method' => 'get',
    'action' => '',
])

<form id="{{ $id }}" {{ $attributes }} action="{{ $action }}" method="{{ strtolower($method) == 'get' ? 'get' : 'post' }}">
	@csrf
	@if(in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
		@method($method)
	@endif
	{{ $slot }}
</form>