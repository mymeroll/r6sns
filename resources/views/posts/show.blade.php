@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
			<div class="mb-4 text-right">
				<a class="btn btn-primary" href="/index">
					投稿一覧に戻る
				</a>
				<a class="btn btn-primary" href="">
					更新
				</a>
				<!--<a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
					編集する
				</a>
				<form
				style="display: inline-block;"
				method="POST"
				action="{{ route('posts.destroy', ['post' => $post]) }}"
				>
				@csrf
				@method('DELETE')

				<button class="btn btn-danger">削除する</button>
			</form>-->
			</div>
            <h1 class="h5 mb-4">
				<a href="../detail/{{$post->user->id}}">{{ $post->user->name }}</a>
                {{ $post->title }}
            </h1>

            <p class="mb-5">
                {!! nl2br(e($post->contents)) !!}
            </p>

            <section>
				<form class="mb-4" method="POST" action="{{ route('comments.store') }}">
				@csrf

				<input
					name="user_id"
					type="hidden"
					value="{{ $user->id }}"
				>
					
				<input
					name="post_id"
					type="hidden"
					value="{{ $post->id }}"
				>

				<div class="form-group">

					<textarea
						id="contents"
						name="contents"
						class="form-control {{ $errors->has('contents') ? 'is-invalid' : '' }}"
						rows="4"
					>{{ old('contents') }}</textarea>
					@if ($errors->has('contents'))
						<div class="invalid-feedback">
							{{ $errors->first('contents') }}
						</div>
					@endif
				</div>

				<div class="mt-4">
					<button type="submit" class="btn btn-primary">
						返信する
					</button>
				</div>
				</form>
                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
							<a href="../detail/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->contents)) !!}
                        </p>
                    </div>
                @empty
                    <p>返信はまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection