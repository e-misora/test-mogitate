<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <header class="header">
        <h1 class="header__logo">mogitate</h1>
    </header>
    <main>
        <div class="content">
        @yield('content')
        </div>
    </main>
</body>
</html>