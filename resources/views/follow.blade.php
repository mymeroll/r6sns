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
							<div class="follow-left">  
							@if(count($connection) > 0) 
							@foreach($connection as $connect)  
								<p>{{ $connect->connection_user_id }}</p>
							@endforeach	
							@endif
							</div>	
							<div class="follow-right">  
							@if(count($connections) > 0) 
							@foreach($connections as $connection) 
								<p>{{ $connection->user->name }}</p>
							@endforeach	
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
