
<h1>Đây là trang quản trị</h1>
@if ($alert = Session::get('thanhcong'))
	<div class="alert alert-warning">
		{{ $alert }}
	</div>
@endif
