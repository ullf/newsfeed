<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
{!! $MyNavBar->asUl() !!}
@isset($news)
@isset($user)
 
 <div class="card">
		<div class="card-body">
			<h5 class="card-title">{{$news->title}}</h5>
			<p>Author: {{$author ?? "Unknown"}}</p>
			<p class="card-text">{{$news->news_text}}</p>
			<p>{{$news->l_url}}</p>
			@isset($author)
			@if($user->username == $author)
				<a href = "{{action('NewsController@news_edit', ['id' => $news->id]) }}">edit</a>
				<a href = "{{action('NewsController@destroy', ['id' => $news->id]) }}">delete</a>
			@endif
			@endisset
		</div>
</div>

 <nav class="navbar navbar-light bg-light">
{{ Form::open(array('route' => array('readcomment'))) }}
					{{ Form::hidden('id',$news->id) }}
					{{ Form::textarea('comment_text',$value=null,['class'=>'form-control','placeholder'=>'comment...']) }}
					{{ Form::submit('leave comment',['class'=>'btn btn-primary']) }}
				{{ Form::close() }}

 </nav>
@isset($comments)
<p>Comments</p>
	@foreach($comments as $comment)
	 <div class="card">
		<div class="card-body">
			<p class="card-text">{{$comment->comment_text}}</p>
			@if($user->username == $comment->author)
				<a href = "{{action('ReadCommentController@comment_edit', ['id' => $comment->id]) }}">edit</a>
				<a href = "{{action('ReadCommentController@destroy', ['id' => $comment->id]) }}">delete</a>
			@endif
		</div>
	</div>
 @endforeach
 
@endisset
@endisset
@endisset
</body>
</html>