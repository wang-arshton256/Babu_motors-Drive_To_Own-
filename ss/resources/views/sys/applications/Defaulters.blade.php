<div class="col-md-12">
  <div class="card mt-2">
    <div class="card-header">
      <h3 class="card-title">Defaulter's List
      </h3>
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
              <td class="bg-primary text-light">Backup Available</td>
              <td>Weekly Payment</td>
              <td class="bg-danger text-light">Status</td>
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
              <td class="bg-primary text-light">{{ number_format($data->initial_payment, 3) }} UGX</td>
              <td>{{ number_format($data->weekly_payment,3) }} UGX</td>
              <td class="bg-danger text-light">{{ $data->status }}</td>
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
