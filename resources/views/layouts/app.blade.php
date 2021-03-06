<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   {{--  <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon"/> --}}
   <style type="text/css" rel="stylesheet">
      .datepicker {
      z-index: 1600 !important; /* has to be larger than 1050 */
    }
   
   </style>
    <link rel="shortcut icon" href="{{URL::asset('/images/favicon.ico')}}" type="image/x-icon"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Bootstrap Docs -->
      <link href="http://getbootstrap.com/docs-assets/css/docs.css" rel="stylesheet" media="screen">
      

      <!-- Bootstrap Admin Theme -->
      <link rel="stylesheet" media="screen" href="{{asset('template/css/bootstrap-admin-theme.css')}}">
      <link rel="stylesheet" media="screen" href="{{asset('template/css/bootstrap-admin-theme-change-size.css')}}">
      
      <!-- FontAwesome 4.3.0 -->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <!-- Ionicons 2.0.0 -->
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" /> 

      <!-- Styles -->
      <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link href="{{asset('css/override.css')}}" rel="stylesheet">

      <!-- Datables Style -->
      <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
       

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

      <!-- Datable Script -->
      <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>

      <!-- Scripts -->
      <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
       <!-- Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites-->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js' type='text/javascript'></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

        <style type="text/css">
          img.center{
                position: absolute;
                top: 0; bottom:0; left: 0; right:0;
                margin: auto;
            }
        </style>
        
    </head>
    <body>
        <div>
            @yield('nav-bar')
            <div class="col-sm-12">
                <div class="col-sm-2">
                    @yield('side-bar')
                </div>
                <div class="col-sm-10">
                    @yield('content')
                </div>
            </div>
            <div>
                @yield('footer')
            </div>
        </div>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
        <script type="text/javascript">
          //if browser doesn't support date then use jquery UI called datepicker
$(function(){           
        if (!Modernizr.inputtypes.date) {
        // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'yy-mm-dd',
                    autoclose: true,
                },
                // Localization
                $.datepicker.regional['it']
            );
           
        }
    });
        </script>
        <style type="text/css">
a.test {
font-size: 20px;
color: red;
}
</style>
    </body>
    </html>
