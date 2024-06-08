

@isset($ruturnBeneficiary)
                      @foreach ($ruturnBeneficiary as $data)

<!-- The Modal -->
<div class="modal" id="DeleteBen{{ $data->id }}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
       <h4 class="modal-title text-danger">Confirm Delete Beneficiary</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

            <div class="col-md-12">

            <div class="jumbotron ">

              Are you sure you want to delete the beneficiary <span class="text-danger font-weight-bold"> {{ $data->name }}</span>

              <p>
                This is action is not reversible and will delete all records associated to this beneficiary
              </p>

              <p>To confirm the delete, enter the pass-phrase (lower case) <span class="text-danger font-weight-bold">

                yes delete

              </span> in the text box provided below and the <span class="font-weight-bold text-danger"> confirm delete button </span> will appear, Click it to effect the changes</p>
              <hr class="mt-2 mb-2">

              <input type="text" class="pass-phrase form-control" placeholder="Enter pass-phrase ">

            </div>


      </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="{{ route('DeleteBeneficiary', ['id' =>$data->id ]) }}" class="btn confirmdelete btn-danger shadow-lg" style="display: none">Confirm Delete</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endforeach
                    @endisset
