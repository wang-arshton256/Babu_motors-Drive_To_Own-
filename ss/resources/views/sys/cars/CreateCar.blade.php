<div class="modal" id="CreateNewCar">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Car to Inventory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('CreateNewCar') }}">
          @csrf
          <div class="row">
            <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Brand</label>
                <input name="brand" type="text" class="form-control"  required>
              </div>
            </div>


             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Model</label>
                <input name="model" type="text" class="form-control"  required>
              </div>
            </div>

             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Reg no</label>
                <input name="reg_no" type="text" class="form-control"  required>
              </div>
            </div>

            <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Eng no</label>
                <input name="eng_no" type="text" class="form-control"  required>
              </div>
            </div>

             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Chasis no</label>
                <input name="chasis_no" type="text" class="form-control"  required>
              </div>
            </div>

             <div class="col-md-3">
              <!-- text input -->
              <div class="form-group">
                <label>Price</label>
                <input name="price" id="CarPrice" type="text" class="form-control"  required>
              </div>
            </div>



             <div class="col-md-4">
              <!-- text input -->
              <div class="form-group">
                <label> Color</label>
                <input name="color" type="text" class="form-control"  required>
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
