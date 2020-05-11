@extends('layouts.dashboard')

@section('page_description', $page_description)

@section('page_title', $page_title)

@section('page_content')

    <div class="text-center">
        <button 
            class="btn btn-lg btn-dark" 
            data-toggle="modal" 
            data-target="#add-post">Add post</button>
    </div>

    <table class="table my-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Feautured image</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

        @foreach ($posts as $post)

            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>
                    <img 
                        src="/assets/img/posts/{{ $post->image }}" 
                        alt="Feautured image"
                        class="img-fluid">
                </td>
                <td>
                    <a 
                        id="edit-post" 
                        data-post-id="{{ $post->id }}" 
                        data-post-title="{{ $post->title }}" 
                        data-post-content="{{ $post->content }}" 
                        href="#">Edit post</a>
                </td>
                <td>
                    <a id="replace-image" data-post-id="{{ $post->id }}" href="#">
                        Replace image
                    </a>
                </td>
                <td>
                    <a id="remove-post" data-post-id="{{ $post->id }}" href="#">
                        Remove post
                    </a>
                </td>
            </tr>
        
        @endforeach

        </tbody>
    </table>

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