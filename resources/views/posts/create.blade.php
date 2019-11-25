@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の新規作成
            </h1>

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <fieldset class="mb-4">
                        <input
                            id="user_id"
                            name="user_id"
                            class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                            value="{{$user->id}}"
                            type="hidden"
                        >
                        @if ($errors->has('user_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </div>
                        @endif
					
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}"
                            type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="contents">
                            本文
                        </label>

                        <textarea
                            id="contents"
                            name="contents"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('contents') }}</textarea>
                        @if ($errors->has('contents'))
                            <div class="invalid-feedback">
                                {{ $errors->first('contents') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('top') }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection