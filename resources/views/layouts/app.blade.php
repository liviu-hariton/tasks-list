<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>My Tasks</title>

    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="col-lg-8 mx-auto p-4 py-md-5">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-3 mb-md-0 text-dark text-decoration-none">
                <i class="fa-brands fa-bootstrap fa-2xl"></i>
                <span class="fs-3">MyTasks</span>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Tasks list</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="{{ route('tasks.newform') }}" class="btn btn-success">Add new task</a>

                @yield('actions')
            </div>
        </header>

        <main>
            <h1>@yield('title')</h1>

            <div>
                @if( session()->has('success') )
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fa fa-check-double"></i> {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
