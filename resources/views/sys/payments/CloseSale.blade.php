<div class="modal" id="Record">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Record Payment for the beneficiary

          <span class="text-danger font-weight-bold">

            {{ $Beneficiary }}
          </span>


        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
       <div class="modal-body">
        <form method="POST" action="{{ route('RecordPayment') }}">
          @csrf
          <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                  <label> Payment Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input required type="text" class="form-control datetimepicker-input" name="payment_date" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>
              <input type="hidden" name="unique_id" value="{{ $unique_id }}">
            <div class="col-md-4">
              <div class="form-group">
                <label>Installment Amount</label>
                <input name="amount" type="text" class="amount form-control" required  >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Payment Mode</label>
                <input name="payment_mode" type="text" class="form-control" required  >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Payment Description</label>
                <input name="payement_for" type="text" class="form-control" required  >
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
