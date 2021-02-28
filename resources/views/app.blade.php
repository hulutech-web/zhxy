<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="/js/app.js" defer></script>
        <link rel="stylesheet" href="/css/app.css">
        <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
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
