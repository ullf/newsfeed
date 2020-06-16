<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
{!! $MyNavBar->asUl() !!}
@isset($speclink)
 Hello
 {{$speclink->l_url}}
@endisset
@isset($n)
 @foreach($n as $in)
 <div class="card">
	  <div class="card-body">
		<p class="card-title">{{$in->title}}</p>
		<a href = "{{action('NewsController@show', ['id' => $in->id]) }}">show</a>
	 </div>
</div>
 @endforeach
@endisset
</body>
</html>