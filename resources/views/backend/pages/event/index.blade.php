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
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> --}}
    <style>
        .new-user{
            position: absolute;
            margin: -4px 0 0px 76px;
        }
    </style>
@endsection

@section('back-content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Events</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Events</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
              <div class="row">
                  <div class="col-10"><h3 class="card-title">All Events</h3></div>
                  <div class="col-2">
                    <button type="button" class="btn btn-default btn-sm pull-right new-user" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> New Event</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="2%">#SL</th>
                    <th width="10%">Image</th>
                    <th width="20%">Title</th>
                    <th width="10%">Date</th>
                    <th width="6%">Time</th>
                    <th width="6%">Status</th>
                    <th width="6%">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($events as $key=>$event)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <img src="{{ URL::to($event->feature_image) }}" alt="event Image" style="height: 30px; width: 30px;">
                            </td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->event_start_time }} - {{ $event->event_end_time }}</td>
                            <td>
                                <input data-id="{{$event->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approve" data-off="Pandding" {{ $event->status ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_{{$key}}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.event.delete',$event->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        @include('backend.pages.event.eventedit')

                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    @include('backend.pages.event.eventcreatemodal')
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
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> --}}

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

        // text editor----------------------------
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })

        $(function () {
            $('.datetimepicker').datetimepicker();
        });

        //Timepicker
        $('#start_timepicker').datetimepicker({
            format: 'LT'
        })

        $('#end_timepicker').datetimepicker({
            format: 'LT'
        })

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

        // change activity-----------------
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var event_id = $(this).data('id');
                console.log(status);
                $.ajax({
                    url:"{{ route('admin.event.activity') }}",
                    type:"POST",
                    data: {
                        status: status,
                        event_id: event_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (data) {
                    window.location.reload();
                        // console.log(data.success);
                }
                });
            })
        })

    </script>
@endsection
