@extends('frontend.layouts.master')

@section('title')
    {{ $website->title }}
@endsection

@section('front-content')
    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>রক্তদাতা গণ এর তালিকা</h2>
                    <ul class="breadcumb">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>রক্তদাতা গণ</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="doner-search-padding donation-section">
    	<div class="container">
        <form class="donation-form-outer" action="" method="post">
              <!--Form Portlet-->
              <div class="form-portlet">

                  <div class="row clearfix">

                      <div class="form-group col-lg-4 col-md-4 col-xs-12">
                        <select  class="form-control">
                            <option class="form-control">রক্তের গ্রুপ নির্বাচন করুন</option>
                          </select>
                      </div>

                      <div class="form-group col-lg-3 col-md-3 col-xs-12">
                        <select class="form-control">
                          <option>জেলা নির্বাচন করুন</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-3 col-md-3 col-xs-12">
                        <select class="form-control">
                          <option>থানা নির্বাচন করুন</option>
                        </select>
                      </div>

                      <div class="form-group doner-search col-lg-2 col-md-2 col-xs-12">
                          <a href="registerfinal.html" type="button" class="thm-btn mt_30 mb_30">সার্চ করুন</a>
                      </div>
                </div>
                <hr>
                <h2 class="text-center text-danger">সাম্প্রতিক সময়ে রক্তদাতা হিসেবে যারা যুক্ত হয়েছেন</h2>
              </div>
          </form>
        </div>
    </section>

    <section class="meet-Volunteer pb_30">
		<div class="container">
			<div class="row">
				@foreach ($donors as $key=>$donor)
                    <div class="col-md-3">
                        <div class="single-team-member mb_60">
                            <div class="img-box">
                                <img class="full-width" src="{{ URL::to($donor->image) }}" alt="">
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
                            <h3>{{ $donor->name }}</h3>
                            <span>রক্তের গ্রুপঃ {{ $donor->blood_group }}</span>
                            <p>বয়েসঃ ২৯ বছর</p>
                            <p>লিংঃ {{ $donor->gender }}</p>
                            <p>ঠিকানাঃ {{ $donor->present_address }}</p>
                            <p>মোবাইলঃ {{ $donor->first_mobile }}</p>
                            <p>সদস্যঃ কোন সংগঠন এর সদস্য নয়</p>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</section>

@endsection
