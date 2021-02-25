<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js" defer></script>
        <script>
            window.user =@json(Auth::user()??[],JSON_FORCE_OBJECT)
        </script>
        <title>智慧校园</title>
    </head>

    <body>
        <div id="app">

        </div>
    </body>

</html>
