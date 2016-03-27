<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ getenv('SITE_NAME') }}</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('backend/js/plugins/select2/select2.min.css') }}">


    <link href="{{ URL::asset('backend/css/production.css') }}" rel="stylesheet" type="text/css" />

    <!-- All css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/css/_all-skins.css') }}">

    <!-- Morris css -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/morris/morris.css') }}">

    <link href="{{ URL::asset('backend/custom/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @if (App::environment('production'))

    <!-- Google webmaster tools / search console starts here -->
    <meta name="google-site-verification" content="{{ getenv('SEARCH_CONSOLE_META_KEY') }}" />
    <!-- Google webmaster tools / search console ends here -->

    <!-- Google Tag Manager -->

    <noscript><iframe src="//www.googletagmanager.com/ns.html?id='{{ getenv('TAG_MANAGER_ID') }}'"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ getenv('TAG_MANAGER_ID') }}');
    </script>

    <!-- End Google Tag Manager -->


    @endif

</head>

<body class="{{ getenv('BODY_CLASS') }} @if(Request::segment(1) == 'login'){{'login-bg'}} @endif">

    <div class="wrapper">

        @yield('template')

    </div><!-- ./wrapper -->

</body>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ URL::asset('backend/js/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<!-- Production JS -->
<script src="{{ URL::asset('backend/js/production.js') }}" type="text/javascript"></script>


<!-- Select2 -->
<script src="{{ URL::asset('backend/js/plugins/select2/select2.full.min.js') }}"></script>

<script src="{{ URL::asset('backend/js/plugins/angular/angular.min.js') }}" type="text/javascript"></script>

<script src="{{ URL::asset('backend/js/plugins/smart-table/smart-table.min.js') }}" type="text/javascript"></script>

<script src="{{ URL::asset('backend/js/plugins/multi-select/multi-select.min.js') }}" type="text/javascript"></script>

<script src="{{ URL::asset('backend/custom/script.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->

@if (App::environment('production'))

    <!-- Google Analytics ends here -->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ getenv('ANALYTICS_TRACKING_KEY') }}', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- Google Analytics ends here -->

@endif

@yield('extra_scripts')

</html>
