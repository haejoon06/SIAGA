<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Website: Sistem Apotek Mitra Galuh">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link rel="shortcut icon" type="image/png" href="<?= BASEURL; ?>/images/logos/favicon-2.png" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/datatables.min.css">
  </link>
  <style>
    body {
      background: #f6f9fc;
    }
    header {
      box-shadow: 0px 5px 21px -5px #CDD1E1;
    }

    aside {
      box-shadow: 0px 5px 21px -5px #CDD1E1;
    }
    .card {
      box-shadow: 0px 5px 21px -5px #CDD1E1;
    }
  </style>
</head>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <?php
  require_once("sidebar.php");
  ?>
  <div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse">
              <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 6l16 0" />
                  <path d="M4 12l16 0" />
                  <path d="M4 18l16 0" />
                </svg></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="#" onclick="toggleNotificationDropdown()">
              <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                  <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                  <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727" />
                  <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727" />
                </svg></i>
              <div id="notificationCount" class="notification bg-primary rounded-circle"></div>
            </a>
            <div id="notificationDropdown" class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="notificationDropdown">
              <div id="notificationList" class="message-body">
                <!-- Contoh notifikasi -->
                <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                  <p class="mb-0 fs-3">Notification 1</p>
                </a>
                <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                  <p class="mb-0 fs-3">Notification 2</p>
                </a>
                <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                  <p class="mb-0 fs-3">Notification 3</p>
                </a>
              </div>
            </div>
          </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item dropdown">
              <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= BASEURL; ?>/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg></i>
                    <p class="mb-0 fs-3">My Profile</p>
                  </a>
                  <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                        <path d="M3 7l9 6l9 -6" />
                      </svg></i>
                    <p class="mb-0 fs-3">My Account</p>
                  </a>
                  <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                    <i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3.5 5.5l1.5 1.5l2.5 -2.5" />
                        <path d="M3.5 11.5l1.5 1.5l2.5 -2.5" />
                        <path d="M3.5 17.5l1.5 1.5l2.5 -2.5" />
                        <path d="M11 6l9 0" />
                        <path d="M11 12l9 0" />
                        <path d="M11 18l9 0" />
                      </svg></i>
                    <p class="mb-0 fs-3">My Task</p>
                  </a>
                  <a href="<?= BASEURL; ?>/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--  Header End -->