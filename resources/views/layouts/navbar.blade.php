<!-- resources/views/layouts/navbar.blade.php -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Absensi</title>
</head>
<body>
    <nav>
        <a href="{{ route('absen.create') }}">ABSEN</a> |
        <a href="{{ route('user.index') }}">USER</a> |
        <a href="{{ route('absen.index') }}">LAPORAN</a>
    </nav>
    <hr>
    <div>
        @yield('content')
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Absensi</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
        }

        nav {
            background-color: #1f2937;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }

        nav a {
            color: #f9fafb;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #374151;
        }

        .container {
            padding: 20px;
        }

        h2 {
            color: #1f2937;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('absen.create') }}">ABSEN</a>
        <a href="{{ route('user.index') }}">USER</a>
        <a href="{{ route('absen.index') }}">LAPORAN</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
