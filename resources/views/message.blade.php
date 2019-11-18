@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メッセージ</div>
				<div class="card-body">
					<div class="container">
						<div class="row"> 
							<div class="message-left">
								<form method="GET" action="/connection" class="search-right"> 
									<input type="text">
									<p>ユーザー名：{{$user->name}}</p>
									<button type="submit" class="btn btn-outline-primary">送信</button>
								</form>
							</div>
							<div class="message-right">
								<form method="GET" action="/connection" class="search-right"> 
									<input type="text">
									<p>ユーザー名：{{$user->name}}</p>
									<button type="submit" class="btn btn-outline-primary">送信</button>
								</form>
							</div>
						</div>	 
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>
@endsection
