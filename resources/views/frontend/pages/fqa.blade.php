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
                    <h2>রক্তদান বিষয়ে কিছু প্রশ্ন ও উত্তর</h2>
                    <ul class="breadcumb">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>প্রশ্ন ও উত্তর</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding faq-home faq-page pt_90">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-push-1">
					<div class="accrodion-grp" data-grp-name="faq-accrodion">
						@foreach ($fqas as $key=>$fqa)
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>
                                        <span class="decor">
                                            <span class="inner"></span>
                                        </span>
                                        <span class="text">{{ $fqa->question }}</span>
                                    </h4>
                                </div>
                                <div class="accrodion-content">
                                    {!! $fqa->answere !!}

                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
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
