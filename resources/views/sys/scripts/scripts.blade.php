

<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ url('js/custom.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ url('plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('js/fotorama.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	$(function () {




	//Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $('#reservationdate').datetimepicker({
        format: 'L',

    });
    });
</script>

    <!-- lightgallery plugins -->
    <script src="{{ url('dist/js/lightgallery.min.js') }}"></script>


<script type="text/javascript">

                        @isset($ruturnBeneficiary)
                  		@foreach ($ruturnBeneficiary as $data)

document.addEventListener("DOMContentLoaded", function() {

lightGallery(document.getElementById('lightgallery{{ $data->id }}'));

});


	               @endforeach
                  	@endisset


</script>

<!-- AdminLTE App -->
<script src="{{ url('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@include('sys.scripts.datatables')
@include('sys.scripts.CustomFileInput')
@include('sys.scripts.sweetalert')
@include('sys.scripts.fotorama')
@include('sys.scripts.JsNumericPlugin')


<script type="text/javascript">

  $(function () {



     $(document).on( "keyup", ".pass-phrase", function() {

        var passphrase = $(this).val();

        if(passphrase == 'yes delete') {

          $('.confirmdelete').show()

        }else{

             $('.confirmdelete').hide()
        }


     });


    $(document).on( "keyup", ".currency", function() {

      var number = $(this).val();

      var ConvertedToInt = parseInt(number);

      var OutPut = $.number( ConvertedToInt, 2 )

        $(".scrn").html(OutPut);



    });

     $(document).on( "keyup", ".currency2", function() {

      var number = $(this).val();

      var ConvertedToInt = parseInt(number);

      var OutPut = $.number( ConvertedToInt, 2 )

        $(".scrn2").html(OutPut);



    });
    });









</script>
@include('sys.notifications.not')


<script src="{{ url('dist/js/adminlte.js') }}"></script>
