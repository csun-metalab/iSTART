<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="idle-timeout" content="{{ env('IDLE_TIMEOUT') }}">
        <meta name="days-to-release" content="{{ env('DAYS_TO_RELEASE') }}">
        <meta name="slide-wait-time" content="{{ env('SLIDE_WAIT_TIME_IN_SECONDS') }}">
        <meta name="app-url" content="{{ url('/') }}">

        <title>iSTART</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ url('/').mix('css/app.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}">
    </head>
    <body>
        <div id="app">
            <v-App></v-App>
        </div>
        <script src="{{ url('/').mix('js/main.js') }}"></script>
    </body>
</html>
