<!doctype html>
<html lang='en'>

<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>

    <link href='/css/app.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    @yield('head')

</head>

<body>

    <header>
        <h1><img id='logo' src='/images/two-64.png' alt='Dragon Battle Logo'></h1>
        <div class='title'>
            <h1>DRAGON BATTLE</h1>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    @yield('body')

</body>

</html>