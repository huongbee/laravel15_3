<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form</title>
	<link rel="stylesheet" href="">

<body>
	<form method="POST" action="{{route('login')}}">

		{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
		{{csrf_field()}}

		Username: <input type="text" name="username[]" placeholder="Nhập username">
		<br><br>
		Username2: <input type="text" name="username[]" placeholder="Nhập username2">
		<br><br>
		Mật khẩu: <input type="password" name="password" placeholder="Nhập Mật khẩu">
		<br><br>
		<button type="submit" name="gui">Login</button>
	</form>
</body>
</html>