<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <title>@yield('title') - User managment system </title>

        <link rel="manifest" href="/manifest.json">

        <script src="https://kit.fontawesome.com/c659fa2e47.js" crossorigin="anonymous" defer></script>
    </head>

    <body class="min-h-screen w-screen bg-blue-100">

        <header class="pt-4 max-w-screen">
            @include('partials.nav')
        </header>

        @yield('content')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    </body>

</html>