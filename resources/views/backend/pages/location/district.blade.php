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
@endsection

@section('back-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Districts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Districts</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-7 col-7">
          <!-- small box -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">All Districts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#SL</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $key=>$district)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{ $district->dis_name }}</td>
                            <td>
                                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_{{$key}}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.district.delete',$district->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="edit_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="divisionEditModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('admin.district.update',$district->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">District Edit - <strong>{{ $district->dis_name }}</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="dis_name">District Name</label>
                                                <input type="text" class="form-control" id="dis_name" name="dis_name" value="{{ $district->dis_name }}" placeholder="Enter District Name">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                              </form>
                            </div>
                          </div>

                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <!-- ./col -->
      </div>
        <div class="col-lg-5 col-5">
          <!-- small box -->
            <form action="{{ route('admin.district.store') }}" method="POST">
            @csrf
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New District</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="div_id">Division Name</label>
                            <select class="form-control select2" style="width: 100%;" name="div_id">
                                <option selected="selected" value="">---Select One---</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->div_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('div_id'))
                            <div class="invalid-feedback" style="display: block !important;">
                                Division is erquired!
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="dis_name">District Name</label>
                            <input type="text" class="form-control" id="dis_name" name="dis_name" placeholder="Enter districts name">
                        </div>
                        @if ($errors->has('dis_name'))
                            <div class="invalid-feedback" style="display: block !important;">
                                District name is erquired!
                            </div>
                        @endif

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- ./col -->
      <!-- /.row -->
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
    </script>
@endsection
