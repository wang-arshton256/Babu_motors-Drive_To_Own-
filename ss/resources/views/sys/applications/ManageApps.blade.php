 <div class="col-md-12">

 <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">All Applications.

                    <small class="text-danger">Applications can only be deleted before they are approved, Delete is not reversible, use it with caution </small>

                </h3>
                <a href="#CreateApps" data-toggle="modal" class="float-right btn btn-sm btn-danger shadow-lg">
                	<i class="fas fa-plus"></i> New
                </a>
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
    <div class="table-responsive">
                <table  class="wangs_table table table-bordered table-striped ">
                  <thead>
                  <tr>
                        <td>Beneficiary</td>

                        <td>Car Model</td>
                        <td class="bg-dark text-light">Amount Due</td>
                        <td>End of Payment</td>
                        <td>Backup Amount</td>
                        <td>Weekly Payment</td>
                        <td class="bg-danger text-light">Status</td>
                        <td class="">Approve</td>
                        <td class="">Delete</td>




                  </tr>
                  </thead>
                  <tbody>
                     @isset($ruturnApplications)
                      @foreach ($ruturnApplications as $data)



                    <tr>

                        <td>{{ $data->name }}</td>

                        <td>{{ $data->model }}</td>
                        <td class="bg-dark text-light">{{ number_format($data->amount,3) }} UGX</td>
                        <td>{{ $data->final_payment_date }}</td>
                        <td>{{ number_format($data->initial_payment, 2) }}</td>
                        <td>{{ number_format($data->weekly_payment, 2) }} UGX</td>
                        <td class="bg-danger text-light">{{ $data->status }}</td>
                        <td>
                           @if ($data->status == 'pending')

                    <a href="{{ route('ApproveApplication', ['id' => $data->id]) }}" class="btn btn-danger hideforstaff shadow-lg btn-sm">

                      <i class="fas fa-check"></i>

                    </a>





                        </td>

    @endif
                        <td>



                        <a href="#DeleteApp{{ $data->id }}" data-toggle="modal" class="btn btn-warning hideforstaff shadow-lg btn-sm">

                              <i class="fas fa-trash"></i>

                            </a>



                        </td>

                    </tr>

                       @endforeach
                    @endisset


              </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
@include('sys.applications.CreateApps')
@include('sys.applications.Delete')
