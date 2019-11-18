@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
			<div class="mb-4 text-right">
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
                {{ $post->title }}
            </h1>

            <p class="mb-5">
                {!! nl2br(e($post->contents)) !!}
            </p>

            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
				<form class="mb-4" method="POST" action="{{ route('comments.store') }}">
				@csrf

				<input
					name="post_id"
					type="hidden"
					value="{{ $post->id }}"
				>

				<div class="form-group">
					<label for="body">
						本文
					</label>

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
						コメントする
					</button>
				</div>
				</form>
                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->contents)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection