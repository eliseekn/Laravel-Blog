@extends('layouts.main')

@section('page_description', $page_description)

@section('page_title', $page_title)

@section('header_title', $page_title)

@section('page_content')

    <section class="container my-5">
        <div class="row row-cols-2">

        @foreach ($posts as $post)

            <article class="col mb-5">
                <div class="card">
                    <img 
                        src="/assets/img/posts/{{ $post->image }}" 
                        class="card-img-top" 
                        alt="Post image">
                    
                    <div class="card-body">
                        <h2 class="card-title post-title">{{ $post->title }}</h2>
                        <p class="card-text mt-3 text-justify">
                            {{ mb_strimwidth($post->content, 0, 290, '[...]') }}
                        </p>
                        <a href="{{ route('post', array('slug' => $post->slug)) }}" class="btn btn-lg btn-dark read-more">Read more</a>
                    </div>
                </div>
            </article>

        @endforeach

        </div>
    </section>

    <nav class="my-5">
		<ul class="pagination pagination-lg justify-content-center">

			@if ($posts->currentPage() > 1)
			
			<li class="page-item">
				<a class="page-link text-dark" href="{{ $posts->previousPageUrl() }}">
					<i class="fas fa-angle-double-left"></i>
				</a>
			</li>

			@endif

			@if ($posts->lastPage() > 1)
			
			<li class="page-item page-link text-dark">
				Page {{ $posts->currentPage() }}/{{ $posts->lastPage() }}
			</li>
			
			@endif

			@if ($posts->currentPage() < $posts->lastPage())

			<li class="page-item">
				<a class="page-link text-dark" href="{{ $posts->nextPageUrl() }}">
					<i class="fas fa-angle-double-right"></i>
				</a>
			</li>

			@endif

		</ul>
	</nav>

@endsection

@section('footer_title', $page_title)
