@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">通知</div>
                <div class="card-body">
					<div class="container">					
						@if(count($connections) > 0)
						  <div class="row"> 
							@foreach($connections as $connection)
							  	<div class="search-action__box">
									<p class="search-left">{{ $connection->notice }}{{ $user->id }}からフォローされています</p>
									connection_user_id
									{{ $connection->connection_user_id }}
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
