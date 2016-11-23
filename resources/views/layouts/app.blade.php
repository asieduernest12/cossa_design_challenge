<!-- <!DOCTYPE html> -->
<html lang="en" ng-app='cossa_dc' ng-controller='entriesCtrl'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cossa Design Challenge</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" media="screen" title="no title">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" media="screen" title="no title">

    <link rel="stylesheet" href="{{asset('sweet-alert/sweet-alert.min.css')}}" media="screen" title="no title">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" media="screen" title="no title">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="fa fa-arrow-down"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Cossa Design Challenge
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                            <li><a onclick="$('#verifyVoterModal').modal('show')"><i class="fa fa-btn fa-thumb"></i>Cast Vote</a></li>
                            <li><a onclick='$("#submitEntryModal").modal("show")'>Submit a design</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="row">
      <!-- technologies -->
      <center>
        <img src="https://gauravbehere.files.wordpress.com/2014/11/angularlogo-300x300.png?w=300&h=300&crop=1" class='col-md-4 col-xs-4 img img-responsive' alt="" />
        <img src="http://smileyhappycoder.co.uk/wp-content/uploads/2014/12/laravel-logo-300x300.png" class='col-md-4 col-xs-4 img img-responsive' alt="" />
        <img src="http://www.webandcow.com/img/photos/bootstrap_illustration.png" class='col-md-4 col-xs-4 img img-responsive' alt="" />
      </center>
    </div>

    <footer class="footer container-fluid" >
				<div class="navbar navbar-static-bottom navbar-default"><span><center style="color: black;font-family: arieal;font-size: 2.1em;" ><a href="mailto:asieduernest@yahoo.co.uk">Asare-Asiedu Ernest</a> [ IcaSoft ] [<a href="http://bluspark-it.com">"BluSpark-it"></a>]</center></span></div>
			</footer>

    <!-- JavaScripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- sweet alerts -->
    <script src="{{asset('sweet-alert/sweet-alert.init.js')}}" charset="utf-8"></script>
    <script src="{{asset('sweet-alert/sweet-alert.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}" charset="utf-8"></script>


    <script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular-ui-router.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/angular-resource.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80880344-3', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
