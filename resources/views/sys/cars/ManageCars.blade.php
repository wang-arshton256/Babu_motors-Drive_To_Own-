 <div class="col-md-12">
<div class="margin">
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger ">Choose Action</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a class="dropdown-item"  href="#CreateNewCar" data-toggle="modal" >New Car</a>
                      <a data-toggle="modal" class=" hideforstaff dropdown-item" href="#DeleteCara">Delete Car</a>

                      <div class="dropdown-divider"></div>

                    </div>
                  </div>
                </div>
 <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Cars Inventory</h3>

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

                    <th>Brand</th>
                    <th>Price (UGX)</th>
                    <th>Model</th>
                    <th>Reg_No</th>
                    <th>Eng_No</th>
                    <th>Chasis_NO</th>
                    <th>Color</th>

                    <th>Update</th>
                    <th>Photos</th>


                  </tr>
                  </thead>
                  <tbody>
  @isset($ReturnCars)
                      @foreach ($ReturnCars as $data)
                    <tr>

                        <td>{{ $data->brand }}</td>
                        <td>{{number_format( $data->price, 2) }}</td>
                        <td>{{ $data->model }}</td>
                        <td>{{ $data->reg_no }}</td>
                        <td>{{ $data->eng_no }}</td>
                        <td>{{ $data->chasis_no }}</td>
                        <td>{{ $data->color }}</td>

                        <td>

                          <a href="#UpdateCar{{ $data->id }}" data-toggle="modal" class="btn btn-danger btn-sm shadow-lg ">

                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                        <td>

                          <a href="#UploadCarPhoto{{ $data->id }}" data-toggle="modal" class="btn btn-danger btn-sm shadow-lg ">

                            <i class="fas fa-plus"></i>
                          </a>


                          <a href="{{ route('ViewCarPhoto', ['id' => $data->id]) }}"  class="btn btn-dark btn-sm shadow-lg ">

                            <i class="fas fa-binoculars"></i>
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

@include('sys.cars.CreateCar')
@include('sys.cars.DeleteCar')
@include('sys.cars.UpdateCars')
@include('sys.cars.UploadPhoto')
