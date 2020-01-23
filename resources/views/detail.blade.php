@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom:30px;">
                <div class="card-header">おすすめユーザー</div>
				<div class="card-body">
					<div class="container">
						<div class="row">
							@if(count($evaluation) > 0 )
							@foreach($evaluation as $evaluation)
								<div class="search-action__box">
								@php
								$id = $evaluation->evaluationed_id; 
								$command="python /Users/mymeroll/desktop/main.py";
								exec($command,$output);
								$output = implode(",", $output) . "\n";
								$output = str_replace('[', '', $output);
								$output = str_replace(']', '', $output);
								$price = preg_replace('/[^0-9]/', '', $output);	
								@endphp	
									@if(count($a) > 0 )
										@foreach($a as $a)
										@if($price == $a->id)
										@php
										$command="python /Users/mymeroll/desktop/main.py";
										exec($command,$output);
										$output = implode(",", $output) . "\n";
										$output = str_replace('[', '', $output);
										$output = str_replace(']', '', $output);
										$price = preg_replace('/[^0-9]/', '', $output);
										@endphp
											<p class="search-left">ユーザー名：
											<a href="../detail/@php echo $price; @endphp">{{$a->name}}</a>		
										@endif		
										@endforeach
									@endif	
								</p>
								</div>	
							@endforeach
							@endif			
						</div>	 
					</div>
				</div>	
            </div>
			
			<div class="card">
                <div class="card-header">プロフィール</div>
				<div class="card-body">
					<div class="container">
						<div class="row"> 
							<p>ユーザー名：{{$user->name}}<br>
							ランク：{{$user->rank}}<br>自己紹介：{{$user->profile}}</p>	
						</div>	 
					</div>
				</div>	
            </div>
        </div>
    </div>
</div>
@endsection
