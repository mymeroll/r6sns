@extends('layouts.app')

@section('content')
    <div class="container mt-4">
	<div class="mb-4">
		<div style="padding-bottom:20px;">
			<a href="{{ route('posts.create') }}" class="btn btn-primary">
				投稿の新規作成
			</a>
		</div>
		<div>
			<form method="GET" action="/search-post" > 
				<div class="clearfix">
					<input type="text" name="keyword" required placeholder="投稿を検索" class="top-search__left">
					<button type="submit" class="btn btn-outline-success top-search__right">検索</button>
				</div>
			</form>
		</div>	
	</div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
					<a href="detail/{{$post->user->id}}">{{ $post->user->name }}</a>
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
						{!! nl2br(e(str_limit($post->contents, 200))) !!}
					</p>

					<a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
						続きを読む
					</a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            返信 {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
		<div class="d-flex justify-content-center mb-5">
			{{ $posts->links() }}
		</div>
    </div>
@endsection
