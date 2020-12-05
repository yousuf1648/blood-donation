@extends('frontend.layouts.master')

@section('title')
    {{ $website->title }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/datepicker.css') }}">

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
    		<h2 class="text-thm text-center">নিবন্ধন ফর্ম</h2>
    		<hr>
        	<div class="donation-form-outer">
                <form action="{{ route('donor.beforeregistration') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <!--Form Portlet-->
                    <div class="form-portlet">

                        <div class="clearfix">

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার ওজন কত? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="ওজন...." value="" name="weight">
                                    @if ($errors->has('weight'))
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            Please enter your valid weight (51kg - 90kg).
                                        </div>
                                    @else
                                        <small id="" class="form-text text-muted">Weight should be 51kg to 90kg.</small>
                                    @endif
                                    @isset($valid_weight)
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            {{ $valid_weight }}
                                        </div>
                                    @endisset
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার বয়স? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="বয়স...." value="" name="age">
                                    @if ($errors->has('age'))
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            Please enter your valid age (18-40 years.).
                                        </div>
                                    @else
                                        <small id="" class="form-text text-muted">Age should be 18 to 40 years.</small>
                                    @endif
                                    @isset($valid_weight)
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            {{ $valid_weight }}
                                        </div>
                                    @endisset
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার উচ্চতা কত? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="উচ্চতা...." value="" name="height">
                                    @if ($errors->has('height'))
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            Height is erquired.
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার নিচের কান রাগ আেছ? <span class="required">*</span></div>
                                    <select  class="form-control js-example-basic-single" name="disease">
                                        <option value="">--- নির্বাচন করুন ---</option>
                                        <option class="form-control">এলার্জি/এজমা</option>
                                        <option>ক্যান্সার</option>
                                        <option>ডায়াবেটিকস</option>
                                        <option>সিফিলিস/গনোরিয়া/এইডস</option>
                                    </select>
                                    @if ($errors->has('disease'))
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            If you have any disease of these then you don't allow to register.
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">ধূমপায়ী <span class="required">*</span></div>
                                    <select class="form-control js-example-basic-single" name="smoker">
                                        <option value="">--- নির্বাচন করুন ---</option>
                                        <option>না</option>
                                        <option>হ্যাঁ</option>
                                    </select>
                                    @if ($errors->has('smoker'))
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            Height is erquired.
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">বৈবাহিক অবস্থা? <span class="required">*</span></div>
                                    <select class="form-contro js-example-basic-single" style="width: 100%;" name="marital_status">
                                        <option value="">--- নির্বাচন করুন ---</option>
                                        <option>বিবািহতা</option>
                                        <option>অবিবাহিত</option>
                                        <option>ডিভোর্স</option>
                                        <option>জানাতে চাই না</option>
                                    </select>
                                    @if ($errors->has('marital_status'))
                                        <div class="invalid-feedback" style="display: block !important; color:red;">
                                            Height is erquired.
                                        </div>
                                    @endif
                                </div>
                            </div>
		                    <hr>

		                    <div class="text-center">
                                <button class="thm-btn mt_30 mb_30" type="submit">পরবর্তি স্টেপ</button>
                                {{-- <a href="registerfinal.html" type="button" class="thm-btn mt_30 mb_30">পরবর্তি স্টেপ</a> --}}
                            </div>

                        </div>
                    </div>
                    <hr>
                    <!--Form Portlet-->
                    <div class="form-portlet">
                        <h3 class="title">রক্তদাতাদের জন্য কিছু সতর্কবার্তা</h3>
                        <ul>
                            <li><p>রোগীর ব্যাপারে বিস্তারিত জেনে রক্তদানে আগ্রহ প্রকাশ করুন এবং রোগী দেখে নিশ্চিত হয়ে রক্ত দিন।</p></li>
                            <li><p>রক্তদানের পূর্বে রোগীর নিকট উপস্থিত আত্মীয়ের সাথে কথা বলে জানিয়ে দিন যে আপনি স্বেচ্ছায় এবং বিনামূল্যে রক্তদান করছেন।</p></li>
                            <li><p>আপনি যদি আপনার পরিচয় প্রকাশ করতে না চান ( অ্যাডমিন ব্যতীত ) তাহলে আমাদের ই-মেইল করে জানান। ই-মেইল ঠিকানা: [email protected]</p></li>
                            <li><p>ফেসবুকে বা মোবাইলে হয়রানির শিকার হলে ডাক ও টেলিযোগাযোগ বিভাগে অভিযোগ করুন। অভিযোগ করতে http://grs.ptd.gov.bd/ লিংকে গিয়ে অভিযোগ দাখিল করুন।</p></li>
                        </ul>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });


        // date picker
        $(function () {
	        $('#datepicker').datepicker({
	            format: "dd/mm/yyyy",
	            autoclose: true,
	            todayHighlight: true,
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        autoclose: true,
		        changeMonth: true,
		        changeYear: true,
		        orientation: "button"
	        });
	    });
    </script>
@endsection
