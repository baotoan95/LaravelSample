<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Master layout</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"></style>
</head>
<body>
	@include('layouts.header')
	<div id="container">
		<h1>Hello there</h1>
		@yield('content')
		<br/>
	</div>
	@include('layouts.footer')
</body>
</html>