@extends('layouts.main')

@section('page_description', $page_description)

@section('page_title', $page_title)

@section('header_title', $header_title)

@section('page_content')

    <section class="container w-75 my-5">
        <article class="card mb-5">
            <img 
                src="/assets/img/posts/{{ $post->image }}" 
                class="card-img-top" 
                alt="Post image">
            
            <div class="card-body">
                <h2 class="card-title post-title">{{ $post->title }}</h2>
                <p class="card-text mt-3 text-justify">{{ $post->content }}</p>
                <a href="{{ route('home') }}" class="btn btn-lg btn-dark">Go back home</a>
            </div>
        </article>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a 
                    class="nav-item nav-link active lead" 
                    id="nav-home-tab" 
                    data-toggle="tab" 
                    href="#nav-home" 
                    role="tab" 
                    aria-controls="nav-home" 
                    aria-selected="true">Comments ({{ count($comments) }})</a>

                <a 
                    class="nav-item nav-link lead" 
                    id="nav-profile-tab" 
                    data-toggle="tab" 
                    href="#nav-profile" 
                    role="tab" 
                    aria-controls="nav-profile" 
                    aria-selected="false">Leave a comment</a>
            </div>
        </nav>
        
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="mt-4">
                
                    @foreach($comments as $comment)

                    <p class="font-weight-bold">{{ $comment->author }}</p>
                    <p>{{ $comment->content }}</p>

                    @endforeach

                </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                @endif

                <form method="post" action="{{ route('comment.add', $post->id) }}">
                    @csrf
                    <div class="form-group">
                        <input 
                            type="email" 
                            name="author" 
                            placeholder="Your email" 
                            class="form-control" 
                            required>
                    </div>

                    <div class="form-group">
                        <textarea 
                            name="content" 
                            rows="5" 
                            placeholder="Your comment" 
                            class="form-control" 
                            required></textarea>
                    </div>

                    <input type="submit" class="btn btn-lg btn-dark" value="Submit">
                </form>
            </div>
        </div>
    </section>

@endsection

@section('footer_title', $header_title)
