<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
{!! $MyNavBar->asUl() !!}
 @isset($user)
 @isset($news)
 <nav class="navbar navbar-light bg-light">
{{ Form::open(array('route' => array('updatenews',['id'=>$news->id]))) }}
					{{ Form::hidden('id',$user->id) }}
					{{ Form::textarea('news_text',$value=null,['class'=>'form-control','placeholder'=>'article...']) }}
					{{ Form::submit('update article',['class'=>'btn btn-primary']) }}
				{{ Form::close() }}
@endisset
@endisset
 </nav>
</body>
</html>