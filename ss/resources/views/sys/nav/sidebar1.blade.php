

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Drive To Own</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <i class="img-circle  fa-2x  text-light fas fa-user-check" alt="User Image"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                     @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
             <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-car"></i>
              <p>
               Cars
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ManageCars') }}" class="nav-link ">
                  <i class="fas fa-clock nav-icon"></i>
                  <p>Manage Cars</p>
                </a>
              </li>


            </ul>
          </li>
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Applications
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ManageApps') }}" class="nav-link ">
                  <i class="fas fa-wrench nav-icon"></i>
                  <p>Manage Applications</p>
                </a>
              </li>




            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Payments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{ route('SelectBeneficiary') }}" class="nav-link ">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Record Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Defaulters') }}" class="nav-link ">
                  <i class="fas fa-times nav-icon"></i>
                  <p>Defaulters' List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ClosedSales') }}" class="nav-link ">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Completed Payments</p>
                </a>
              </li>



            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('Dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-area"></i>
              <p>
                Statistics

              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Beneficiaries
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ManageBeneficiaries') }}" class="nav-link ">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Manage Beneficiaries</p>
                </a>
              </li>


            </ul>
          </li>
          @endif
@if (Auth::user()->role == 'client')
  <li class="nav-item">
            <a href="{{ route('BeneficiarySelectedMyProfile') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                My Profile

              </p>
            </a>
          </li>
@endif


@if (Auth::user()->role == 'admin')
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
               User Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('ManageUsers') }}" class="nav-link ">
                  <i class="fas fa-wrench nav-icon"></i>
                  <p>Admin and Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ManageCleintsUsers') }}" class="nav-link ">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Beneficiary Accounts</p>
                </a>
              </li>


            </ul>
          </li>

    @endif

          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout

              </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
