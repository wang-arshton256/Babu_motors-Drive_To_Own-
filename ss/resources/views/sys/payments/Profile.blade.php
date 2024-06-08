

          <!-- ./col -->
          <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box shadow-lg bg-primary">
              <div class="inner">
                <h6>{{ number_format($Paid, 3) }} UGX</h5>

                <p>Amount Paid</p>
              </div>
              <div class="icon">
                <i style="font-size: 25px" class="fas text-light fa-money-bill-wave"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box shadow-lg bg-dark">
              <div class="inner">
                <h6>{{ number_format($Due, 3) }} UGX</h6>

                <p>Amount Currently Due</p>
              </div>
              <div class="icon">
                <i style="font-size: 25px" class="fas text-light fa-comments-dollar"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box shadow-lg bg-danger">
              <div class="inner">
                <h6>{{ number_format($initial_payment, 3) }} UGX</h6>

                <p>Initial Payment</p>
              </div>
              <div class="icon">
                <i style="font-size: 25px" class="fas text-light fa-dollar-sign"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->























 <div class="col-md-12">


           <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Hello, {{ Auth::user()->name }}, this is your payment  log.



                </h3>

                <span class="float-right">

                      <small class="text-danger text-capitalize">

                       Current Status : {{ $status }}

                      </small>

                </span>

              </div>
              <!-- /.card-header -->
              <div class="card-body container-fluid">
              	@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                <table  class="wangs_table table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th> Date</th>
                    <th>Payment Amount</th>
                    <th>Payment Mode</th>
                    <th>Decsription</th>


                  </tr>
                  </thead>
                  <tbody>
                  	@isset($Payments)
                  		@foreach ($Payments as $data)
                      <tr>

                          <td>{{ $data->payement_date }}</td>
                          <td>{{ $data->amount }}</td>
                          <td>{{ $data->payment_mode }}</td>
                          <td>{{ $data->payement_for }}</td>



                      </tr>
                  		@endforeach
                  	@endisset

              </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
