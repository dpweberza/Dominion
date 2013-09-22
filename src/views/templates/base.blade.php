<!DOCTYPE html>
<html>
    <head>
        <title>{{Config::get('dominion::title')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{URL::asset('packages/david-weber/dominion/assets/css/bootstrap.min.css')}}" rel="stylesheet"></link>
        <link href="{{URL::asset('packages/david-weber/dominion/assets/css/bootstrap-theme.min.css')}}" rel="stylesheet"></link>
        <link href="{{URL::asset('packages/david-weber/dominion/assets/css/admin.css')}}" rel="stylesheet"></link>
        <link href="{{URL::asset('packages/david-weber/dominion/assets/img/favicon.ico')}}" rel="icon" type="image/x-icon"></link>
    </head>
    <body>
        <div id="wrap">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ action('DavidWeber\Dominion\Controllers\AdminController@getIndex')}}">@if (Config::get('dominion::logo')) <img src="{{URL::asset(Config::get('dominion::logo'))}}" /> @endif  {{Config::get('dominion::title')}}</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        @yield('navigation')
                    </div>
                </div>
            </nav>
            <div class="container">
                @yield('content')
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <p class="text-muted pull-right">{{Config::get('dominion::footer')}}</p>
            </div>
        </div>
        <script src="{{URL::asset('packages/david-weber/dominion/assets/js/jquery-1.10.2.min.js')}}"></script>
        <script src="{{URL::asset('packages/david-weber/dominion/assets/js/bootstrap.min.js')}}"></script>
    </body>
</html>