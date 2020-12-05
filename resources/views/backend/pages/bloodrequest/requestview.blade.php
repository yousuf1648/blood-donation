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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        .new-user{
            position: absolute;
            margin: -4px 0 0px 58px;
        }
    </style>
@endsection

@section('back-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blood Requests Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.bloodrequest') }}">All Requests</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
              <div class="row">
                  <div class="col-10"><h3 class="card-title">Request Id - #{{ $blood_details->id }}</h3></div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
                      <div class="row">
                        <div class="col-12">
                          <h3>Patient Information</h3>
                          <hr>
                          <div class="row">
                            <p class="col-lg-6 col-md-6 col-12"><strong>Name: </strong>{{ $blood_details->patient_name }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Age: </strong>{{ $blood_details->patient_age }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Gender: </strong>{{ $blood_details->patient_gender }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Blood Group: </strong>{{ $blood_details->blood_group }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Needed Blood Bags: </strong>{{ $blood_details->blood_bag }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Patients's Relative: </strong>{{ $blood_details->patient_relative }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Relative's Number: </strong>{{ $blood_details->patient_relative_contact }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Reason: </strong>{{ $blood_details->reason_for_blood }}</p>
                            <p class="col-lg-6 col-md-6 col-12"><strong>Image: </strong><img src="{{ $blood_details->report_image }}" alt="Report" height="100px" width="100px"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
                      <h3></i>Location Information</h3>
                      <hr>
                      <p><strong>Hospital Name: </strong>{{ $blood_details->hospital_name }}</p>
                      <p><strong>Hospital Address: </strong>{{ $blood_details->hospital_address }}</p>
                      <p><strong>Hospital Area: </strong>{{ $blood_details->hospital_area }}</p>
                      <p><strong>Blood Needed Date: </strong>{{ $blood_details->blood_needed_date }}</p>
                      <p><strong>Blood Needed Time: </strong>{{ $blood_details->blood_needed_time }}</p>
                    </div>
                  </div>
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

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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

    </script>
@endsection
