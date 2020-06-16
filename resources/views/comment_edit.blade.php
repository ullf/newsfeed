<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
{!! $MyNavBar->asUl() !!}
 <nav class="navbar navbar-light bg-light">
 @isset($user)
  @isset($comment)
{{ Form::open(array('route' => array('updatecomment',['id'=>$comment->id]))) }}
					{{ Form::hidden('id',$user->id) }}
					{{ Form::textarea('comment_text',$value=null,['class'=>'form-control','placeholder'=>'comment...']) }}
					{{ Form::submit('update comment',['class'=>'btn btn-primary']) }}
				{{ Form::close() }}
@endisset
@endisset
 </nav>
</body>
</html>