  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('dist/img/BUMNAntamLogo.png') }}" alt="BUMN Antam Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">BUMN Antam</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  {{-- <a href="#" class="d-block">{{ auth()->user()->username }}</a> --}}
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-header">EXAMPLES</li>
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                             Dashboard
                          </p>
                      </a>
                  </li>

                  {{-- admin --}}
                  <li class="nav-item has-treeview {{ Request::is('admin/divisi*')?'menu-open':'' }}">
                      <a href="#" class="nav-link {{ Request::is('admin/divisi*')?'active':'' }}">
                          <i class="nav-icon fa fa-sitemap"></i>
                          <p>
                              Divisi
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/admin/divisi/create"
                                  class="nav-link {{ Request::is('admin/divisi/create')?'active':'' }}">
                                  <i class="fa fa-plus nav-icon"></i>
                                  <p>Tambah Divisi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/admin/divisi" class="nav-link {{ Request::is('admin/divisi')?'active':'' }}">
                                  <i class="fa fa-list nav-icon"></i>
                                  <p>List Divisi</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
