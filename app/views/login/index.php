<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $data['judul']?></title>
  <link rel="shortcut icon" type="image/png" href="<?= BASEURL; ?>/images/logos/favicon-2.png" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.min.css" />
  <style>
    .invalid-feedback {
      color: red;
      display: none;
    }
  </style>
  <script>
    function validateForm() {
        var username = document.getElementById("exampleInputUsername1").value;
        var password = document.getElementById("exampleInputPassword1").value;

        if (username.trim() === "" || password.trim() === "") {
            document.getElementById("validation-error").style.display = "block";
            return false;
        }

        return true
      }
  </script>
</head>

<body>
  <!-- <?php
  if (isset($error_message)) {
    echo '<p style="color: red;">' . $error_message . '</p>';
  }
  ?> -->
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="index" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?= BASEURL; ?>/images/logos/logo.png" width="180" alt="">
                </a>
                <p class="text-center">Login to system</p>
                <form action="<?= BASEURL; ?>/home" method="post" onsubmit="validateForm()">
                  <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" required>
                    <div class="invalid-feedback">
                      Please input a username.
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    <div class="invalid-feedback">
                      Please input a password.
                    </div>
                  </div>
                  <div class="invalid-feedback" id="validation-error">
                    Please fill in both username and password.
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remember this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                  </div>
                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit" name="submit">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= BASEURL; ?>libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= BASEURL; ?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
