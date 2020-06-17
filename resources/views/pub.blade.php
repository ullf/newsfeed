{!! $MyNavBar->asUl() !!}
@extends('layouts.app')

@section('content')
<div class="container">
{{App::getLocale()}}
	{{ Form::open(array('route' => array('change_locale'))) }}
		{{ Form::select('locale',['en'=>'en','es'=>'es']) }}
		{{ Form::submit('Save',['class'=>'btn btn-primary']) }}
	{{ Form::close() }}
	
@if($reader == false)
	@isset($userinfo)
	@isset($links)
	@isset($num)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Publisher panel') }}</div>

                <div class="card-body">
                   Publisher information:
				   <p>Username: {{$userinfo->username}}</p>
                   <p>Number of publications:{{$num}} </p>
				   <p>Ranking: {{$ranking}} </p>
                </div>
				<?php
					$arr = $links->toArray();
					$urls = [];
					$i = 0;
					foreach($arr as $item) {
						$urls[$i] = $item['l_url'];
						$i++;
					}
				?>
				@isset($urls)
				<nav class="navbar navbar-light bg-light">
				{{ Form::open(array('route' => array('pubr'))) }}
					{{ Form::label('title', 'Title ') }}
					{{ Form::text('title') }}
					{{ Form::textarea('news_text',$value=null,['class'=>'form-control','placeholder'=>'article text...']) }}
					<select name="ll">
					@foreach($urls as $u)
						<option value="{{$u}}">{{$u}}</option>
					@endforeach
					</select>
					{{ Form::select('category',['art'=>'art','digital marketing'=>'digital marketing','tech'=>'tech']) }}
					{{ Form::submit('Save',['class'=>'btn btn-primary']) }}
				{{ Form::close() }}
				</nav>
				
				<nav class="navbar navbar-light bg-light">
				{{ Form::open(array('route' => array('linkstore'))) }}
					{{ Form::label('l_url', 'URL ') }}
					{{ Form::text('l_url') }}
					{{ Form::submit('Save',['class'=>'btn btn-primary']) }}
				{{ Form::close() }}
				</nav>
            </div>
        </div>
    </div>
	@endisset
	@endisset
	@endisset
	@endisset
	@endif
	@if($reader == true)
		@isset($userinfo)
			<p>Hello {{$userinfo->username}}</p>
			<p>Status: reader</p>
		@endisset
	@endif
</div>
@endsection
