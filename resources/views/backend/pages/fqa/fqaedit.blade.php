<div class="modal fade" id="edit_{{$key}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Update FQA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="row" action="{{ route('admin.fqa.update',$fqa->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="question">Question?</label>
                    <input type="text" class="form-control" id="question" name="question" value="{{ $fqa->question }}" placeholder="Enter question.">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="answere">Answere</label>
                    <textarea class="textarea" name="answere" placeholder="Enter answere." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {!! $fqa->answere !!}
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
