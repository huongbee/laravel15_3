<DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>View</title>
	<link rel="stylesheet" href="">
</head>
<body>
	Hello World!

	{{$user}} {{-- <?php echo $user ;?> --}}


<form method="POST" action="{{route('session')}}">
	{{csrf_field()}}
	<input type="submit" name="" value="xem">
	@if(Session::has('message'))
	{{Session::get('message')}}
	@endif
</form>

</body>
</html>