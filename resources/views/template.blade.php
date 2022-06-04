<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <title>Semantik Web</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('style.css') }}" rel="stylesheet">

    </head>
    <body>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg red">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Marvel_Logo.svg" alt="Logo Marvel" height="35">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/karakter">Karakter</a>
                        <a class="nav-link" href="/film">Film</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <div class="container my-5">
            @yield('content')
        </div>

        <!-- Footer Start -->
        <div class="container-fluid red footer">
            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
                    <p class="col-md-4 mb-0 nav-link">© 2022 Anastasia Victoria Yuarsa 140810190049</p>

                    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Marvel_Logo.svg" alt="Logo Marvel" height="35">
                    </a>

                    <ul class="nav col-md-4 justify-content-end">
                      <li class="nav-item"><a href="https://marvelcinematicuniverse.fandom.com/" class="nav-link px-2">Data Source</a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>
