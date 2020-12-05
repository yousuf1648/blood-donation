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
          <h1 class="m-0 text-dark">Website Info</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Donors</li>
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
                <h3 class="card-title">Website Info Update</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="row" action="{{ route('admin.website.update',$website->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="title">Application Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $website->title }}" placeholder="Application Title">
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="title">Site Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Email Address"  value="{{$website->email}}">
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-12">
                        <label for="title">Site Mobile No.</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone No"  value="{{$website->phone}}" >
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="title">Description</label>
                        <textarea name="description" class="form-control"  placeholder="Description" rows="2">{{$website->description}} </textarea>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="title">Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control"  placeholder="Meta Keyword" rows="2">{{$website->meta_keyword}}</textarea>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="title">Meta Description</label>
                        <textarea name="meta_tag" class="form-control"  placeholder="Meta Description" rows="2">{{$website->meta_tag}}</textarea>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="title">Address</label>
                        <textarea name="address" class="form-control"  placeholder="Address" rows="2">{{$website->address}}</textarea>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="title">Twitter Api</label>
                        <textarea name="twitter_api" class="form-control"  placeholder="Twitter Api" rows="2">{{$website->twitter_api}}</textarea>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-12">
                        <label for="title">Google Map</label>
                        <textarea name="google_map" class="form-control"  placeholder="Google Map" rows="2">{{$website->google_map}}</textarea>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12">
                        <label for="oldImage" class="control-label col-lg-2">Old Favicon Image</label>
                        <div class="input-group">
                            <img src="{{ URL::to($website->favicon) }}" class="thumb-lg img-circle img-thumbnail" alt="Site favicon" name="old_favicon" height="100px" width="100px">
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12">
                        <label for="exampleInputFile">Favicon Image</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input upload" id="fevico" name="favicon" type="file" accept="image/*" onchange="readURL(this);">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12">
                        <label for="oldImage" class="control-label col-lg-2">Old Logo Image</label>
                        <div class="input-group">
                            <img src="{{ URL::to($website->logo) }}" class="thumb-lg img-circle img-thumbnail" alt="Site Logo" name="old_logo" height="100px" width="100px">
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-12">
                        <label for="exampleInputFile">Logo Image</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input upload" id="image" name="logo" type="file" accept="image/*" onchange="readURL(this);">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                        </div>
                    </div>

                    <!-- Additional fild -->
                    <table class="table table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <th>Social icon ( https://fontawesome.com/v4.7.0/icons/ )</th>
                                <th>Link</th>
                                <th width="160" class="text-center">Add / Remove</th>
                            </tr>
                        </thead>
                        <tbody id="diagnosis">
                            @php
                                $icon = explode("|",$website->icon);
                                $link = explode("|",$website->link);
                            @endphp
                            @foreach($icon as $key=>$icon)
                            <tr>
                                <td>
                                    <input type="text" name="icon[]" autocomplete="off" class="form-control" placeholder="https://fontawesome.com/v4.7.0/icons/" value="{{$icon}}" >
                                </td>

                                <td>
                                    <input type="text" name="link[]" class="form-control" placeholder="https://" value="@if(isset($link[$key])){{$link[$key]}}@endif" >
                                </td>
                                <td class="text-center">
                                    <div class="btn btn-group">
                                    <button type="button" class="btn btn-sm btn-primary DiaAddBtn">+</button>
                                    <button type="button" class="btn btn-sm btn-danger DiaRemoveBtn">-</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- /.box-body -->

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="ui buttons">
                                <button type="submit" class="btn btn-success m-t-15 waves-effect">UPDATE</button>

                            </div>
                        </div>
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

    </script>

<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            // console.log(status);
            $.ajax({
                url:"{{ route('admin.donor.activity') }}",
                type:"POST",
                data: {
                    status: status,
                    user_id: user_id,
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

<script>
    $(document).ready(function() {
      //#------------------------------------
      //   STARTS OF DIAGNOSIS
      //#------------------------------------
      //add row
      $('body').on('click','.DiaAddBtn' ,function() {
          var itemData = $(this).parent().parent().parent();
          $('#diagnosis').append("<tr>"+itemData.html()+"</tr>");
          $('#diagnosis tr:last-child').find(':input').val('');
      });
      //remove row
      $('body').on('click','.DiaRemoveBtn' ,function() {
          $(this).parent().parent().parent().remove();
      });

    });
  </script>
@endsection
