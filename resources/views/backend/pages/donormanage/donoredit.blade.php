@extends('backend.layouts.master')

@section('title')
    Blood Donate - Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">

    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> --}}

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <style>
        .new-user{
            position: absolute;
            margin: -4px 0 0px 65px;
        }
    </style>
@endsection

@section('back-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Donor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.donor') }}">All Donors</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @php
    $bloods = DB::table('bloods')->get();
    $thanas = DB::table('thanas')->get();
  @endphp
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
              <div class="row">
                  <div class="col-10"><h3 class="card-title">Edit Donor - {{ $donors->name }}</h3></div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="row" id="beforeregform" action="{{ route('admin.donor.update',$donors->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                        <h4 class="form-group col-lg-12 col-md-12 com-12 text-center shadow-sm p-3 mb-5 bg-white rounded">
                            <strong>------- Donor Needable Informations -------</strong>
                        </h4>
                        <div class="form-group col-lg-6 col-md-6 col-12">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{ $donors->weight }}" placeholder="Enter Youe Weight">
                            @if ($errors->has('weight'))
                                <div class="invalid-feedback" style="display: block !important;">
                                    Please enter your valid weight (51kg - 90kg).
                                </div>
                            @else
                                <small id="" class="form-text text-muted">Weight should be 51kg to 90kg.</small>
                            @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-12">
                            <label for="username">age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $donors->age }}" placeholder="Enter Your Age">
                            @if ($errors->has('age'))
                                <div class="invalid-feedback" style="display: block !important;">
                                    Please enter your valid age (18-40 years.).
                                </div>
                            @else
                                <small id="" class="form-text text-muted">Age should be 18 to 40 years.</small>
                            @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-12">
                            <label for="height">Height</label>
                            <input type="text" class="form-control" id="height" name="height" value="{{ $donors->height }}" placeholder="Enter Your Height">
                            @if ($errors->has('height'))
                                <div class="invalid-feedback" style="display: block !important;">
                                    Height is erquired.
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-12">
                            <label for="disease">Any Disease</label>
                            <select class="form-control select2" style="width: 100%;" name="disease">
                                <option selected="selected" value="{{ $donors->disease }}">{{ $donors->disease }}</option>
                                <option value="এলার্জি/অ্যাজম্যা">এলার্জি/অ্যাজম্যা</option>
                                <option value="ক্যান্সার">ক্যান্সার</option>
                                <option value="ডায়াবেটিস">ডায়াবেটিস</option>
                                <option value="সিফিলিস/গনোরিস/এইডস">সিফিলিস/গনোরিস/এইডস</option>
                            </select>
                            @if ($errors->has('disease'))
                                <div class="invalid-feedback" style="display: block !important;">
                                    If you have any disease of these then you don't allow to register.
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-12">
                            <label for="smoker">Are you smoker?</label>
                            <select class="form-control select2" style="width: 100%;" name="smoker">
                                <option selected="selected" value="{{ $donors->smoker }}">{{ $donors->smoker }}</option>
                                <option value="হ্যাঁ">হ্যাঁ</option>
                                <option value="না">না</option>
                            </select>
                            @if ($errors->has('smoker'))
                                <div class="invalid-feedback" style="display: block !important;">
                                    Height is erquired.
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-12">
                            <label for="marital_status">Marital Status</label>
                            <select class="form-control select2" style="width: 100%;" name="marital_status">
                                <option selected="selected" value="{{ $donors->marital_status }}">{{ $donors->marital_status }}</option>
                                <option value="বিবাহিত">বিবাহিত</option>
                                <option value="অবিবাহিত">অবিবাহিত</option>
                                <option value="ডিভোর্স">ডিভোর্স</option>
                                <option value="জানাতে চাচ্ছি না">জানাতে চাচ্ছি না</option>
                            </select>
                            @if ($errors->has('marital_status'))
                                <div class="invalid-feedback" style="display: block !important;">
                                    Height is erquired.
                                </div>
                            @endif
                        </div>

                    <h4 class="form-group col-lg-12 col-md-12 com-12 text-center shadow-sm p-3 mb-5 bg-white rounded">
                        <strong>------- Personal Informations Of Donor -------</strong>
                    </h4>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $donors->name }}" name="name" placeholder="Enter Youe Full Name">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Your name is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="blood_group">Blood Group</label>
                        <select class="form-control select2" style="width: 100%;" name="blood_group">
                            <option selected="selected" value="{{ $donors->blood_group }}">{{ $donors->blood_group }}</option>
                            @foreach ($bloods as $blood)
                                <option value="{{ $blood->blood_name }}">{{ $blood->blood_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('blood_group'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Blood group is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="birthday">Birth Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask-alias="datetime" value="{{ $donors->birthday }}" name="birthday" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        </div>
                        @if ($errors->has('birthday'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Your birthday is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="gender">Gender</label>
                        <select class="form-control select2" style="width: 100%;" name="gender">
                            <option selected="selected" value="{{ $donors->gender }}">{{ $donors->gender }}</option>
                            <option value="পুরুষ">পুরুষ</option>
                            <option value="মহিলা">মহিলা</option>
                            <option value="তৃতীয় লিঙ্গ">তৃতীয় লিঙ্গ</option>
                        </select>
                        @if ($errors->has('gender'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Gender is erquired.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="last_donate">Last Blood Donating Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask-alias="datetime" value="{{ $donors->last_donate }}" name="last_donate" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                        </div>
                        @if ($errors->has('last_donate'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Your last donating date is required.
                            </div>
                        @endif
                    </div>

                    <h4 class="form-group col-lg-12 col-md-12 com-12 text-center shadow-sm p-3 mb-5 bg-white rounded">
                        <strong>------- Communication Informations Of Donor -------</strong>
                    </h4>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="first_mobile">Mobile Number</label>
                        <input type="text" class="form-control" id="first_mobile" value="{{ $donors->first_mobile }}" name="first_mobile" placeholder="Enter Youe Mobile Number">
                        @if ($errors->has('first_mobile'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Your mobile number is required.
                            </div>
                        @else
                            <small id="" class="form-text text-muted">Number should be started with 01/8801/+8801</small>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="second_mobile">Another Mobile Number</label>
                        <input type="text" class="form-control" id="second_mobile" value="{{ $donors->second_mobile }}" name="second_mobile" placeholder="Enter Youe Another Mobile Number">
                        @if ($errors->has('second_mobile'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Your name is required.
                            </div>
                        @else
                            <small id="" class="form-text text-muted">Number should be started with 01/8801/+8801</small>
                        @endif
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="thana">Thana</label>
                        <select class="form-control select2 " style="width: 100%;" id="thana_id" name="thana">
                            <option selected="selected" value="{{ $donors->thana_id }}">{{ $donors->thana_name }}</option>
                            @foreach ($thanas as $thana)
                                <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('thana'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Blood group is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="thana">Post Code</label>
                        <select class="form-control select2" style="width: 100%;" name="post_code"  id="postcode">
                            <option selected="selected" value="{{ $donors->post_code_id }}">{{ $donors->post_code }}</option>
                        </select>
                        @if ($errors->has('post_code'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Post Code is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="area">Area</label>
                        <select class="form-control select2" style="width: 100%;" name="area" id="area">
                            <option selected="selected" value="{{ $donors->area_id }}">{{ $donors->area_name }}</option>
                        </select>
                        @if ($errors->has('area'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Area is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="second_mobile">Present Address</label>
                        <textarea class="form-control" name="present_address" value="" id="present_address" cols="30" rows="3">{{ $donors->present_address }}</textarea>
                        @if ($errors->has('present_address'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Present address is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="second_mobile">Permanent Address</label>
                        <textarea class="form-control" name="permanent_address" value="" id="permanent_address" cols="30" rows="3">{{ $donors->permanent_address }}</textarea>
                        @if ($errors->has('permanent_address'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Permanent address is required.
                            </div>
                        @endif
                    </div>

                    <h4 class="form-group col-lg-12 col-md-12 com-12 text-center shadow-sm p-3 mb-5 bg-white rounded">
                        <strong>------- Log In Informations Of Donor -------</strong>
                    </h4>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" value="{{ $donors->username }}" name="username" placeholder="Enter Username">
                        @if ($errors->has('username'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Username is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $donors->email }}" name="email" placeholder="Enter Email">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Email is required.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12">
                        <label for="oldImage" class="control-label col-lg-2">Old Image</label>
                        <div class="input-group">
                            <img src="{{ URL::to($donors->image) }}" class="thumb-lg img-circle img-thumbnail" alt="{{ $donors->name }}" name="old_photo" height="100px" width="100px">
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input upload" id="image" name="image" type="file" accept="image/*" required onchange="readURL(this);">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div><br>
                        <div class="newEmployeeUploadImg"><img id="photo" src="#" /></div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 com-12">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Donor</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('js')
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
{{--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script type="text/javascript">
        // For post code-------------------------
        $(document).ready(function () {
            $('#thana_id').on('change',function(e) {
                var thana_id = e.target.value;
                $.ajax({
                    url:"{{ route('admin.donor.postcode') }}",
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
        // For area-------------------------------
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $(document).ready(function () {
            $('#thana_id').on('change',function(e) {
                var thana_id = e.target.value;
                $.ajax({
                    url:"{{ route('admin.donor.area') }}",
                    type:"POST",
                    data: {
                        thana_id: thana_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success:function (data) {
                        $('#area').html(data.html);
                        // console.log(data);
                        // $('#area').empty();
                        // $.each(data.areas[0].areas,function(index,area){
                        //     $('#area').append('<option value="'+area.area_name+'">'+area.area_name+'</option>');
                        // })
                    }
                })
            });
        });
    </script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });

        $(function () {
            $('.select2').select2();
        });

        // $(function () {
        //     $('.datetimepicker').datetimepicker();
        // });

        $(function () {
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
            )
        });


        // this function for image show when select image to upload database------------
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#photo')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // $(window).bind('beforeunload', function(e) {
        //     return "Unloading this page may lose data. What do you want to do..."
        //     e.preventDefault();
        // });

    </script>
@endsection
