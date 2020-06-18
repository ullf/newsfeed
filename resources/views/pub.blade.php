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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Publisher panel') }}</div>

                <div class="card-body">
				{{__('messages.Publisherinfo')}}:
				   <p>Username: {{$userinfo->username}}</p>
                   <p>{{__('messages.Numofpub')}}:{{$num}} </p>
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
				@error("title")
					<p color="red">Title is required</p>
				@enderror
				@error("news_text")
					<p color="red">Text is required</p>
				@enderror
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
				</nav>
            </div>
        </div>
    </div>
	@endisset
	@endif
	@if($reader == true && $userinfo->is_admin == 0)
		@isset($userinfo)
			<p>{{__('messages.Hello')}} {{$userinfo->username}}</p>
			<p>{{__('messages.Status')}}: reader</p>
		@endisset
	@endif
	@if($userinfo->is_admin == 1)
				<p>{{__('messages.Hello')}} {{$userinfo->username}}</p>
				<p>{{__('messages.Status')}}: admin</p>
				<nav class="navbar navbar-light bg-light">
				{{ Form::open(array('route' => array('linkstore'))) }}
					{{ Form::label('l_url', 'URL ') }}
					{{ Form::text('l_url') }}
					{{ Form::submit('Save',['class'=>'btn btn-primary']) }}
				{{ Form::close() }}
				</nav>
				<p>{{__('messages.Deletepub')}}</p>
				@foreach($publishers as $publisher)
					<p>{{$publisher->username}}</p>
					<a href = "{{action('PublisherController@destroy', ['id' => $publisher->id]) }}">delete</a>
				@endforeach
				
				@endif
</div>
@endsection
