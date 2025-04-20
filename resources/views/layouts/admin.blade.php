<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    
    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            width: 220px;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #ccc;
        }

        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        .navbar {
            margin-left: 220px;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column p-3 text-white">
        <h4 class="text-center text-white mb-4"><a href="{{route('home')}}" class="text-light" target="_blank">Vortex75</a></h4>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.actualites.index') }}" class="nav-link {{ request()->is('admin/actualites*') ? 'active' : '' }}">
                    📝 Articles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.ressources.index') }}" class="nav-link {{ request()->is('admin/ressources*') ? 'active' : '' }}">
                    📚 Ressources
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                    📂 Catégories
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/utisateurs*') ? 'active' : '' }}">
                    👤 Utilisateurs
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    🚪 Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">@yield('title', 'Administration')</span>
        </div>
    </nav>

    {{-- Contenu principal --}}
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#contenu'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
