@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">評価ページ</div>
                <div class="card-body">
					<div class="container">
						ユーザーのプレイスタイルが自分に合っていたかを評価してください
						<form method="POST" action="/evaluation">
						@csrf
						  <div class="evaluation">
							<input type="hidden" name="evaluationed_id" value="{{ $profile->id }}"/>
							<input id="star1" type="radio" name="evaluation" value="5"/>
							<label for="star1"><span class="text">最高</span>★</label>
							<input id="star2" type="radio" name="evaluation" value="4" />
							<label for="star2"><span class="text">良い</span>★</label>
							<input id="star3" type="radio" name="evaluation" value="3" />
							<label for="star3"><span class="text">普通</span>★</label>
							<input id="star4" type="radio" name="evaluation" value="2" />
							<label for="star4"><span class="text">悪い</span>★</label>
							<input id="star5" type="radio" name="evaluation" value="1" />
							<label for="star5"><span class="text">最悪</span>★</label>
						  </div>
						  <div class="form-group row mb-0">
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary">
									{{ __('評価する') }}
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
@endsection
