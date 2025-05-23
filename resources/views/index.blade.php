<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="cache-version" value="1.4.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{mix('/css/app.css')}}" rel="stylesheet">
        <link href="{{mix('/css/all.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="icon" type="image/png" href="{{asset('/images/favico.ico')}}">
    </head>
	<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Assistant', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
	</style>
    <body>
        <div id="app">
        </div>
    </body>
    <script src="{{mix('/js/app.js')}}" type="text/javascript"></script>
    @if (env('APP_ENV') === 'production')
    <script type="text/javascript" src="https://tc.akvo.org/analytics/analytics-left.js"></script>
    <noscript><iframe src="//analytics.akvo.org/containers/f6fdd448-a2bc-4734-8aa0-dba4d0d0f2a3/noscript.html" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    </noscript>
</html>

