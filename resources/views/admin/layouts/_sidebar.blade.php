<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        {{-- PEMILIK --}}
        @if (Auth::user()->position == "Pemilik")
          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Home</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/customer') ? 'active' : '' }}">
            <a href="{{ url('/admin/customer') }}">
            <i class="fa fa-users"></i> <span>Customer</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/order') ? 'active' : '' }}">
            <a href="{{ url('/admin/order') }}">
            <i class="fa fa-users"></i> <span>Orders</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/product') ? 'active' : '' }}">
            <a href="{{ url('/admin/product') }}">
            <i class="fa fa-briefcase"></i> <span>Product</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/contact') ? 'active' : '' }}">
            <a href="{{ url('/admin/contact') }}">
            <i class="fa fa-phone"></i> <span>Contact</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/testimoni') ? 'active' : '' }}">
            <a href="{{ url('/admin/testimoni') }}">
            <i class="fa fa-wechat"></i> <span>Testimoni</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/confirm') ? 'active' : '' }}">
            <a href="{{ url('/admin/confirm') }}">
            <i class="fa fa-print"></i> <span>Confirm Payment</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/work-order') ? 'active' : '' }}">
            <a href="{{ url('/admin/work-order') }}">
            <i class="fa fa-file-word-o"></i> <span>Work Order</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/bank') ? 'active' : '' }}">
            <a href="{{ url('/admin/bank') }}">
            <i class="fa fa-file-word-o"></i> <span>Bank Account</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
            <a href="{{ url('/admin/user') }}">
            <i class="fa fa-user"></i> <span>User</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        @endif

        {{-- ADMIN --}}
        @if (Auth::user()->position == "Admin")
          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Home</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/customer') ? 'active' : '' }}">
            <a href="{{ url('/admin/customer') }}">
            <i class="fa fa-users"></i> <span>Customer</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/order') ? 'active' : '' }}">
            <a href="{{ url('/admin/order') }}">
            <i class="fa fa-users"></i> <span>Orders</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/contact') ? 'active' : '' }}">
            <a href="{{ url('/admin/contact') }}">
            <i class="fa fa-phone"></i> <span>Contact</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/testimoni') ? 'active' : '' }}">
            <a href="{{ url('/admin/testimoni') }}">
            <i class="fa fa-wechat"></i> <span>Testimoni</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/confirm') ? 'active' : '' }}">
            <a href="{{ url('/admin/confirm') }}">
            <i class="fa fa-print"></i> <span>Confirm Payment</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="{{ Request::is('admin/work-order') ? 'active' : '' }}">
            <a href="{{ url('/admin/work-order') }}">
            <i class="fa fa-file-word-o"></i> <span>Work Order</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>