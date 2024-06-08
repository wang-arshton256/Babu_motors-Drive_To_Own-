<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drive To Own</title>

 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">


    <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">


  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


  <link rel="stylesheet" type="text/css" href="{{ url('dt/datatables.min.css') }}"/>
   <link rel="stylesheet" href="{{ url('dist/css/lightgallery.css') }}">
   <link rel="stylesheet" href="{{ url('css/fotorama.css') }}">
  <style type="text/css">

  	body, html, tr, a, table, span, div, h1, h2, h3, h4, h5, h6, tr, td, th, button, form , input, label{


  		 font-family: Ubuntu, "times new roman", times, roman, serif !important;
  	}

  	table,td,th,tr,tbody,tfoot {

  		font-size: 11px !important;


  	}
   td{

        padding: 5px !important;

    }


    .card_carphotos {
        margin: 0 auto  !important; /* Added */
        float: none; !important /* Added */
        margin-bottom: 10px !important; /* Added */
}


@if (Auth::user()->role == 'staff')

  .hideforstaff {

    display: none !important;
  }

@endif
</style>
</head>
