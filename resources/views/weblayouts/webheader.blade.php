<html>
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the description -->
	<meta name="description" content="STUDYLMS HTML Template">
	<!-- set the Keyword -->
	<meta name="keywords" content="">
	<meta name="author" content="STUDYLMS HTML Template">
	<!-- set the page title -->
	<title>STUDYLMS HTML Template</title>

	<!-- include google roboto font cdn link -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('css/plugins.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('css/colors.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{asset('js/style.css')}}">
	<!-- include the site responsive stylesheet -->
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
	@if(app()->getLocale() == 'ar')
	<link rel="stylesheet" href="{{asset('css/frontrtl/arabic.css')}}">
	@else
	<link rel="stylesheet" href="{{asset('css/frontrtl/english.css')}}">
	@endif
	<link rel="stylesheet" href="{{asset('js/build/intlTelInput.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
	<style>
		ul.nav.navbar-nav.navbar-right.main-navigation.text-uppercase.font-lato li a {
          color: #fff !important;
    }
	.main-navigation .dropdown-menu, .main-navigation.nav .dropdown-menu, .main-navigation.navbar-nav .dropdown-menu, .main-navigation.navbar-right .dropdown-menu{
		background-color: #000;
	}
	.header-holder{
		background-color:rgba(0,0,0,0.2);
	}

	</style>
</head>
<body>
	