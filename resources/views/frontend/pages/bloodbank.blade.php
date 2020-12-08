@extends('frontend.layouts.master')

@section('title')
    {{ $website->title }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/datepicker.css') }}">
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
        <form class="donation-form-outer" action="#" method="post">
              <!--Form Portlet-->
              <div class="form-portlet">

                  <div class="row clearfix">

                    <div class="form-group col-lg-3 col-md-3 col-xs-12">
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

                    <div class="form-group col-lg-2 col-md-2 col-xs-12">
                        <select class="form-control js-example-basic-single" name="dis_id" tabindex="-1" aria-hidden="true" id="dis_id">
                            <option value="" selected>জেলা নির্বাচন করুন</option>
                            @php
                                $districts = DB::table('districts')->get();
                            @endphp
                            @foreach ($districts as $key=>$district)
                                <option value="{{ $district->id }}">{{ $district->dis_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-2 col-md-2 col-xs-12">
                        <select class="form-control js-example-basic-single" name="thana_id" id="thana" tabindex="-1" aria-hidden="true">
                            <option value="">থানা নির্বাচন করুন </option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-xs-12">
                        <input type="text" class="form-control" name="blood_needed_date" id="datepicker" placeholder="dd/mm/yyyy">
                    </div>

                    <div class="form-group doner-search col-lg-2 col-md-2 col-xs-12">
                        <button type="submit" class="thm-btn mt_30 mb_30">সার্চ করুন</button>
                    </div>
                </div>
                <hr>
                <h2 class="text-center text-danger">দুঃখিত! এই মুহূর্তে রক্ত প্রয়োজন এমন কোন তথ্য খুঁজে পাওয়া যায় নি।</h2>
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

@section('js')
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.min.js') }}"></script>
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
