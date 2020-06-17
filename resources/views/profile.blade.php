{!! $MyNavBar->asUl() !!}
@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Publisher panel') }}</div>

                <div class="card-body">
                   Publisher information:
				   <p>Username: {{$userinfo->username}}</p>
                   <p>Number of publications:{{$num}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection