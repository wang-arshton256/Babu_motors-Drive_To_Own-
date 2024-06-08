@isset($ReturnCars)
                      @foreach ($ReturnCars as $data)<!-- The Modal -->
<div class="modal" id="ViewMore{{ $data->id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">More about the car model

          <span class="text-danger font-weight-bold">

            {{ $data->model }}
          </span>

        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


 <div class="table-responsive">
                <table  class=" table table-bordered table-striped ">
                  <thead>
                  <tr>


                    <th>Color</th>
                    <th>Body</th>
                    <th>Engine</th>
                    <th>Fuel</th>
                    <th>Transmision</th>


                  </tr>
                  </thead>
                  <tbody>

                    <tr>


                        <td>{{ $data->color }}</td>
                        <td>{{ $data->body_type }}</td>
                        <td>{{ $data->engine_type }}</td>
                        <td>{{ $data->fuel_type }}</td>
                        <td>{{ $data->transmission_type }}</td>





                    </tr>


              </tbody>
                </table>
              </div>
            <!-------End Table---->
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
