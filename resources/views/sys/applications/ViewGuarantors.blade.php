  @isset($ruturnApplications)
                      @foreach ($ruturnApplications as $data)<!-- The Modal -->
<div class="modal" id="ViewGuarantor{{ $data->uni }}">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">View Gurantors for the beneficiary

          <span class="text-danger font-weight-bold">{{ $data->name }}</span>

        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="max-height: 400px ; overflow-y: scroll">
 <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
                <table  class=" table table-bordered table-striped ">
                  <thead>
                  <tr>
                        <td>Guarantor  1 Name</td>
                          <td class="bg-dark text-light">Guarantor 2 Name</td>
                        <td>Guarantor 1 Phone</td>
                        <td class="bg-dark text-light">Guarantor 2 Phone</td>


                  </tr>
                  </thead>
                  <tbody>

                    <tr>

                      <td>{{ $data->g_1_name }}</td>
                      <td class="bg-dark text-light">{{ $data->g_2_name }}</td>
                      <td>{{ $data->g_1_phone }}</td>
                      <td class="bg-dark text-light"> {{ $data->g_2_phone }}</td>


                    </tr>

                  </tbody>
                </table>
              </div>
            </div>


            <div class="col-md-6">

    <div class="card shadow-lg">
  <div class="card-header">Guarantor 1 ID Scan</div>
  <div class="card-body">

    <img class="img-thumbnail img-fluid" src="{{ url($data->g_1_id_url) }}">

  </div>
  <div class="card-footer">Drive to Own</div>
</div>



            </div>

              <div class="col-md-6">


    <div class="card shadow-lg bg-dark text-light">
  <div class="card-header">Guarantor 2 ID Scan</div>
  <div class="card-body">

    <img class="img-thumbnail img-fluid" src="{{ url($data->g_2_id_url) }}">

  </div>
  <div class="card-footer">Drive to Own</div>
</div>




            </div>

      </div>

























      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 @endforeach
                    @endisset
