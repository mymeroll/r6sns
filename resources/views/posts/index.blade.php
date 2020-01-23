@extends('layouts.app')

@section('content')
@isset( $msg )
<?php echo $msg; ?>
@else
<p>なにかかいてください</p>
@endif

<form method="POST" action="hello">
	{{ csrf_field() }}
	<input type="text" name="msg">
	<input type="submit">
</form>	

@foreach($data as $item)
{{$item['name']}}
@endforeach	
@endsection