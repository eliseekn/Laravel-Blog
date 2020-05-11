@extends('layouts.dashboard')

@section('page_description', $page_description)

@section('page_title', $page_title)

@section('page_content')

    <table class="table my-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post id</th>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

        @foreach ($comments as $comment)

            <tr>
                <th scope="row">{{ $comment->id }}</th>
                <td>{{ $comment->post_id }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    <a id="remove-comment" data-comment-id="{{ $comment->id }}" href="#">
                        Remove comment
                    </a>
                </td>
            </tr>
        
        @endforeach

        </tbody>
    </table>

    <nav class="my-5">
		<ul class="pagination pagination-lg justify-content-center">

			@if ($comments->currentPage() > 1)
			
			<li class="page-item">
				<a class="page-link text-dark" href="{{ $comments->previousPageUrl() }}">
					<i class="fas fa-angle-double-left"></i>
				</a>
			</li>

			@endif

			@if ($comments->lastPage() > 1)
			
			<li class="page-item page-link text-dark">
				Page {{ $comments->currentPage() }}/{{ $comments->lastPage() }}
			</li>
			
			@endif

			@if ($comments->currentPage() < $comments->lastPage())

			<li class="page-item">
				<a class="page-link text-dark" href="{{ $comments->nextPageUrl() }}">
					<i class="fas fa-angle-double-right"></i>
				</a>
			</li>

			@endif

		</ul>
	</nav>

@endsection