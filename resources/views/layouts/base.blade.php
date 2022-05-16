<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.includes.head')

<body class="home-page home-01 ">

	@include('layouts.includes.header')

	{{ $slot }}

	@include('layouts.includes.footer')
	
	@include('layouts.includes.scripts')
</body>
</html>