<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('page_description')">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">

    <title>@yield('page_title')</title>
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-3 text-center">Dashboard</h1>
        
        <div class="text-center py-3">
            <a href="{{ route('dashboard.posts') }}" class="btn btn-lg btn-dark">Posts</a>
            <a href="{{ route('dashboard.comments') }}" class="btn btn-lg btn-dark mx-2">Comments</a>
            <a href="{{ route('home') }}" class="btn btn-lg btn-dark mr-2">Go back home</a>
            <a href="{{ route('user.logout') }}" class="btn btn-lg btn-dark">Logout</a>
        </div>

        <div class="card shadow mt-4 p-5">

            @yield('page_content')

        </div>
    </div>

    <div id="add-post" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add post</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('post.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="title" 
                                placeholder="Post title" 
                                class="form-control" 
                                required>
                        </div>

                        <div class="form-group">
                            <textarea 
                                name="content" 
                                rows="5" 
                                placeholder="Post content" 
                                class="form-control" 
                                required></textarea>
                        </div>

                        <input type="file" name="image" class="form-control-file" required>
                    </div>
                
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-dark" value="Add">
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-post-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit post</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="edit-post-form" data-post-id="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                placeholder="Post title" 
                                class="form-control" 
                                required>
                        </div>

                        <div class="form-group">
                            <textarea 
                                name="content" 
                                id="content" 
                                rows="5" 
                                placeholder="Post content" 
                                class="form-control" 
                                required></textarea>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-dark" value="Edit">
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="replace-image-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Replace featured image</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="replace-image-form" data-post-id="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="form-control-file" 
                            required>
                    </div>
                
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-dark" value="Replace">
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
</body>

</html>