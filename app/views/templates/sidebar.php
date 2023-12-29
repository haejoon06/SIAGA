      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= BASEURL; ?>/home" class="text-nowrap logo-img">
              <img src="<?= BASEURL; ?>/images/logos/dark-logo.svg" width="180" height="100" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M18 6l-12 12" />
                  <path d="M6 6l12 12" />
                </svg></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/home" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <!-- Master User - Only for Owner -->
              <?php
              if (isset($_SESSION['role_tmu']) && $_SESSION['role_tmu'] == 'Owner') {
                echo '
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Master User</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="' ?><?= BASEURL; ?><?= '/user" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M16 19h6" />
                    <path d="M19 16v6" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                  </svg></i>
                  </span>
                  <span class="hide-menu">User</span>
                </a>
              </li>';
                                                                } ?>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Master Data</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/obat" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medicine-syrup" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 21h8a1 1 0 0 0 1 -1v-10a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v10a1 1 0 0 0 1 1z" />
                        <path d="M10 14h4" />
                        <path d="M12 12v4" />
                        <path d="M10 7v-3a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Obat</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/kategori" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 4h6v6h-6z" />
                        <path d="M14 4h6v6h-6z" />
                        <path d="M4 14h6v6h-6z" />
                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Kategori</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/unit" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 5h8" />
                        <path d="M13 9h5" />
                        <path d="M13 15h8" />
                        <path d="M13 19h5" />
                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Jenis</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/supplier" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-factory-2" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21h18" />
                        <path d="M5 21v-12l5 4v-4l5 4h4" />
                        <path d="M19 21v-8l-1.436 -9.574a.5 .5 0 0 0 -.495 -.426h-1.145a.5 .5 0 0 0 -.494 .418l-1.43 8.582" />
                        <path d="M9 17h1" />
                        <path d="M14 17h1" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Supplier</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Stok</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/opname" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M9 12l.01 0" />
                        <path d="M13 12l2 0" />
                        <path d="M9 16l.01 0" />
                        <path d="M13 16l2 0" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Opname</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/expire" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M12 10l0 3l2 0" />
                        <path d="M7 4l-2.75 2" />
                        <path d="M17 4l2.75 2" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Expire</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Transaction</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/pembelian" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Pembelian</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/penjualan" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Penjualan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/hutang" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21l18 0" />
                        <path d="M3 10l18 0" />
                        <path d="M5 6l7 -3l7 3" />
                        <path d="M4 10l0 11" />
                        <path d="M20 10l0 11" />
                        <path d="M8 14l0 3" />
                        <path d="M12 14l0 3" />
                        <path d="M16 14l0 3" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Hutang</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/pembayaran" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                        <path d="M3 10l18 0" />
                        <path d="M7 15l.01 0" />
                        <path d="M11 15l2 0" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Pembayaran</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Laporan</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/laporan_obat" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M10 14l4 0" />
                        <path d="M12 12l0 4" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Laporan Obat</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= BASEURL; ?>/laporan_keuangan" aria-expanded="false">
                  <span>
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-money" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                        <path d="M12 17v1m0 -8v1" />
                      </svg></i>
                  </span>
                  <span class="hide-menu">Laporan Keuangan</span>
                </a>
              </li>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->