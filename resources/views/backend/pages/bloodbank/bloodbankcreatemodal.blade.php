  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title"><i class="fas fa-plus"></i> New Blood Bank</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="row" action="{{ route('admin.bloodbank.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="blood_bank_name">Name</label>
                    <input type="text" class="form-control" id="blood_bank_name" name="blood_bank_name" placeholder="Enter blood bank name">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="blood_bank_address">Address</label>
                    <input type="text" class="form-control" id="blood_bank_address" name="blood_bank_address" placeholder="Enter blood bank address">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-6">
                    <label for="dis_id">District</label>
                    <select class="form-control select2" style="width: 100%;" name="dis_id">
                        <option selected="selected" value="">---Select One---</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->dis_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-6">
                    <label for="blood_bank_number">Contact</label>
                    <input type="text" class="form-control" id="first_mobile" name="blood_bank_number" placeholder="Phone number must be start  01/+8801/8801 ">
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
