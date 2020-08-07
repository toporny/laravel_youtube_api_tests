@extends('layouts.purephp')
@section('content')

<div class="text-center alert alert-dark" role="alert">
	{{ __('lang.movie_detail') }}
</div>

<p class="text-center">
	<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$movie_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<br>
	<a href="/?pageToken={{$pageToken}}&search_query={{$search_query}}" class="btn btn-primary" role="button" aria-disabled="true">{{ __('lang.back') }}</a>
</p>

@stop
