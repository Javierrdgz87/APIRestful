<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
            <div class="rs-background-video-layer defaultvid HasListener" data-forcerewind="on" data-volume="mute" data-videowidth="100%" data-videoheight="100%" data-videomp4="demos/spa/images/videos/spa.webm" data-videopreload="preload" data-videoloop="true" data-forcecover="1" data-aspectratio="16:9" data-autoplay="true" data-autoplayonlyfirsttime="false" data-nextslideatend="true" style="z-index: 30; left: -1350px; top: 0px; transform: matrix(1, 0, 0, 1, 0, 0); visibility: hidden; opacity: 0;">
                <div class="html5vid fullcoveredvideo" style="position:relative;top:0px;left:0px;width:100%;height:100%; overflow:hidden;">
                    <video style="object-fit: cover; background-size: cover; width: 100%; height: 190.179%; visibility: inherit; opacity: 1; position: absolute; left: 0px; top: -45.0893%; display: block;" class="resizelistener" preload="preload">
                        <source src="demos/spa/images/videos/spa.webm" type="video/mp4">
                    </video>
                </div>
                <div class="tp-video-play-button">
                    <i class="revicon-right-dir"></i>
                    <span class="tp-revstop">&nbsp;</span>
                </div>
                <div class="rs-fullvideo-cover"></div>
            </div>
        </div>
    </body>
</html>
