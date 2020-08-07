@extends('layouts.purephp')
@section('content')

<div>
	<form class="form-inline rowstyle" action="/" method="post">
		<input class="form-control mr-sm-2" name="search_query" placeholder="{{ __('lang.search_yt') }}" aria-label="Search" value="{{$search_query}}">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('lang.search') }}</button>
	</form>
</div>


<div class="row searcher" id="yt_result">
	@foreach ($results as $result)
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 marginbottom">
			<div class="framered rowstyle">
				<a class="text-decoration-none" href="/moviedetail/?search={{$search_query}}&page={{$page_token}}&movie_id={{ $result->id->videoId }}"> 
					<img class="image_pos"
						  src="{{ $result->snippet->thumbnails->default->url }}"
						  alt="{{ $result->snippet->description }}">
					{{ $result->snippet->title }}
				</a>
			</div>
		</div>
	@endforeach
</div>

<div class="row searcher">
	<div class="col">
		<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item {{ $prev_page_token ? '' : 'disabled' }} ">
					<a id="page_left" class="page-link" href="/?search_query={{$search_query}}&page_token={{$prev_page_token}}">{{ __('lang.previous') }}</a>
				</li>
				<li class="page-item {{ $next_page_token ? '' : 'disabled' }} ">
					<a id="page_left" class="page-link" href="/?search_query={{$search_query}}&page_token={{$next_page_token}}">{{ __('lang.next') }}</a>
				</li>
			</ul>
		</nav>
	</div>
</div>


@stop
