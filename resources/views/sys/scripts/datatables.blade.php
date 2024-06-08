<script type="text/javascript" src="{{ url('dt/datatables.min.js') }}"></script>

<script type="text/javascript">

	$(document).ready(function() {
    $('.wangs_table').DataTable({

        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'colvis'
        ]

    });
} );

</script>
