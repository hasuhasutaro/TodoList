<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name") }}</title>
</head>
<body>
    <header>
        <div class="container">
            <a href="/todos">{{ config("app.name") }}</a>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>