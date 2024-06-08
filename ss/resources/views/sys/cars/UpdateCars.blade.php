 @isset($ReturnCars)
  @foreach ($ReturnCars as $data)

  <div class="modal" id="UpdateCar{{ $data->id }}">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update the car model

          <span class="text-danger font-weight-bold">

            {{ $data->model }}

          </span>

        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
     <div class="modal-body">
        <form method="POST"  action="{{ route('UpdateCar') }}">
          @csrf

          <input type="hidden" name="id" value="{{ $data->id }}">

          <div class="row">
            <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Brand</label>
                <input name="brand" type="text" class="form-control"  required value="{{ $data->brand }}">
              </div>
            </div>


             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Model</label>
                <input name="model" type="text" class="form-control"  required value="{{ $data->model }}">
              </div>
            </div>

             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Reg no</label>
                <input name="reg_no" type="text" class="form-control"  required value="{{ $data->reg_no }}">
              </div>
            </div>

            <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Eng no</label>
                <input name="eng_no" type="text" class="form-control"  required value="{{ $data->eng_no }}">
              </div>
            </div>

             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Chasis no</label>
                <input name="chasis_no" type="text" class="form-control"  required value="{{ $data->chasis_no }}">
              </div>
            </div>

             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Price</label>
                <input name="price" id="CarPrice" type="text" class="form-control"  required value="{{ $data->price }}">
              </div>
            </div>




             <div class="col-md-4">
              <!-- text input -->
              <div class="form-group">
                <label> Color</label>
                <input name="color" type="text" class="form-control"  required value="{{ $data->color }}">
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
