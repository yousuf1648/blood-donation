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
          <h1 class="m-0 text-dark">New Donor</h1>
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
              <div class="row">
                  <div class="col-10"><h3 class="card-title">Add New Donor</h3></div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="row" id="beforeregform" action="{{ route('admin.donor.beforeregistration') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="weight">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Youe Weight">
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
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter Your Age">
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
                        <input type="text" class="form-control" id="height" name="height" placeholder="Enter Your Height">
                        @if ($errors->has('height'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Height is erquired.
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="disease">Any Disease</label>
                        <select class="form-control select2" style="width: 100%;" name="disease">
                            <option selected="selected" value="">---Select One---</option>
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
                            <option selected="selected" value="">---Select One---</option>
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
                            <option selected="selected" value="">---Select One---</option>
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

                    <div class="form-group col-lg-12 col-md-12 com-12">
                        <button type="submit" class="btn btn-primary">Next Page <i class="fas fa-arrow-right"></i></button>
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
