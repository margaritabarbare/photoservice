<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/css/foundation.css
<title>Photoservice</title>
    </head>
    <body>
        <div class="row"
                @yield('content')
    </div>
          
    </body>
</html>