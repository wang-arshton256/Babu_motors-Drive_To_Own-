<div class="modal" id="RemoveFromDefaulters">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Rmove the beneficiary

          <span class="text-danger font-weight-bold">

            {{ $Beneficiary }}
          </span>

            from defaulters
        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="jumbotron">

            <p>Are you sure you want to remove this beneficiary from the defaulters list ?</p>

        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
        <a href="{{ route('RemoveFromDefaulters', ['id' => $id]) }}" class="btn btn-danger shadow-lg"> Yes</a>
      </div>

    </div>
  </div>
</div>
