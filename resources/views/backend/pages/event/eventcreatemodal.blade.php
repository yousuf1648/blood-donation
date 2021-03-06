  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title"><i class="fas fa-plus"></i> New Events Post</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="row" action="{{ route('admin.event.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title.">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="details">Details</label>
                    <textarea class="textarea" name="details" placeholder="Enter details." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-6">
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

                <div class="form-group col-lg-6 col-md-6 col-6">
                    <label>Date :</label>
                    <input type="text" class="form-control datetimepicker" name="Appointment_time">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-6">
                    <label>Start Time:</label>

                    <div class="input-group date" id="start_timepicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#start_timepicker"/>
                            <div class="input-group-append" data-target="#start_timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-6">
                    <label>End Time:</label>

                    <div class="input-group date" id="end_timepicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#end_timepicker"/>
                            <div class="input-group-append" data-target="#end_timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                    </div>
                </div>


        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
