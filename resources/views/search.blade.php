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
									<!--<form method="GET" action="/connection" class="search-right"> 
											 <input class="" name="connection_user_id" cols="50" rows="10" value="{{ $user->id }}" style="display: none">
											<button type="submit" class="btn btn-outline-primary">フォロー</button>
									</form>-->
									@if (auth()->user()->isFollowed($user->id))
										<div class="px-2">
											<span class="px-1 bg-secondary text-light">フォローされています</span>
										</div>
									@endif
									<div class="d-flex justify-content-end flex-grow-1">
										@if (auth()->user()->isFollowing($user->id))
											<form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn" style="border:1px #3490dc solid; background:#3490dc; color:#fff;">フォロー解除</button>
											</form>
										@else
											<form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
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

<!--    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($users as $user)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $user->name }}</p>
                                <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->rank }}</a>
                            </div>
                            @if (auth()->user()->isFollowed($user->id))
                                <div class="px-2">
                                    <span class="px-1 bg-secondary text-light">フォローされています</span>
                                </div>
                            @endif
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (auth()->user()->isFollowing($user->id))
                                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>-->
@endsection