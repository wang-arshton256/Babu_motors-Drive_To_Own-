@isset($ruturnBeneficiary)
                      @foreach ($ruturnBeneficiary as $data)
 <div class="modal" id="UpdateBeneficiary{{$data->id }}">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update the Beneficiary
          <span class="font-weight-bold text-danger">
            {{ $data->name }}

          </span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('UpdateBeneficiary') }}">
          @csrf
          <div class="row">
            <div class="col-md-4">

              <input type="hidden" name="id" value="{{$data->id }}" required>
              <!-- text input -->
              <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control"  value="{{$data->name }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control"  value="{{$data->email }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="text" class="form-control"  value="{{$data->phone }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" class="form-control"  value="{{$data->address }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputFile">ID Scan (JPG and PNG Only)</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="id_photo">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="float-left btn btn-danger">Submit</button>
             <button type="button" class="float-right btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      <!-- Modal footer -->
    </div>
  </div>
</div>
  @endforeach
                    @endisset
