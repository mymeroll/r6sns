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
									@if (auth()->user()->isEvaluationed($user->id))
										<div class="px-2">
											<span class="px-1 bg-secondary text-light">フォローされています</span>
										</div>
									@endif
									<div class="d-flex justify-content-end flex-grow-1">
										@if (auth()->user()->isEvaluation($user->id))
											<form action="{{ route('unevaluation', ['id' => $user->id]) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn" style="border:1px #3490dc solid; background:#3490dc; color:#fff;">フォロー解除</button>
											</form>
										@else
											<form action="{{ route('evaluation', ['id' => $user->id]) }}" method="POST">
												{{ csrf_field() }}

												<button type="submit" class="btn" style="border:1px #3490dc solid; background:#fff; color:#3490dc;">フォローする</button>
											</form>
										@endif
									</div>
								</div>	
							@endforeach
						  </div>
						@endif
					</div>
                </div>
				<div class="my-4 d-flex justify-content-center">
					{{ $users->links() }}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection