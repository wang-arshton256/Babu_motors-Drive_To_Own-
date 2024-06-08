<!-- ./col -->
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-primary">
    <div class="inner">
      <h6>{{ $Cars }} </h5>
      <p>Cars Sold</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-car-side"></i>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-primary">
    <div class="inner">
      <h6>{{ $Cars_sum }} </h5>
      <p>Cars Registered</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-car-side"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-info">
    <div class="inner">
      <h6>{{ number_format($Rev,2) }} UGX</h6>
      <p> Gross Car Revenue</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-comments-dollar"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-dark">
    <div class="inner">
      <h6>{{ number_format($ActualCarSales,2) }} UGX</h6>
      <p> Actual Car Revenue</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-comments-dollar"></i>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-danger">
    <div class="inner">
      <h6>{{ number_format($Rev-$ActualCarSales,2) }} UGX</h6>
      <p> Beneficiary Debt</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-comments-dollar"></i>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-danger">
    <div class="inner">
      <h6>{{$Df}} </h6>
      <p>Total Defaulters</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-users-slash"></i>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-dark">
    <div class="inner">
      <h6>{{ $Admin }} </h6>
      <p>Admin Accounts</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-user-lock"></i>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-info">
    <div class="inner">
      <h6>{{ $Client }} </h6>
      <p>Client Accounts</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-user-friends"></i>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <!-- small box -->
  <div class="small-box shadow-lg bg-primary">
    <div class="inner">
      <h6>{{ $Staff }} </h6>
      <p>Staff Accounts</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-user-circle"></i>
    </div>
  </div>
</div>
<div class="col-lg-6">
  <!-- small box -->
  <div class="small-box shadow-lg bg-primary">
    <div class="inner">
      <h6>{{ $Closed }} </h6>
      <p>Completed Payments</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-check"></i>
    </div>
  </div>
</div>
<div class="col-lg-6">
  <!-- small box -->
  <div class="small-box shadow-lg bg-dark">
    <div class="inner">
      <h6>{{ $Readt2Close }} </h6>
      <p>Almost Complete Payments</p>
    </div>
    <div class="icon">
      <i style="font-size: 25px" class="fas text-light fa-coins"></i>
    </div>
  </div>
</div>
