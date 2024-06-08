

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

                <p>Backup Amount</p>
              </div>
              <div class="icon">
                <i style="font-size: 25px" class="fas text-light fa-dollar-sign"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->























 <div class="col-md-12">

 @if ($status != 'closed sale' )
 <a href="#AddToDefaulters" data-toggle="modal" class=" btn hideforstaff hideforclient btn-sm btn-dark shadow-lg">
                  <i class="fas text-light fa-info"></i> Add to Defaulters
                </a>
                <a href="#RemoveFromDefaulters" data-toggle="modal" class=" hideforclient btn btn-sm hideforstaff btn-primary shadow-lg">
                  <i class="fas text-light fa-info"></i> Remove from Defaulters
                </a>

                  @endif

                @if ($status == 'close sale')
                  <a href="{{ route('CloseSale', ['id' => $id]) }}" class="ml-2
                btn btn-sm btn-danger hideforclient shadow-lg">
                  <i class="fas text-light fa-check"></i> Close Sale
                </a>
                @endif

                @if ($status != 'close sale' && $status != 'closed sale')

                  <a href="#Record" data-toggle="modal" class="ml-2
                btn btn-sm btn-danger hideforclient shadow-lg">
                  <i class="fas text-light fa-plus"></i> Record Payment
                </a>
                @endif




           <div class="card mt-2">
              <div class="card-header">
                @if (Auth::user()->role != 'client')
                <h3 class="card-title">Record Payments for the beneficiary

                  <span class="text-danger font-weight-bold">

                      {{ $Beneficiary }}
                  </span>

                </h3>
                  @endif


                  @if (Auth::user()->role == 'client')
                <h3 class="card-title">Hello,

                  <span class="text-danger font-weight-bold">

                      {{ $Beneficiary }} .
                  </span>
                  View your payment history

                </h3>
                  @endif

                <span class="float-right">

                  @if (Auth::user()->role == 'client' && $status == 'defaulter')
                    <small class="text-danger  font-weight-bold">

                       Your are marked as a defaulter

                      </small>

                  @endif


                  @if (Auth::user()->role != 'client' && $status == 'defaulter')
                    <small class="text-danger  font-weight-bold">

                      Beneficiary Marked As Defaulter

                      </small>

                  @endif



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
                    <th class="bg-danger text-light shadow-lg"> Status</th>
                    <th>Installment Paid</th>
                    <th>Total Payment</th>
                    <th>Excess added to backup</th>
                    <th>Amount  deducted from backup</th>
                    <th>Payment Mode</th>
                    <th>Description</th>
                    <th class="text-danger  ">Delete Payment</th>


                  </tr>
                  </thead>
                  <tbody>
                  	@isset($Payments)
                  		@foreach ($Payments as $data)
                      <tr>

                          <td>{{ $data->payement_date }}</td>
                          <td class="bg-danger text-light shadow-lg">{{ $status }}</td>
                          <td>{{ number_format($data->amount, 2) }}</td>
                          <td>
                            @if ($data->overcharge < 1)

                             {{ number_format($data->amount, 2) }}

                            @else

                            {{ number_format($data->amount + $data->overcharge,2)}}

                            @endif
                        </td>
                         <td>
                            @if ($data->overcharge < 1)

                              N/A

                            @else

                            {{ number_format($data->overcharge, 2)}}

                            @endif
                        </td>
                         <td>
                            @if ($data->undercharge < 1)

                              N/A

                            @else

                            {{ number_format($data->undercharge, 2)}}

                            @endif
                        </td>
                          <td>{{ $data->payment_mode }}</td>
                          <td>{{ $data->payement_for }}</td>
                          <td class="">
                            <a href="#DeletePay{{ $data->id }}" data-toggle="modal" class="btn btn-sm hideforstaff hideforclient btn-danger shadow-lg">

                              <i class="fas text-light fa-trash"></i>
                            </a>
                          </td>


                      </tr>
                  		@endforeach
                  	@endisset

              </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>

        @if (Auth::user()->role != 'client')

        @include('sys.payments.AddToDefaulters')
        @include('sys.payments.RemoveFromDefaulters')
        @include('sys.payments.Pay')
        @include('sys.payments.Delete')


        @endif
