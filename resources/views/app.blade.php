<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body { padding: 4rem }
        .mt-2 { margin-top: 2rem; }
    </style>
    <title>@yield('title')</title>
</head>
<body>
    <h1>@yield('heading')</h1>

    @yield('content')
</body>
</html>