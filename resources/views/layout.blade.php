<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blade Template</title>
	<link rel="stylesheet" href="">
</head>
<body>


	<div>header</div>
	<div>
		@yield('content') 
	</div>
	<div>
		@yield('noidung') 
	</div>

	<div>
		@include('footer')
	</div>

</body>
</html>