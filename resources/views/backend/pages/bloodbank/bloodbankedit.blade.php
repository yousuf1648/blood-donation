<div class="modal fade" id="edit_{{$key}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title"><i class="fas fa-plus"></i> Update Blood Bank</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="row" action="{{ route('admin.bloodbank.update',$bloodbank->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="blood_bank_name">Name</label>
                    <input type="text" class="form-control" id="blood_bank_name" value="{{ $bloodbank->blood_bank_name }}" name="blood_bank_name" placeholder="Enter blood bank name">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="blood_bank_address">Address</label>
                    <input type="text" class="form-control" id="blood_bank_address" value="{{ $bloodbank->blood_bank_address }}" name="blood_bank_address" placeholder="Enter blood bank address">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="dis_id">District</label>
                    <select class="form-control select2" style="width: 100%;" name="dis_id">
                        <option selected="selected" value="{{ $bloodbank->district_id }}">{{ $bloodbank->dis_name }}</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->dis_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-12">
                    <label for="blood_bank_number">Contact</label>
                    <input type="text" class="form-control" id="first_mobile" value="{{ $bloodbank->blood_bank_number }}" name="blood_bank_number" placeholder="Phone number must be start  01/+8801/8801 ">
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
