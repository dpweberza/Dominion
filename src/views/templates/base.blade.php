<!DOCTYPE html>
<html>
    <head>
        <title>{{Config::get('dominion::text-title')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{URL::asset(Config::get('dominion::asset-favicon'))}}" rel="icon" type="image/x-icon"></link>
        @foreach(Config::get('dominion::asset-css') as $css)
        <link href="{{URL::asset($css)}}" rel="stylesheet"></link>
        @endforeach
        @if(isset($additionalCss))
            @foreach($additionalCss as $css)
                <link href="{{URL::asset($css)}}" rel="stylesheet"></link>
            @endforeach
        @endif
        @yield('css')
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
                        <a class="navbar-brand" href="{{ action('DavidWeber\Dominion\Controllers\AdminController@getIndex')}}">@if (Config::get('dominion::asset-logo')) <img src="{{URL::asset(Config::get('dominion::asset-logo'))}}" /> @endif  {{Config::get('dominion::text-title')}}</a>
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
                <p class="text-muted pull-right">{{Config::get('dominion::text-footer')}}</p>
            </div>
        </div>
        <script src="{{URL::asset('packages/david-weber/dominion/assets/js/jquery-1.10.2.min.js')}}"></script>
        <script src="{{URL::asset('packages/david-weber/dominion/assets/js/bootstrap.min.js')}}"></script>
        @if(isset($additionalJs))
            @foreach($additionalJs as $js)
                <script src="{{URL::asset($js)}}"></script>
            @endforeach
        @endif
        @yield('script')
    </body>
</html>