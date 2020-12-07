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
{{-- slider --}}
@include('frontend.layouts.partials.slider')

<section class="welcome-section bg-color-f7 sec-padding77">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="welcome-content">
                    <h2 class="welcome-title">সক্রিয় রক্তদাতা</h2>
                    <p>
                        যেসব রক্তদাতাগণ নিয়মিত রক্ত দিয়ে থাকেন।
                    </p>
                    <a class="thm-btn btn-xs" href="{{ route('blood.donor') }}">সকল রক্তদাতা<i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-9 welcome-projects">
                <div class="row">
                    <div class="col-sm-6 col-md-3 inner">
                        <div class="welcome-project">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/doner/2x2.png') }}" alt="">
                                <div class="overlay">
                                    <a href="#">বিস্তারিত দেখুন</a>
                                </div>
                            </div>
                            <div class="caption">
                                <h4 class="title">মোঃ শাহিন আলম</h4>
                                <p>রক্তের গ্রুপ - বি+</p>
                                <p>০১৭০০-০০০০০</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 inner">
                        <div class="welcome-project">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/doner/2x2.png') }}" alt="">
                                <div class="overlay">
                                    <a href="#">বিস্তারিত দেখুন</a>
                                </div>
                            </div>
                            <div class="caption">
                                <h4 class="title">মোঃ শাহিন আলম</h4>
                                <p>রক্তের গ্রুপ - বি+</p>
                                <p>০১৭০০-০০০০০</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 inner">
                        <div class="welcome-project">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/doner/2x2.png') }}" alt="">
                                <div class="overlay">
                                    <a href="#">বিস্তারিত দেখুন</a>
                                </div>
                            </div>
                            <div class="caption">
                                <h4 class="title">মোঃ শাহিন আলম</h4>
                                <p>রক্তের গ্রুপ - বি+</p>
                                <p>০১৭০০-০০০০০</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 inner">
                        <div class="welcome-project">
                            <div class="thumb">
                                <img src="{{ asset('frontend/img/doner/2x2.png') }}" alt="">
                                <div class="overlay">
                                    <a href="#">বিস্তারিত দেখুন</a>
                                </div>
                            </div>
                            <div class="caption">
                                <h4 class="title">মোঃ শাহিন আলম</h4>
                                <p>রক্তের গ্রুপ - বি+</p>
                                <p>০১৭০০-০০০০০</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-serivce sec-padding bg-pattern bg-color-thm sec-padding74">
    <div class="container">
        <div class="row single-service-style">
            <div class="col-md-6 col-sm-6">
                <div class="single-service-home">
                    <div class="testimonaials-carousel">
                        <div class="item">
                            <div class="single-testimonaials">
                                <h2>বি+ রক্তের প্রয়োজন</h2>
                                <h3>তারিখঃ ১০ জানুয়ারি ২০২০</h3>
                                <p><strong>নামঃ</strong> শাকিল আহমেদ</p>
                                <p><strong>বয়সঃ</strong> ২৫(বছর)</p>
                                <p><strong>ঠিকানাঃ</strong> আদ্দিল হসপিটাল, মগবাজার ঢাকা, খিলগাঁও, ঢাকা</p>
                                <p><strong>যোগাযোগঃ</strong> ০১৭০০-০০০০০০</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-testimonaials">
                                <h2>বি+ রক্তের প্রয়োজন</h2>
                                <h3>তারিখঃ ১০ জানুয়ারি ২০২০</h3>
                                <p><strong>নামঃ</strong> শাকিল আহমেদ</p>
                                <p><strong>বয়সঃ</strong> ২৫(বছর)</p>
                                <p><strong>ঠিকানাঃ</strong> আদ্দিল হসপিটাল, মগবাজার ঢাকা, খিলগাঁও, ঢাকা</p>
                                <p><strong>যোগাযোগঃ</strong> ০১৭০০-০০০০০০</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-testimonaials">
                                <h2>বি+ রক্তের প্রয়োজন</h2>
                                <h3>তারিখঃ ১০ জানুয়ারি ২০২০</h3>
                                <p><strong>নামঃ</strong> শাকিল আহমেদ</p>
                                <p><strong>বয়সঃ</strong> ২৫(বছর)</p>
                                <p><strong>ঠিকানাঃ</strong> আদ্দিল হসপিটাল, মগবাজার ঢাকা, খিলগাঁও, ঢাকা</p>
                                <p><strong>যোগাযোগঃ</strong> ০১৭০০-০০০০০০</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="single-service-home">
                    <div class="content">
                        <h3><i class="flaticon-people-1"></i> রক্তদাতাদের সন্ধান করুন</h3>
                        <form class="appoinment-form" action="">
                            <div class="form-group col-md-offset-2 col-md-8">
                                <div class="select-style">
                                    <select class="form-control js-example-basic-single" name="blood_group" tabindex="-1" aria-hidden="true">
                                        <option value="" selected>রক্তের গ্রুপ নির্বাচন করুন</option>
                                        @php
                                            $bloods = DB::table('bloods')->get();
                                        @endphp
                                        @foreach ($bloods as $key=>$blood)
                                            <option value="{{ $blood->blood_name }}">{{ $blood->blood_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-offset-2 col-md-8">
                                <div class="select-style">
                                    <select class="form-control js-example-basic-single" name="dis_id" tabindex="-1" aria-hidden="true" id="dis_id">
                                        <option value="" selected>রক্তের গ্রুপ নির্বাচন করুন</option>
                                        @php
                                            $districts = DB::table('districts')->get();
                                        @endphp
                                        @foreach ($districts as $key=>$district)
                                            <option value="{{ $district->id }}">{{ $district->dis_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-offset-2 col-md-8">
                                <div class="select-style">
                                    <select class="form-control js-example-basic-single" name="thana_id" id="thana" tabindex="-1" aria-hidden="true">
                                        <option value="">থানা নির্বাচন করুন </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-offset-2 col-md-8">
                                <button type="submit" class="thm-btn">অনুস্নধান করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlay-white sec-padding parallax-section sec-padding89">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 promote-project style-inner text-center">
                <h3>সারা বাংলাদেশ জুড়েই রক্তের প্রয়োজন</h3>
                <div class="sec-title colored text-center">
                    <span class="decor">
                        <span class="inner"></span>
                    </span>
                </div>
                <h2>আপনিও রক্তদাতা হিসেবে যোগ দিন</h2>
                <p>
                    রক্ত কৃত্তিমভাবে তৈরী করা যায় না, শুধুমাত্র একজন মানুষই পারে আরেকজন মানুষকে বাঁচাতে। কিন্তু দুঃখের ব্যাপার, প্রতিবছর বহুসংখ্যক মানুষ মারা যাচ্ছে জরুরি মুহুর্তে প্রয়োজনীয় রক্তের অভাবে। বর্তমানে বাংলাদেশে প্রতি বছর রক্তের প্রয়োজন মাত্র ৯ লাখ ব্যাগ। অথচ জনবহুল এই দেশে এখনো মানুষ মারা যাচ্ছে রক্তের অভাবে। রক্তের এই চাহিদা খুব সহজেই পূরণ করা সম্ভব হবে যদি আমাদের দেশের সকল প্রান্তের পূর্ণবয়স্ক মানুষদের রক্তদানের প্রয়োজনীয়তা এবং সুফলতা বুঝিয়ে সচেতন করা যায়।
                </p>
                <a href="{{ route('donor.registration') }}" class="thm-btn">আপনি কি রক্ত দিতে আগ্রহী?</a>
            </div>
        </div>
    </div>
</section>

<section class="upcoming-event sec-padding bg-pattern bg-color-thm sec-padding75">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sec-title text-center">
                    <h2 class="text-white">প্রবর্তী কর্মসুচি সমূহ</h2>
                    <p class="text-white">আমরা প্রতিনিয়ত বিভিন্ন ধরনের কর্মসুচি করে থাকি।</p>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="event-post">
                    <div class="thumb">
                        <img src="{{ asset('frontend/img/event/e1.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="{{ route('donor.registration') }}">যোগদান করুন</a>
                        </div>
                    </div>
                    <div class="caption">
                        <h3 class="title"><a href="#">সেচ্ছায় রক্তদান</a></h3>
                        <i class="fa fa-map-marker"></i>
                        <p class="event-time"><span>16-25</span> June <span>2016</span></p>
                        <p class="event-location">মহাম্মাদপুর ঢাকা</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="event-post">
                    <div class="thumb">
                        <img src="{{ asset('frontend/img/event/e1.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="{{ route('donor.registration') }}">যোগদান করুন</a>
                        </div>
                    </div>
                    <div class="caption">
                        <h3 class="title"><a href="#">সেচ্ছায় রক্তদান</a></h3>
                        <i class="fa fa-map-marker"></i>
                        <p class="event-time"><span>16-25</span> June <span>2016</span></p>
                        <p class="event-location">মহাম্মাদপুর ঢাকা</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="event-post">
                    <div class="thumb">
                        <img src="{{ asset('frontend/img/event/e1.jpg') }}" alt="">
                        <div class="overlay">
                            <a href="{{ route('donor.registration') }}">যোগদান করুন</a>
                        </div>
                    </div>
                    <div class="caption">
                        <h3 class="title"><a href="#">সেচ্ছায় রক্তদান</a></h3>
                        <i class="fa fa-map-marker"></i>
                        <p class="event-time"><span>16-25</span> June <span>2016</span></p>
                        <p class="event-location">মহাম্মাদপুর ঢাকা</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-padding meet-Volunteer">
    <div class="container">
        <div class="row">
            <div class="col-xs-10">
                <div class="sec-title text-left blog-headding">
                    <h2>আমাদের ভলেন্টিয়ার সমূহ</h2>
                    <p>ভলেন্টিয়ার রা সেচ্ছেয় যেকোনো রক্তদান কর্মসুচিতে অংশগ্রহন করে।</p>
                    <!-- <span class="decor"><span class="inner"></span></span> -->
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="team-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
                <div class="item">
                    <div class="single-team-member">
                        <div class="img-box">
                            <img src="{{ asset('frontend/img/volunteer/1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>মোঃ রশিদ খান</h3>
                        <span>ছাত্র</span>
                        <p>রক্তের গ্রুপঃ বি+</p>
                        <p>মোবাঃ ০১৭০০-০০০০০০</p>
                        <p>ঠিকানাঃ মহাম্মাদপুর, ঢাকা-১২০৭</p>
                        <a href="volunteer-profile.html" class="thm-btn">বিস্তারিত</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlay-white sec-padding parallax-section sec-padding89">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 promote-project style-inner text-center">
                    <h2>আপনার কি জরুরী ভিত্তিতে রক্তের প্রয়োজন ?</h2>
                <div class="sec-title colored text-center">
                    <span class="decor">
                        <span class="inner"></span>
                    </span>
                </div>
                <a href="{{ route('blood.request') }}" class="thm-btn">যোগাযোগের তথ্য দিয়ে পোষ্ট করুন।</a>
            </div>
        </div>
    </div>
</section>


<section class="blog-home sec-padding">
    <div class="container">
        <div class="sec-title text-center blog-headding">
            <h2>সাম্প্রতিক ব্লগ সমূহ</h2>
            <p>রক্তের বিকল্প শুধু রক্তই। রক্ত সম্পর্কিত আরো জানতে, আমাদের ব্লগগুলি দেখুন...</p>
            <div class="sec-title colored text-center">
                <span class="decor">
                    <span class="inner"></span>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 blogs-inner">
                <div class="single-blog-post">
                    <div class="img-box">
                        <img class="full-width" src="{{ asset('frontend/img/blog/1.jpg') }}" alt="">
                        <div class="overlay">
                            <div class="box">
                                <div class="content">
                                    <ul>
                                        <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">
                        <div class="date-box">
                            <div class="inner">
                                <div class="date">
                                    <b>২৪</b>
                                    এপ্রিল
                                </div>
                                <div class="comment">
                                    <i class="flaticon-interface-1"></i> ৪
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <a href="blog-details.html"><h3>রক্ত সংগ্রহের সময় লক্ষণীয় বিষয়গুলো</h3></a>
                            <p>রক্ত যে কোনো সময় প্রয়োজন হতে পারে, এ কথা মনে রেখে আমরা যদি এখনই প্রস্তুতি নিয়ে রাখি তবে রক্ত পরিসঞ্চালনের সমস্যা থেকে বেঁচে যায়। একটু অসাবধানতায় রক্তে বাসা নিতে পারে কোন মরণব্যাধির। তাই রক্তসংগ্রহ করতে অতিরিক্ত সতর্কতা রাখা উচিৎ। </p>
                            <a class="btn-details" href="blog-details.html">বিস্তারিত</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 blogs-inner">
                <div class="single-blog-post">
                    <div class="img-box">
                        <img class="full-width" src="{{ asset('frontend/img/blog/1.jpg') }}" alt="">
                        <div class="overlay">
                            <div class="box">
                                <div class="content">
                                    <ul>
                                        <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">
                        <div class="date-box">
                            <div class="inner">
                                <div class="date">
                                    <b>২৪</b>
                                    এপ্রিল
                                </div>
                                <div class="comment">
                                    <i class="flaticon-interface-1"></i> ৪
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <a href="blog-details.html"><h3>রক্ত সংগ্রহের সময় লক্ষণীয় বিষয়গুলো</h3></a>
                            <p>রক্ত যে কোনো সময় প্রয়োজন হতে পারে, এ কথা মনে রেখে আমরা যদি এখনই প্রস্তুতি নিয়ে রাখি তবে রক্ত পরিসঞ্চালনের সমস্যা থেকে বেঁচে যায়। একটু অসাবধানতায় রক্তে বাসা নিতে পারে কোন মরণব্যাধির। তাই রক্তসংগ্রহ করতে অতিরিক্ত সতর্কতা রাখা উচিৎ। </p>
                            <a class="btn-details" href="blog-details.html">বিস্তারিত</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 blogs-inner">
                <div class="single-blog-post">
                    <div class="img-box">
                        <img class="full-width" src="{{ asset('frontend/img/blog/1.jpg') }}" alt="">
                        <div class="overlay">
                            <div class="box">
                                <div class="content">
                                    <ul>
                                        <li><a href="blog-details.html"><i class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">
                        <div class="date-box">
                            <div class="inner">
                                <div class="date">
                                    <b>২৪</b>
                                    এপ্রিল
                                </div>
                                <div class="comment">
                                    <i class="flaticon-interface-1"></i> ৪
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <a href="blog-details.html"><h3>রক্ত সংগ্রহের সময় লক্ষণীয় বিষয়গুলো</h3></a>
                            <p>রক্ত যে কোনো সময় প্রয়োজন হতে পারে, এ কথা মনে রেখে আমরা যদি এখনই প্রস্তুতি নিয়ে রাখি তবে রক্ত পরিসঞ্চালনের সমস্যা থেকে বেঁচে যায়। একটু অসাবধানতায় রক্তে বাসা নিতে পারে কোন মরণব্যাধির। তাই রক্তসংগ্রহ করতে অতিরিক্ত সতর্কতা রাখা উচিৎ। </p>
                            <a class="btn-details" href="blog-details.html">বিস্তারিত</a>
                        </div>
                    </div>
                </div>
            </div>
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
            $('#dis_id').on('change',function(e) {
                var dis_id = e.target.value;

                console.log(dis_id);
                $.ajax({
                    url:"{{ route('area.thana') }}",
                    type:"POST",
                    data: {
                        dis_id: dis_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success:function (data) {
                        $('#thana').html(data.html);
                    }
                })
            });
        });

        // For area-----------------
        // $(document).ready(function () {
        //     $('#thana_id').on('change',function(e) {
        //         var thana_id = e.target.value;
        //         console.log(thana_id);
        //         $.ajax({
        //             url:"{{ route('donor.area') }}",
        //             type:"POST",
        //             data: {
        //                 thana_id: thana_id,
        //                 _token: '{{ csrf_token() }}',
        //             },
        //             success:function (data) {
        //                 $('#area').html(data.html);
        //             }
        //         })
        //     });
        // });
    </script>
@endsection
