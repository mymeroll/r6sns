@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">通知</div>
                <div class="card-body">
					<div class="container">					
						@if(count($connection) > 0)
						  <div class="row"> 
							  
							  @foreach($connection as $connection)
							  	<div class="search-action__box">
									<p class="notice-left" style="padding-top: 23px;">{{ $connection->user->name }}からフォローされています</p>
								<form method="POST" action="/notice-edit" class="notice-center"> 
							  @csrf	  
								<input class="" type="hidden" name="user_id" cols="50" rows="10" value="{{ $connection->user_id }}" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}"required>
								@if ($errors->has('user_id'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('user_id') }}</strong>
									</span>
								@endif  
								<input class="" type="hidden" name="connection_user_id" cols="50" rows="10" value="{{ $connection->connection_user_id }}" class="form-control{{ $errors->has('connection_user_id') ? ' is-invalid' : '' }}" required>
								@if ($errors->has('user_id'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('connection_user_id') }}</strong>
									</span>
								@endif  
								<input class=""type="hidden"  name="is_checked" cols="50" rows="10" value="{{ $connection->is_checked }}" class="form-control{{ $errors->has('is_checked') ? ' is-invalid' : '' }}" required>
								@if ($errors->has('user_id'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('is_checked') }}</strong>
									</span>
								@endif  
								<input class="" type="hidden" name="notice" cols="50" rows="10" value="1" class="form-control{{ $errors->has('notice') ? ' is-invalid' : '' }}"required>
								@if ($errors->has('user_id'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('notice') }}</strong>
									</span>
								@endif  
								<button type="submit" class="btn btn-primary">既読する</button>
							    </form>
								<form method="GET" action="/connection" class="notice-right"> 
										 <input class="" name="connection_user_id" cols="50" rows="10" value="{{ $user->id }}" style="display: none">
										<button type="submit" class="btn btn-outline-primary">フォロー</button>
								</form>	
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
