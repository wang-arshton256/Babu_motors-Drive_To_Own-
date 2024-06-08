


  @if (session('status'))

    <script type="text/javascript">

			   $(function() {

		        Swal.fire('Information', '{{ session("status") }}', 'success');

				});
	</script>

 @endif

 @if (session('error_a'))

    <script type="text/javascript">

         $(function() {

            Swal.fire('Information', '{{ session("error_a") }}', 'error');

        });
  </script>

 @endif
