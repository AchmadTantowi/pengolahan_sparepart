<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(is_null(Auth::user()->avatar))
          <img src="https://s3.amazonaws.com/wll-community-production/images/no-avatar.png" class="img-circle" alt="User Image">
          @else
          <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        {{-- ADMIN --}}
        @if (Auth::user()->role == "admin")
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
          <a href="{{ url('/admin/dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/user') ? 'active' : '' }}"><a href="{{ url('/admin/user') }}"><i class="fa fa-circle-o"></i> Karyawan</a></li>
            <li class="{{ Request::is('admin/sparepart') ? 'active' : '' }}"><a href="{{ url('/admin/sparepart') }}"><i class="fa fa-circle-o"></i> Sparepart</a></li>
            <li class="{{ Request::is('admin/supplier') ? 'active' : '' }}"><a href="{{ url('/admin/supplier') }}"><i class="fa fa-circle-o"></i> Supplier</a></li>

            <li class="{{ Request::is('admin/mesin') ? 'active' : '' }}"><a href="{{ url('/admin/mesin') }}"><i class="fa fa-circle-o"></i> Mesin</a></li>          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-exchange"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/request') ? 'active' : '' }}"><a href="{{ url('/admin/request') }}"><i class="fa fa-circle-o"></i> Request Barang</a></li>
            <li class="{{ Request::is('admin/received') ? 'active' : '' }}"><a href="{{ url('/admin/received') }}"><i class="fa fa-circle-o"></i> Penerimaan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('admin/laporan') ? 'active' : '' }}"><a href="{{ url('/admin/laporan') }}"><i class="fa fa-circle-o"></i> Kerusakan Mesin</a></li>
          </ul>
        </li>
        @endif

        {{-- MEKANIK --}}
        @if (Auth::user()->role == "mekanik")
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
          <a href="{{ url('/admin/dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="{{ Request::is('admin/request-sparepart') ? 'active' : '' }}">
          <a href="{{ url('/admin/request-sparepart') }}">
          <i class="fa fa-edit"></i> <span>Form Request Sparepart</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="{{ Request::is('admin/history-peminjaman') ? 'active' : '' }}">
          <a href="{{ url('/admin/history-peminjaman') }}">
          <i class="fa fa-tasks"></i> <span>History Peminjaman</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        @endif
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>