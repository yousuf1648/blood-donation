<div class="modal fade" id="edit_{{$key}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Update Blog Post</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="row" action="{{ route('admin.blog.update',$blog->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter question.">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="oldImage" class="control-label col-lg-2">Old Image</label>
                    <div class="input-group">
                        <img src="{{ URL::to($blog->feature_image) }}" class="thumb-lg img-thumbnail" alt="Feature Image" name="old_photo" height="100px" width="100px">
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="exampleInputFile">Feature Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input upload" id="image" name="feature_image" type="file" accept="image/*" required onchange="readURL(this);">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div><br>
                    <div class="newEmployeeUploadImg"><img id="photo" src="#" /></div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="details">Details</label>
                    <textarea class="textarea" name="details" placeholder="Enter details." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {!! $blog->details !!}
                    </textarea>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
