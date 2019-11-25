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
							<p>ユーザー名：{{$user->name}}<br>
							ランク：{{$user->rank}}<br>自己紹介：{{$user->profile}}</p>	
						</div>	 
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>
@endsection
