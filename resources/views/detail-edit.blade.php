@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール編集</div>
				<div class="card-body">
					<div class="container">
						<div class="row"> 
						<form method="POST" action="/detail-edit" style="width:100%;">
                        @csrf
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right" style="text-align: left !important;">{{ __('名前') }}</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

									@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right" style="text-align: left !important;">{{ __('ランク') }}</label>

								<div class="col-md-6">
									<select id="rank" class="form-control{{ $errors->has('rank') ? ' is-invalid' : '' }}" name="rank" value="{{ $user->rank }}" required autofocus>
										<option value="{{ $user->rank }}" selected>{{ $user->rank }}</option>
										<option value="Diamond">Diamond</option>
										<option value="Platinum">Platinum</option>
										<option value="Gold">Gold</option>
										<option value="Silver">Silver</option>
										<option value="Bronze">Bronze</option>
										<option value="Copper">Copper</option>
									</select>

									@if ($errors->has('rank'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('rank') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group row">
								<label for="profile" class="col-md-4 col-form-label text-md-right" style="text-align: left !important;">{{ __('自己紹介') }}</label>

								<div class="col-md-6">
									<textarea rows="6" id="profile" class="form-control{{ $errors->has('profile') ? ' is-invalid' : '' }}" name="profile">{{ $user->profile }}</textarea>

									@if ($errors->has('profile'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('profile') }}</strong>
										</span>
									@endif
								</div>
							</div>
							
							<input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
							value="{{ $user->password }}" name="password" required>

							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif

							<div class="form-group row mb-0">
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary">
										{{ __('完了') }}
									</button>
								</div>
							</div>
                   	 	</form>
						</div>	 
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>
@endsection
