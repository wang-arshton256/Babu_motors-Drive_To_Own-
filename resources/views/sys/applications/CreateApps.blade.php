<div class="modal" id="CreateApps">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New Application




        </h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('CreateApps') }}">
          @csrf
          <div class="row">
            <div class="col-md-6">

          <label> Select Car Model</label>

                  <select name="car_unique_id" class="getdesc form-control select2bs4" style="width: 100%;">
                     <option selected="selected"></option>
                    @isset($ReturnCars)
                      @foreach ($ReturnCars as $data)


                    <option value="{{ $data->car_unique_id }}">


                      {{ $data->model }} ({{ number_format( $data->price, 2) }} UGX)




                    </option>

                        @endforeach
                    @endisset

                  </select>
                </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Backup (UGX)</label>
                <small>  <span class="font-weight-bold scrn text-danger">000.00 </span> UGX</small>
                <input name="initial_payment" type="text" class="currency amount form-control"  required >
              </div>
            </div>

                 <div class="col-md-4">

          <label> Select Beneficiary</label>

                  <select name="unique_id" class="getdesc form-control select2bs4" style="width: 100%;">
                     <option selected="selected"></option>
                    @isset($ruturnBeneficiary)
                      @foreach ($ruturnBeneficiary as $data)


                    <option value="{{ $data->unique_id }}">{{ $data->name }}</option>

                        @endforeach
                    @endisset

                  </select>
                </div>

             <div class="col-md-4">
            <div class="form-group">
                  <label>Final Payment Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="final_payment_date" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>

          <div class="col-md-4">
              <div class="form-group">
                <label>Weekly Payment</label>
                 <small>  <span class="font-weight-bold scrn2 text-danger">000.00 </span> UGX</small>
                <input name="weekly_payment" type="text" class="currency2 amount form-control"  required >
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
