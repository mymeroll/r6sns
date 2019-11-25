@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">検索結果</div>
                <div class="card-body">
					<div class="container">
						@if(count($users) > 0 )
						  <div class="row"> 
							@foreach($users as $user)
							  	<div class="search-action__box"> 
									<p class="search-left">ユーザー名：<a href="detail/{{$user->id}}">{{ $user->name }}</a><br>ランク：{{ $user->rank }}</p>
									<!--<form method="GET" action="/connection" class="search-right"> 
											 <input class="" name="connection_user_id" cols="50" rows="10" value="{{ $user->id }}" style="display: none">
											<button type="submit" class="btn btn-outline-primary">フォロー</button>
									</form>-->
								</div>	
							@endforeach
						  </div>
						@endif
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
