  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('dist/img/Logo.png') }}" alt="BUMN Antam Logo"
              class="brand-image img-circle elevation-3 bg-white p-1" style="opacity: .8">
          <span class="brand-text font-weight-light">BUMN Antam</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('dist/img/default-profile.png') }}" class="img-circle elevation-2 p-1 bg-white" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->username }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  @if (auth()->user()->role_id == 2)
                  <li class="nav-header">ADMIN</li>
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard')?'active':'' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

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
                  
                  <li class="nav-item {{ Request::is('admin/pengajuan-cuti*')?'menu-open':'' }}">
                    <a href="{{ route('admin.pengajuan-cuti.index') }}" class="nav-link {{ Request::is('admin/pengajuan-cuti*')?'active':'' }}">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>
                            Pengajuan Cuti
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pengajuan-cuti.create') }}"
                                class="nav-link {{ Request::is('admin/pengajuan-cuti/create')?'active':'' }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Tambah Pengajuan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pengajuan-cuti" class="nav-link {{ Request::is('admin/pengajuan-cuti')?'active':'' }}">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Pengajuan Cuti</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('admin/pegawai*')?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/pegawai*')?'active':'' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pegawai
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/pegawai/create"
                                class="nav-link {{ Request::is('admin/pegawai/create')?'active':'' }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Tambah Pegawai Baru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pegawai" class="nav-link {{ Request::is('admin/pegawai') ?'active':'' }}">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.presensi.index') }}" class="nav-link {{ Request::is('admin/presensi*')?'active':'' }}">
                        <i class="nav-icon fas fa-check"></i>
                        <p>
                            Presensi
                        </p>
                    </a>
                </li>

				<li class="nav-item {{ Request::is('admin/inbox*')?'menu-open':'' }}">
                    <a href="{{ route('admin.inbox.index') }}" class="nav-link {{ Request::is('admin/inbox*')?'active':'' }}">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Inbox
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/inbox" class="nav-link {{ Request::is('admin/inbox') ?'active':'' }}">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Inbox Masuk</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="/admin/inbox/send" class="nav-link {{ Request::is('admin/inbox/send') ?'active':'' }}">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Inbox Terkirim</p>
                            </a>
                        </li>
                    </ul>
                </li>


                    @elseif (auth()->user()->role_id == 1)
                    <li class="nav-header">PEGAWAI</li>
                    <li class="nav-item">
                        <a href="{{ route('pegawai.dashboard') }}" class="nav-link {{ Request::is('pegawai/dashboard')?'active':'' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pegawai.presensi.index') }}" class="nav-link {{ Request::is('pegawai/presensi*') ?'active':'' }}">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                                Presensi
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ Request::is('pegawai/pengajuan-cuti*')?'menu-open':'' }}">
                    <a href="#" class="nav-link {{ Request::is('pegawai/pengajuan-cuti*')?'active':'' }}">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>
                            Pengajuan Cuti
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pegawai/pengajuan-cuti/create"
                                class="nav-link {{ Request::is('pegawai/pengajuan-cuti/create')?'active':'' }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Ajukan Cuti</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pegawai/pengajuan-cuti" class="nav-link {{ Request::is('pegawai/pengajuan-cuti')?'active':'' }}">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                    </ul>
                    <li class="nav-item">
                        <a href="{{ route('pegawai.cek-gaji.index') }}" class="nav-link {{ Request::is('pegawai/cek-gaji')?'active':'' }}">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>
                                Cek Gaji
                            </p>
                        </a>
                    </li>
                </li>

                  <li class="nav-item has-treeview {{ Request::is('pegawai/inbox*')?'menu-open':'' }}">
                      <a href="#" class="nav-link {{ Request::is('pegawai/inbox*')?'active':'' }}">
                          <i class="nav-icon fa fa-envelope"></i>
                          <p>
                              Kontak Admin
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/pegawai/inbox/create"
                                  class="nav-link {{ Request::is('pegawai/inbox/create')?'active':'' }}">
                                  <i class="fa fa-plus nav-icon"></i>
                                  <p>Kirim Pesan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/pegawai/inbox" class="nav-link {{ Request::is('pegawai/inbox')?'active':'' }}">
                                  <i class="fa fa-list nav-icon"></i>
                                  <p>Pesan Terkirim</p>
                              </a>
                          </li>
						  <li class="nav-item">
							<a href="/pegawai/inbox/pesanMasuk" class="nav-link {{ Request::is('pegawai/inbox/pesanMasuk')?'active':'' }}">
								<i class="fa fa-list nav-icon"></i>
								<p>Pesan Masuk</p>
							</a>
						</li>
                      </ul>
                  </li>
                  @endif
				  
				  @if (auth()->user()->role_id == 2)
					<li class="nav-header">PAGES</li>
					<li class="nav-item">
						<a href="{{ route('admin.about.index') }}" class="nav-link {{ Request::is('admin/about*')?'active':'' }}">
							<i class="nav-icon far fa-address-card"></i>
							<p>
								About
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview {{ Request::is('admin/article*')?'menu-open':'' }}">
						<a href="#" class="nav-link {{ Request::is('admin/article*')?'active':'' }}">
							<i class="nav-icon fa fa-envelope"></i>
							<p>
								Artikel
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="/admin/article/create"
									class="nav-link {{ Request::is('admin/article/create')?'active':'' }}">
									<i class="fa fa-plus nav-icon"></i>
									<p>Buat Artikel</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="/admin/article" class="nav-link {{ Request::is('admin/article')?'active':'' }}">
									<i class="fa fa-list nav-icon"></i>
									<p>Semua Artikel</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="{{ route('admin.contact.index') }}" class="nav-link {{ Request::is('admin/contact*')?'active':'' }}">
							<i class="nav-icon fas fa-map-marker-alt"></i>
							<p>
								Contact
							</p>
						</a>
					</li>
				  @endif

				  <li class="nav-item">
					<a href="{{ route('logout') }}" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Sign Out
						</p>
					</a>
				  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
