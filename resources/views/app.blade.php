<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Royal App</title>
    <style>
        table th {
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{URL::route('authors.index')}}" class="nav-link px-2 link-dark">Authors</a></li>
                <li><a href="{{URL::route('books.index')}}" class="nav-link px-2 link-dark">Books</a></li>
                <li><a href="{{URL::route('profile')}}" class="nav-link px-2 link-dark">Profile</a></li>
            </ul>
            <div class="col-md-3 text-end">
                Welcome, {{session('user_name') }} --
                <a href="{{URL::route('logout')}}" class="btn btn-danger">Logout</a>
            </div>
        </header>

        @yield('content')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>