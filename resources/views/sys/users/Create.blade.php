<div class="modal" id="CreateUser">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New User Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST"  action="{{ route('CreateUserRole') }}">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <!-- text input -->
              <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" required >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username (Email)</label>
                <input name="email" type="email" class="form-control" required >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Password</label>
                <input name="password" type="text" class="form-control" required >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Confirm Password</label>
                <input name="password_confirmation" type="text" class="form-control" required >
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label>Role</label>

                  <select class="form-control" required name="role">

                      <option value="staff">Staff</option>
                      <option value="admin">Admin</option>

                  </select>


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
