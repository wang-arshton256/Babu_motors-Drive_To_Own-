 <div class="col-12">
 <div class="card card-default">
          <div class="card-header">
          <h3 class="card-title">
        Select the beneficiary whose payment is to be tracked (Only beneficiaries with approved applications are shown)

</h3>
            <i class="fas float-right fa-users fa-2x fa-fw"></i>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
               <form method="POST" action="{{ route('BeneficiarySelected') }}">

                 @csrf
                 <div class="row">
                <div class="col-md-12">
                 <div class="form-group">

                  <label> Select Beneficiary</label>
                  <select name="id" required class="getdesc form-control select2bs4" style="width: 100%;">
                     <option selected="selected"></option>
                    @isset($ruturnBeneficiary)
                        @foreach ($ruturnBeneficiary as $data)


                    <option value="{{ $data->id }}">{{ $data->name}}</option>

                        @endforeach
                    @endisset

                  </select>
                </div>
              </div>

              </div>

                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">

          <button  type="submit" class="btn btn-sm float-right btn-danger shadow-lg">

              <i class="fas fa-check "></i> next step

          </button>

  </form>


          </div>
        </div>
      </div>
