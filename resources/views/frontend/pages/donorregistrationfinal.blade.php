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
                <form action="{{ route('donor.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <!--Form Portlet-->
                    <div class="form-portlet">

                        <div class="clearfix">

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার ওজন কত? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="ওজন...." readonly value="{{ Session::get('weight') }}" name="weight">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার বয়স? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="বয়স...." readonly value="{{ Session::get('age') }}" name="age">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার উচ্চতা কত? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="উচ্চতা...." readonly value="{{ Session::get('height') }}" name="height">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার নিচের কান রাগ আেছ? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="উচ্চতা...." readonly value="{{ Session::get('disease') }}" name="disease">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">ধূমপায়ী <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="উচ্চতা...." readonly value="{{ Session::get('smoker') }}" name="smoker">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">বৈবাহিক অবস্থা? <span class="required">*</span></div>
                                    <input  class="form-control" type="text" required="" placeholder="উচ্চতা...." readonly value="{{ Session::get('marital_status') }}" name="marital_status">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <h2 class="text-thm text-center">আপনার সম্পর্কে জানা প্রয়োজন</h2>
							<hr>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">পুর্ন নামঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" placeholder="আপনার পুর্ন নাম..." name="name">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার পুর্ন নাম দিন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">রক্তের গ্রুপঃ <span class="required">*</span></div>
                                    <select class="form-control js-example-basic-single" name="blood_group">
                                        @php
                                            $bloods = DB::table('bloods')->get();
                                        @endphp
                                        <option value="" selected>--- নির্বাচন করুন ---</option>
                                        @foreach ($bloods as $key=>$blood)
                                            <option value="{{ $blood->blood_name }}">{{ $blood->blood_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('blood_group'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            রক্তের গ্রুপ নির্বাচন করুন।
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                    <div class="field-label">জন্ম তারিখঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" id="datepicker" placeholder="জন্ম তারিখ (dd/mm/yyyy)" value="" name="birthday">
                                    @if ($errors->has('birthday'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার জন্ম তারিখ দিন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                    <div class="field-label">লিঙ্গঃ <span class="required">*</span></div>
                                    <select class="form-control js-example-basic-single" name="gender">
                                        <option value="" selected>--- নির্বাচন করুন ---</option>
                                        <option>পুরুষ</option>
                                        <option>মহিলা</option>
                                        <option>অন্নান্য</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার লিঙ্গ নির্বাচন করুন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                    <div class="field-label">শেষ কবে রক্ত দিয়েছেনঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" type="text" name="last_donate" id="datepickers" placeholder="শেষ কবে রক্ত দিয়েছেন (dd/mm/yyyy)">
                                    @if ($errors->has('last_donate'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            শেষ কবে রক্ত দিয়েছেন তা বলুন।
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="clearfix">
                            <h2 class="text-thm text-center">আপনার সাথে যোগাযোগের জন্য তথ্য</h2>
							<hr>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার মোবাইল নংঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" placeholder="মোবাইল নং..." value="" name="first_mobile">
                                    @if ($errors->has('first_mobile'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার মোবাইল নং দিন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">আপনার অন্য মোবাইল নংঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" placeholder="অন্য মোবাইল নং..." name="second_mobile">
                                    @if ($errors->has('second_mobile'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার অন্য মোবাইল নং দিন।
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                    <div class="field-label">থানা <span class="required">*</span></div>
                                    <select class="form-control js-example-basic-single"  id="thana_id" name="thana">
                                        @php
                                            $thanas = DB::table('thanas')->get();
                                        @endphp
                                        <option value="" selected>--- নির্বাচন করুন ---</option>
                                        @foreach ($thanas as $key=>$thana)
                                            <option value="{{ $thana->id }}">{{ $thana->thana_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('thana'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            থানা নির্বাচন করুন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                    <div class="field-label">পোষ্ট কোডঃ <span class="required">*</span></div>
                                  <select class="form-control js-example-basic-single"  name="post_code"  id="postcode">
                                    <option value="" selected>--- নির্বাচন করুন ---</option>
                                  </select>
                                  @if ($errors->has('post_code'))
                                      <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        পোষ্ট কোড নির্বাচন করুন।
                                      </div>
                                  @endif
                                </div>

                                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                    <div class="field-label">এরিয়াঃ <span class="required">*</span></div>
                                    <select class="form-control js-example-basic-single"  name="area" id="area">
                                        <option value="" selected>--- নির্বাচন করুন ---</option>
                                    </select>
                                    @if ($errors->has('area'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            এরিয়া  নির্বাচন করুন।
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                    <div class="field-label">আপনার বর্তমান ঠিকানাঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" name="present_address" placeholder="বর্তমান ঠিকানা...">
                                    @if ($errors->has('present_address'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার বর্তমান ঠিকানা দিন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                    <div class="field-label">আপনার স্থায়ী ঠিকানাঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" name="permanent_address" placeholder="স্থায়ী ঠিকানাং...">
                                    @if ($errors->has('permanent_address'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            আপনার স্থায়ী ঠিকানা দিন।
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="clearfix">
                            <h2 class="text-thm text-center">আপনার সম্পর্কে জানা প্রয়োজন</h2>
                            <hr>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">ইউজারনেমঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="text" placeholder="ইউজারনেম..." name="username">
                                    @if ($errors->has('username'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            ইউজারনেম দিন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">ই-মাইলঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="email" placeholder="ই-মাইল..." name="email">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            ই-মেইল দিন।
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">পাসওয়ার্ডঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="password" placeholder="পাসওয়ার্ড..." name="password">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            পাসওয়ার্ড দিন।
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">কনফার্ম পাসওয়ার্ডঃ <span class="required">*</span></div>
                                    <input  class="form-control" type="password" placeholder="কনফার্ম পাসওয়ার্ড..." name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            কনফার্ম পাসওয়ার্ড দিন।
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                    <div class="field-label">ছবিঃ <span class="required">*</span></div>
                                    <input  class="form-control input-field" type="file" name="image">
                                    @if ($errors->has('image'))
                                        <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                            ছবি নির্বাচন করুন।
                                        </div>
                                    @endif
                                </div>
                            </div>

		                    <div class="text-center">
                                <button class="thm-btn mt_30 mb_30" type="submit">সাবমিট</button>
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

        // date picker
        $(function () {
	        $('#datepickers').datepicker({
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


        // For post code-------------------------
        $(document).ready(function () {
            $('#thana_id').on('change',function(e) {
                var thana_id = e.target.value;

                // console.log(thana_id);
                $.ajax({
                    url:"{{ route('donor.postcode') }}",
                    type:"POST",
                    data: {
                        thana_id: thana_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success:function (data) {
                        $('#postcode').html(data.html);
                    }
                })
            });
        });

        // For area-----------------
        $(document).ready(function () {
            $('#thana_id').on('change',function(e) {
                var thana_id = e.target.value;
                console.log(thana_id);
                $.ajax({
                    url:"{{ route('donor.area') }}",
                    type:"POST",
                    data: {
                        thana_id: thana_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success:function (data) {
                        $('#area').html(data.html);
                    }
                })
            });
        });
    </script>
@endsection

