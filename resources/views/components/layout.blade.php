<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>{{ $title }}</title>
</head>
<body>

<header class="bg-body-secondary p-2 mb-5 shadow-sm mb-5 bg-body-tertiary rounded">
    <nav class="navbar bg-body-tertiay">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <a href="{{ route('home') }}">
                    <img src="https://inicie.digital/wp-content/uploads/2022/03/inicie_logo-03.png" alt="Logo da empresa" width="100">
                </a>
            </div>
            @auth
            <form class="d-flex" role="search" method="get" action="{{ route('users.search') }}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search User" aria-label="Search" name="search_name">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa-brands fa-searchengin"></i></button>
            </form>
            <div class=" d-flex align-items-center justify-content-between">
                <a href="{{ route('users.create') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-user-plus"></i>
                </a>
                <form action="{{ route('logout') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-dark ms-2">
                        <i class="fa-solid fa-door-open"></i>
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </nav>
</header>

<main>
    <div class="container mb-5">
        <h1 class="mb-4">{{ $title }}</h1>

        @isset($successMessage)
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>
    
</main>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" type="module"></script>
</body>
</html>