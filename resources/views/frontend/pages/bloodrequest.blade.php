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
                    <h2>রক্ত চেয়ে আবেদনা</h2>
                    <ul class="breadcumb">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>রক্ত প্রয়োজন</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding donation-section">
    	<div class="container">
            <div class="donation-form-outer">
                <form action="{{ route('blood.request.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-portlet">
                        <div class="row clearfix">
                            @isset($message)
                                    <h4 class="text-success text-center">{{ $message }}</h4>
                            @endisset
                            @isset($senderror)
                                <h4 class="text-thm text-center">{{ $senderror }}</h4>
                            @endisset
                            @isset($imgerror)
                                    <h4 class="text-thm text-center">{{ $imgerror }}</h4>
                            @endisset
                            <h2 class="text-thm text-center">রক্তের প্রয়োজন হলে যোগাযোগের তথ্য দিয়ে পোস্ট করুন।</h2>
                            <hr>
                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">রোগীর নামঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="রোগীর নাম..." value="" name="patient_name">
                                @if ($errors->has('patient_name'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        রোগীর নাম দিন।
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">রোগীর বয়সঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="রোগীর বয়স..." value="" name="patient_age">
                                @if ($errors->has('patient_age'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        রোগীর বয়স দিন।
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                <div class="field-label">রোগীর লিঙ্গঃ <span class="required">*</span></div>
                                <select class="form-control js-example-basic-single" data-live-search="true" name="patient_gender">
                                    <option value="" selected>--- নির্বাচন করুন ---</option>
                                    <option value="পুরুষ">পুরুষ</option>
                                    <option value="মহিলা">মহিলা</option>
                                    <option value="অন্নান্য">অন্নান্য</option>
                                </select>
                                @if ($errors->has('patient_gender'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        রোগীর লিঙ্গ নির্বাচন করুন।
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                <div class="field-label">রক্তের গ্রুপঃ <span class="required">*</span></div>
                                <select class="form-control js-example-basic-single input-field" data-live-search="true" name="blood_group">
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

                            <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                <div class="field-label">যত ব্যাগ লাগবেঃ <span class="required">*</span></div>
                                <input  class="form-control input-field" type="number" placeholder="কত ব্যাগ রক্ত লাগবে?" value="1" name="blood_bag">
                                @if ($errors->has('blood_bag'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        যত ব্যাগ লাগবে তা বলুন।
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">হাস্পাতালের নামঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="হাসপাতালের নাম" value="" name="hospital_name">
                                @if ($errors->has('hospital_name'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        হাস্পাতালের নাম বলুন।
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">হাস্পাতালের ঠিকানাঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="হাসপাতালের ঠিকানা" value="" name="hospital_address">
                                @if ($errors->has('hospital_address'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        হাস্পাতালের ঠিকানা বলুন।
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                <div class="field-label">এরিয়াঃ <span class="required">*</span></div>
                              <select class=" js-example-basic-single" name="hospital_area">
                                  <option value="" selected>--- নির্বাচন করুন ---</option>
                                    @foreach ($areas as $key=>$area)
                                        <option value="{{ $area->area_name }}">{{ $area->area_name }}</option>
                                    @endforeach
                              </select>
                              @if ($errors->has('hospital_area'))
                                  <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                      কোন এরিয়াতে রক্ত লাগবে তা বলুন।
                                  </div>
                              @endif
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                <div class="field-label">রক্ত লাগার তারিখঃ <span class="required">*</span></div>
                                <input type="text" class="form-control" name="blood_needed_date" id="datepicker" placeholder="dd/mm/yyyy">
                                @if ($errors->has('blood_needed_date'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        রক্ত লাগার তারিখ বলুন!
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-xs-12">
                                <div class="field-label">রক্ত লাগার সময়ঃ <span class="required">*</span></div>
                                <input  class="form-control input-field timepicker" type="text" placeholder="রক্ত লাগার সময়" value="" name="blood_needed_time">
                                @if ($errors->has('blood_needed_time'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        কখন রক্ত লাগবে তা বলুন!
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">যার সাথে যোগাযোগ করবেঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="যার সাথে যোগাযোগ করবে" value="" name="patient_relative">
                                @if ($errors->has('patient_relative'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        যার সাথে যোগাযোগ করবে তার নাম বলুন!
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">যোগাযোগের নাম্বারঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="যোগাযোগের নাম্বার" value="" name="patient_relative_contact">
                                @if ($errors->has('patient_relative_contact'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        যোগাযোগের নাম্বার বলুন!
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">যে কারণে রক্তের প্রয়োজনঃ <span class="required">*</span></div>
                                <input  class="form-control" type="text" placeholder="যে কারণে রক্তের প্রয়োজন" value="" name="reason_for_blood">
                                @if ($errors->has('reason_for_blood'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        রক্ত লাগার কারন বলুন!
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                <div class="field-label">ছবি আপলোড করুন (রোগীর/রিপর্ট)ঃ <span class="required">*</span></div>
                                <input  class="form-control input-field" type="file" name="report_image">
                                @if ($errors->has('report_image'))
                                    <div class="invalid-feedback" style="display: block !important; color:red; margin-top:4px;">
                                        ছবি নির্বাচন করুন!
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center"><button class="thm-btn mt_30 mb_30" type="submit">সাবমিট</button></div>

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
