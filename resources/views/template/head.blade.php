<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')" />
    <meta name="robots" content="@yield('robots')" />
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/assets/images/favicon.png')}} "/>
    <!-- Custom CSS -->
    <link href="{{asset('assets/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet" type="text/css" />

    
    <link href="{{asset('assets/assets/libs/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('assets/assets/libs/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/assets/libs/quill/dist/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
  </head>