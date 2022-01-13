<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Tasker</title>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
            rel="stylesheet"
        />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <script src="{{ mix('../js/app.js') }}" defer></script>
        <script
            src="https://kit.fontawesome.com/056f419e6a.js"
            crossorigin="anonymous"
        ></script>
    </head>

<style>
    body {
        margin: 0 !important;
        padding: 0;
    }

    #app {
        background-color: #122333;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }
</style>

    <body>
        <div id="app"></div>
    </body>
</html>
