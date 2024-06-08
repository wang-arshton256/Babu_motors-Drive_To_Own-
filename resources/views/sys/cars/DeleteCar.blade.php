<div class="modal" id="DeleteCara">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Car to delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >

        <form class="row" method="POST" action="{{ route('DeleteCar') }}">
          @csrf
  <div class="col-md-6">

          <label> Select Car Model to delete</label>

                  <select name="id" class="getdesc form-control select2bs4" style="width: 100%;">
                     <option selected="selected"></option>
                    @isset($ReturnCars)
                      @foreach ($ReturnCars as $data)


                    <option value="{{ $data->id }}">{{ $data->model }}</option>

                        @endforeach
                    @endisset

                  </select>
                </div>

                <div class="col-md-6">
                     <label> Confirm Delete Pass-Phrase</label>
                   <input type="text" class="pass-phrase form-control" placeholder="Enter pass-phrase ">

                </div>
           <div class="col-md-12">

            <div class="card-body" >

              Are you sure you want to use the delete  car function?

              <p>
                This is action is not reversible and will delete all records associated to this car including applications and payments attached to this car. <span class="text-danger font-weight-bold">Please proceed with caution</span>
              </p>

              <p>To confirm the delete, enter the pass-phrase (lower case) <span class="text-danger font-weight-bold">

                yes delete

              </span> in the text box provided above and the <span class="font-weight-bold text-danger"> confirm delete button </span> will appear, Click it to effect the changes</p>




            </div>


      </div>



                  <div class="modal-footer">
        <button style="display: none" type="submit" class="btn confirmdelete btn-danger shadow-lg" >Confirm Delete</button>
        <button type="button" class="btn btn-primary shadow-lg" data-dismiss="modal">Cancel</button>
      </div>

    </form>

      </div>

      <!-- Modal footer -->

    </div>
  </div>
</div>
