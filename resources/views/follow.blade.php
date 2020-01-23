@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">フォロー</div>
				<div class="card-body">
				<div class="container">
						<div class="row"> 
								<div class="follow-left">
									<p style="text-align: center;">フォロー</p>  
								</div>
								<div class="follow-right">  
									<p style="text-align: center;">フォロワー</p>
								</div>
							@if(count($users) > 0 )
								
							<div class="follow-left">	
								@foreach($users as $user)
									@if (auth()->user()->isFollowing($user->id))
										<p>ユーザー名：<a href="detail/{{$user->id}}">{{ $user->name }}</a><br>ランク：{{ $user->rank }}</p>
									@endif
								@endforeach
								
							</div>
								
							<div class="follow-right">	
								@foreach($users as $user)
									@if (auth()->user()->isFollowed($user->id))
									<p>ユーザー名：<a href="detail/{{$user->id}}">{{ $user->name }}</a><br>ランク：{{ $user->rank }}</p>
									@endif
								@endforeach
							</div>	
							 @endif
						</div>		
				</div>	
				</div>
				</div>
			</div>
    	</div>
	</div>
</div>

@endsection
