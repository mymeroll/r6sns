@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-8 top-search__box">
            <form method="GET" action="/search" style="padding-bottom:20px;"> 
				<div class="clearfix">
					<input type="text" name="keyword" required placeholder="名前で検索" class="top-search__left">
					<button type="submit" class="btn btn-outline-success top-search__right">検索</button>
				</div>
			</form>
			<form method="GET" action="/searchrank"> 
				<div class="clearfix">
					ランクで検索：<select id="rank" cclass="form-control{{ $errors->has('rank') ? ' is-invalid' : '' }} top-search__left" name="keywordrank" value="{{ old('rank') }}" required autofocus>
						<option value="Diamond">Diamond</option>
						<option value="Platinum">Platinum</option>
						<option value="Gold">Gold</option>
						<option value="Silver">Silver</option>
						<option value="Bronze">Bronze</option>
						<option value="Copper">Copper</option>
					</select>
					<button type="submit" class="btn btn-outline-success top-search__right">検索</button>
				</div>
			</form>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール</div>
				<div class="card-body">
					<div class="container">
						<div class="row"> 
							<p>ユーザー名：{{$user->name}}<br>
							ランク：{{$user->rank}}</p>	
						</div>	 
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>
@endsection
