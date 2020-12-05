<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hasan.themexlab.com/new/lillah-fund-html/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Nov 2020 04:48:05 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title> @yield('title', 'Blood Donate') </title>
	<link rel="icon" type="image/png" sizes="33x32" href="{{ URL::to($website->favicon) }}">
	<meta name="theme-color" content="#ffffff">

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@include('frontend.layouts.partials.styles')

    @yield('css')


</head>
<body class="page-wrapper">


	{{-- topbar --}}
    @include('frontend.layouts.partials.topbar')

	{{-- header --}}
    @include('frontend.layouts.partials.header')


	{{-- Menu --}}
    @include('frontend.layouts.partials.menu')

    {{-- main content --}}
    @yield('front-content')

    @include('frontend.layouts.partials.donorcounter')

    @include('frontend.layouts.partials.footer')

	<!--Scroll to top-->
	<div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>


	{{-- Script Area Start --}}
    @include('frontend.layouts.partials.scripts')

    @yield('js')

</body>

<!-- Mirrored from hasan.themexlab.com/new/lillah-fund-html/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Nov 2020 04:51:22 GMT -->
</html>
