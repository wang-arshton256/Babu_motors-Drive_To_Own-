  <div class="row container">
  <div class="col-md-12">
  <div class="card ">
    <div class="card-header bg-default shadow-lg">Photos for the car modal
      {{ $CarModel }}
      <a href="#CarPhotosDelete" data-toggle="modal" class="float-right btn btn-danger shadow-lg">
        <i class="fas fa-trash"></i> Delete Photo
      </a>


    </div>



          <div class="fotorama" data-nav="thumbs"  data-allowfullscreen="native">
            @isset($ReturnPhotos)
                      @foreach ($ReturnPhotos as $data)



            <a href="{{ url($data->photo_url) }}"><img src="{{ url($data->photo_url) }}" width="144" height="96"></a>

            @endforeach
                    @endisset
          </div>
      </div>
    </div>
  </div>


<!-- The Modal -->
<div class="modal" id="CarPhotosDelete">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Car Photos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body row" style="max-height: 400px; overflow-y: scroll">
      @isset($ReturnPhotos)
                      @foreach ($ReturnPhotos as $data)

              <div class="col-md-12">


    <div class="card shadow-lg bg-dark text-light">
  <div class="card-header">Car Model
      <span class="text-danger font-weight-bold">

        {{ $CarModel }}
      </span>

  </div>
  <div class="card-body">

    <img class="img-thumbnail img-fluid" src="{{ url($data->photo_url) }}">

  </div>
  <div class="card-footer">

   <a href="{{ route('DeleteCarPhotos', ['id' => $data->id]) }}" class="btn btn-danger btn-lg"><i class="fas fa-trash f-2x"></i></a>

  </div>
</div>
            </div>

             @endforeach
                    @endisset

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
