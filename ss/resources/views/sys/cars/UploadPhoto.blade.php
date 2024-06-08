@isset($ReturnCars)
                      @foreach ($ReturnCars as $data)
                      <div class="modal" id="UploadCarPhoto{{ $data->id }}">
  <div class="modal-dialog ">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Attach photos to the car model

          <span class="font-weight-bold text-danger">

            {{ $data->model }}
          </span>

        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('AttachCarPhoto') }}">
          @csrf

          <input type="hidden" value="{{ $data->car_unique_id }}" name="unique_id">

               </div>
      <div class="container">
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputFile">Upload Car Photos</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="photo_url">
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

@endforeach
                    @endisset
