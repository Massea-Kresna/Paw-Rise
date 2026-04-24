<!DOCTYPE html>
<html>
<head>
    <title>PawRise</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #a8d8ea, #fff8ec);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 20px;
        }

        .btn-main {
            background: #ffd166;
            border: none;
        }
    </style>
</head>

<body>

@include('components.navbar')

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>