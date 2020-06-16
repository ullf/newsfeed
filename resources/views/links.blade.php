<html>
	<head>
		<script src="{{ asset('js/app.js') }}" defer></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
<body>
{!! $MyNavBar->asUl() !!}
@isset($links)
<div class="card">
<div class="card-header">
	{{ __('messages.Links') }}
</div>
  <ul class="list-group list-group-flush">
 @foreach($links as $l)
		<div class="card-body">
		 <li class="list-group-item">
			<p>{{$l->id}}</p>
			<a href = "{{action('LinkController@show', ['specid' => $l->id]) }}">{{$l->l_url}}</a>
		</li>
		</div>
 @endforeach
 </ul>
</div>
 
@endisset
</body>
</html>