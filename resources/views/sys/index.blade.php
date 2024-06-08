@include('sys.header.header')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('sys.nav.topnav')

@include('sys.nav.sidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
<div class="content">
      <div class="container-fluid">

        <div class="row">

            @isset($Title)
         <div class="col-md-12 mt-2">

           <div class="alert alert-heading shadow-lg">
              {{ $Title }}

           </div>
          </div>
            @endisset



            @isset($Page)
                @include($Page)
            @endisset

        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('sys.footer.footer')
