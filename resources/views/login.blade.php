<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $page_description }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">

    <title>{{ $page_title }}</title>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container" style="width: 400px">
            <h1 class="display-4 py-3 text-center">Login</h1>

            @if (Session::has('failed'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('failed') }}
                </div>
            @endif

            <div class="card shadow p-5">
                <form method="post" action="{{ route('user.login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-lg btn-dark">Submit</button>
                </form>
            </div>
        </>
    </div>
</body>

</html>
