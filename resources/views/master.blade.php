<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="\css\bootstrap.min.css">
    <link rel="stylesheet" href="\css\normalize.css">
    <link rel="stylesheet" href="\css\all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kanit&family=Libre+Baskerville:wght@700&display=swap');

        body {
            background-image: url('/img/vecteezy_abstract-gradient-pastel-blue-and-purple-background-neon_8617161.jpg');
        }

        .navbar-brand {
            font-weight: bold;
            font-family: 'Libre Baskerville', serif;
        }

        .table-responsive {
            border-radius: 20px;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        tbody td {
            font-weight: 500;
            color: #999999;
        }

        /* dropdown styling */

        .dropdown-menu {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            border: none;
            border-radius: 0;
            padding: 0.7em;
        }

        @media only screen and (min-width: 992px) {
            .dropdown:hover .dropdown-menu {
                display: flex;
            }

            .dropdown-menu.show {
                display: flex;
            }
        }

        .dropdown-menu ul {
            list-style: none;
            padding: 0;
        }

        .dropdown-menu li .dropdown-item {
            color: gray;
            font-size: 1em;
            padding: 0.5em 1em;
        }

        .dropdown-menu li .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .dropdown-menu li:first-child a {
            font-weight: bold;
            font-size: 1.1em;
            text-transform: uppercase;
            color: #516beb;
        }

        .dropdown-menu li:first-child a:hover {
            background-color: #f1f1f1;
        }

        @media only screen and (max-width: 992px) {
            .dropdown-menu.show {
                flex-wrap: wrap;
                max-height: 350px;
                overflow-y: scroll;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1140px) {
            .dropdown:hover .dropdown-menu {
                width: 40vw;
                flex-wrap: wrap;
            }
        }

        .dropdown-menu {
            border-radius: 0;
            border: none;
            padding: 0.5em;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .dropdown-menu ul {
            list-style: none;
            padding: 0;
        }

        .dropdown-menu li a {
            color: gray;
            padding: 0.5em 1em;
        }

        .dropdown-menu li:first-child a {
            font-weight: bold;
            font-size: 1.1em;
            color: #516beb;
        }

        @media screen and (min-width: 993px) {
            .dropdown:hover .dropdown-menu {
                display: flex;
            }

            .dropdown-menu.show {
                display: flex;
            }
        }

        @media screen and (max-width: 992px) {
            .dropdown-menu.show {
                max-height: 60vh;
                overflow-y: scroll;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg  p-3" style="border-radius: 20px; background-color: #1F2937;">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link mx-2 active text-light" aria-current="page"
                                href="{{ route('dashboard') }}"><b>Home</b></a>
                        </li>
                        @can('control-panel')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <b>Control Panel</b>
                                </a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a class="dropdown-item  text-dark" href="{{ url('users') }}">Admins</a></li>
                                    </ul>
                                    <ul>
                                        <li><a class="dropdown-item  text-dark" href="{{ route('userIndex') }}">Users</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><a class="dropdown-item text-dark" href="{{ url('roles') }}">Roles</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle text-light" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <b>{{ auth()->user()->name }}</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <div class="container mt-2 d-flex justify-content-center">
                                    <form method="POST" class="w-100" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-dark w-100" type="submit"> Logout</button>
                                    </form>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')

    {{-- لجعل اول حرف في اسم الصفحه capital --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let userNameElement = document.querySelector('.navbar-brand');
            if (userNameElement) {
                let userName = userNameElement.textContent;
                userName = userName.charAt(0).toUpperCase() + userName.slice(1);
                userNameElement.textContent = userName;
            }
        });
    </script>

    <script src="\js\jquery-3.7.0.min.js"></script>
    <script src="js\popper.min.js"></script>
    <script src="\js\bootstrap.bundle.min.js"></script>
</body>

</html>
