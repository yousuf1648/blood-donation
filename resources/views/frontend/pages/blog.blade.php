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
                    <h2>আমাদের নতুন ব্লগ সমূহ</h2>
                    <ul class="breadcumb">
                        <li><a href="{{ route('home') }}">হোম</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>ব্লগ</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-home sec-padding blog-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12 pull-left pull-sm-none">
					@foreach ($blogs as $key=>$blog)
                            <div class="single-blog-post">
                                <div class="img-box">
                                    <img src="{{ URL::to($blog->feature_image) }}" alt="">
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <ul>
                                                    <li><a href="{{ route('blog.details',$blog->id) }}"><i class="fa fa-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div class="date-box">
                                        <div class="inner">
                                            <div class="date">
                                                <b>{{ $blog->blog_date }}</b>
                                            </div>
                                            <div class="comment">
                                                <i class="flaticon-interface-1"></i> 8
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('blog.details',$blog->id) }}"><h3>{{ $blog->title }}</h3></a>
                                        @php
                                            $h = $blog->details;
                                            // $details = substr($blog->details, 0, 100);
                                        @endphp
                                        <p>{!! substr($blog->details, 0, 2000) !!}.....</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @php
                            $blogs = App\Models\Admin\Blog::paginate(15);
                        @endphp
                        {{-- @foreach ($blogs as $blog)
                            {{ $blog->title }}
                        @endforeach --}}
                        {{ $blogs->links() }}
		          	<!--Pagination-->
		            <div class="pager-outer clearfix mb_0">
		                <ul class="pagination mb_0">
		                    <li><a href="#">Prev</a></li>
		                    <li class="active"><a href="#">1</a></li>
		                    <li><a href="#">2</a></li>
		                    <li><a href="#">Next</a></li>
		                </ul>
		            </div>
				</div>
				<div class="col-md-4 col-sm-12 sidebar-inner pull-right pull-sm-none">
					<div class="side-bar-widget">
						<div class="single-sidebar-widget search">
							<form action="#">
								<input type="text" placeholder="Search">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget popular-post">
							<h3 class="title">সর্বশেষ ব্লগ সমূহ</h3>
							<ul>
								<li>
									<div class="img-box">
										<div class="inner-box">
											<img src="{{ asset('frontend/img/blog-page/s1.jpg') }}" alt="">
										</div>
									</div>
									<div class="content-box">
										<a href="#"><h4>Lorem Ipsum is simply dumm textand somthing more here</h4></a>
										<span>17 jun, 2015</span>
									</div>
								</li>
							</ul>
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
