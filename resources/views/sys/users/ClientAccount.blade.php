 <div class="col-md-12">

 <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Cleint Account List</h3>
                <a href="#CreateUserdd" data-toggle="modal" class="float-right btn btn-sm btn-danger shadow-lg">
                	<i class="fas fa-plus"></i> New Client Account
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
                    <th>Username</th>
                    <th>Role</th>
                    <th>Delete</th>


                  </tr>
                  </thead>
                  <tbody>
                  	@isset($Users)
                  		@foreach ($Users as $data)
                      <tr>

                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->role }}</td>
                        <td>
                           <a data-toggle="modal" class="btn btn-sm btn-danger shadow-lg" href="#DeleteClient{{ $data->id }}">

                                Delete Client

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
@include('sys.users.Create')
@include('sys.users.CreateAccount')
@include('sys.users.DeleteClient')
