 <div class="col-md-12">

 <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Beneficiaries</h3>
                <a href="#CreateNewBen" data-toggle="modal" class="float-right btn btn-sm btn-danger shadow-lg">
                	<i class="fas fa-plus"></i> New Beneficiary
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
                <table  class="wangs_table table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>phone 1</th>
                    <th>phone 2</th>
                    <th>ID Scan</th>
                    <th>Actions</th>

                  </tr>
                  </thead>
                  <tbody>
                  	@isset($ruturnBeneficiary)
                  		@foreach ($ruturnBeneficiary as $data)
                  <tr>
                  	<td>{{ $data->name }}</td>
                  	<td>{{ $data->email }}</td>
                  	<td>{{ $data->address }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->phone2 }}</td>
                  	<td id="lightgallery{{ $data->id }}">
                  		<a href="{{ url($data->id_url) }}"  class="btn btn-sm btn-primary float-left">

                  				<i class="fas fa-binoculars"></i>

                  		</a>
                  	</td>



                  	<td>
                  			<a href="#UpdateBeneficiary{{ $data->id }}" class="btn btn-sm btn-warning float-left" data-toggle="modal">

                  				<i class="fas fa-edit"></i>

                  			</a>

                  			<a href="#DeleteBen{{ $data->id }}" data-toggle="modal" class="btn btn-sm btn-danger hideforstaff float-right">

                  				<i class="fas fa-trash"></i>

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

@include('sys.beneficiaries.CreateBeneficiaryModal')
@include('sys.beneficiaries.UpdateBeneficiary')
@include('sys.beneficiaries.Delete')
