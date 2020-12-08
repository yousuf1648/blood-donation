@extends('frontend.layouts.master')

@section('title')
    {{ $website->title }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    {{-- datepicker --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    {{-- timepicker --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/timepicker.min.css') }}">

    <style>
        .input-field{
            position: relative;
            display: block;
            width: 100%;
            line-height: 34px;
            padding: 8px 20px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            height: 52px;
        }
    </style>
@endsection

@section('front-content')
    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>রক্তদাতা হিসেবে নিবন্ধন</h2>
                    <ul class="breadcumb">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>নিবন্ধন</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding donation-section">
    	<div class="container">
            <div class="donation-form-outer">
                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                @php
                    session()->flush();
                @endphp
                <hr>
                <div class="form-portlet">
                    <h3 class="title">রক্তদাতাদের জন্য কিছু সতর্কবার্তা</h3>
                    <ul>
                      <li><p>রোগীর ব্যাপারে বিস্তারিত জেনে রক্তদানে আগ্রহ প্রকাশ করুন এবং রোগী দেখে নিশ্চিত হয়ে রক্ত দিন।</p></li>
                      <li><p>রক্তদানের পূর্বে রোগীর নিকট উপস্থিত আত্মীয়ের সাথে কথা বলে জানিয়ে দিন যে আপনি স্বেচ্ছায় এবং বিনামূল্যে রক্তদান করছেন।</p></li>
                      <li><p>আপনি যদি আপনার পরিচয় প্রকাশ করতে না চান ( অ্যাডমিন ব্যতীত ) তাহলে আমাদের ই-মেইল করে জানান। ই-মেইল ঠিকানা: [email protected]</p></li>
                      <li><p>ফেসবুকে বা মোবাইলে হয়রানির শিকার হলে ডাক ও টেলিযোগাযোগ বিভাগে অভিযোগ করুন। অভিযোগ করতে http://grs.ptd.gov.bd/ লিংকে গিয়ে অভিযোগ দাখিল করুন।</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    {{-- datepicker --}}
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    {{-- timepicker --}}
    <script src="{{ asset('frontend/js/timepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        $(document).ready(function(){
            $('input.timepicker').timepicker({});
        });

        $('.timepicker').timepicker({
            // timeFormat: 'h:mm p',
            // interval: 60,
            // minTime: '10',
            // maxTime: '6:00pm',
            // defaultTime: '1',
            // startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endsection
