@extends('layout')

@section('noidung')

	<h1>Nội dung</h1>
	

	@if(1>2)

		{{'đúng'}}
	
	@else
		
		{{'sai'}}
	@endif

	@for($i=0;$i<10;$i++)
		{{$i}}<br>






	@endfor


	<?php

	$user = array();
	




	?>
	@forelse($user as $u)
		{{$u}} {{-- nếu ko rỗng thì lặp --}}
	@empty
		{{1}} {{-- nếu rỗng thì in ra số 1 --}}
	@endforelse

	@if(empty($use))
		{{1}} {{-- nếu rỗng thì in ra số 1 --}}
	@else

		{{-- nếu ko rỗng thì lặp --}}
		@foreach($user as $u)
			{{$u}}
		@endforeach
	@endif


@endsection

@section('content')

	<h1>trang chủ</h1>

@endsection

