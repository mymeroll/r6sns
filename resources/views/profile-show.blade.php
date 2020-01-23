@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール</div>
                <div class="card-body">
					<div class="container">
						  <div class="row"> 
							  	<div class="search-action__box"> 
									<p>ユーザー名：{{ $profile->name }}<br>ランク：{{ $profile->rank }}<br>自己紹介：{{ $profile->profile }}</p>
								</div>	
						  </div>
						<a href="/ev/{{$profile->id}}">
						<button type="submit" class="btn btn-primary">
								{{ __('評価する') }}
						</button>
						</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
