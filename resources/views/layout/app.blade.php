<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Produk')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #183b56;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: .5px;
        }

        .nav-link {
            color: white !important;
            margin-left: 15px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .table {
            vertical-align: middle;
        }

        .btn {
            border-radius: 7px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('produk.index') }}">
                Products
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('produk.index') }}">
                        Products
                    </a>

                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        Categories
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                {{ session('success') }}

                <button type="button" class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>