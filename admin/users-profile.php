<?php
include '../conn.php';
session_start();
if (empty($_SESSION['email'])) {
?>
  <script>
    alert("Session Expired Please Login Again");
    location.href = '../index.html';
  </script>
<?php
} else {
  $e = $_SESSION['email'];
  $get_admin_det = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$e'");
  $admin = mysqli_fetch_object($get_admin_det);
  $fullname  = $admin->fullname;
  $contact  = $admin->contact;
  $address  = $admin->address;
  $email  = $admin->email;
  $password  = $admin->password;
  $id = $admin->id;
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HAWAK KAMAY SCHOLARSHIP HUB: INFORMATION TECHNOLOGY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center shadow" style="background:#198754 ;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/2.png" alt="" width="10%">

        <span class="d-none d-lg-block text-light">Admin: Duty Finder</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div><!-- End Logo -->

   
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $fullname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fullname ?></h6>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center text-dark" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center text-dark" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar bg-success">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed bg-success fw-bold text-light" href="index.php">
      <i class="bi bi-grid text-light"></i>
      <span class="btn btn-success">DASHBOARD</span>
    </a>



    <a class="nav-link collapsed bg-success fw-bold text-light" href="account.php">
      <i class="bi bi-person text-light"></i>
      <span class="btn btn-success">ACCOUNTS</span>
    </a>

    <a class="nav-link collapsed bg-success fw-bold text-light" href="department.php">
      <i class="bi bi-building text-light"></i>
      <span class="btn btn-success">DEPARTMENT</span>
    </a>

    <a class="nav-link collapsed bg-success fw-bold text-light" href="view.php">
      <i class="bi bi-eye text-light"></i>
      <span class="btn btn-success">VIEW POST</span>
    </a>

    <a class="nav-link collapsed bg-success fw-bold text-light" href="announcement.php">
      <i class="bi bi-megaphone text-light"></i>
      <span class="btn btn-success">ANNOUNCEMENT</span>
    </a>

  </li><!-- End Dashboard Nav -->

  <!-- End Components Nav -->

  <!-- End Forms Nav -->

  <!-- End Tables Nav -->

  <!-- End Charts Nav -->

  <!-- End Icons Nav -->

  <!-- End Profile Page Nav -->

  <!-- End F.A.Q Page Nav -->

  <!-- End Contact Page Nav -->

  <!-- End Register Page Nav -->

  <!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-dark">Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php" class=" btn btn-light text-dark">Home</a></li>
          <li class="breadcrumb-item btn btn-light text-dark">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-5">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                    Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2 ">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
  
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $admin->fullname ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $admin->address ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $admin->contact ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $admin->email ?></div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Password:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $admin->password ?></div>
                  </div>

                </div>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="process.php?id=<?php echo$id?>" method="POST"> 
                  <div class="row mb-12">
                    
                    <div class="col-md-8 col-lg-9">
                      <div class="pt-1">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Fullname" class="col-md-4 col-lg-3 col-form-label">Full
                      Name:</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="fullname" type="text" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address:</label>
                    <div class="col-lg-9 col-md-8">
                      <input type="text" name="address" type="text" class="form-control" id="Address" value="<?php echo $address ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Contact" class="col-md-4 col-lg-3 col-form-label">Contact:</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="contact" type="text" class="form-control" id="Contact" value="<?php echo $contact ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email:</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="" name="email" type="email" class="form-control" id="Email" value="<?php echo $email ?>" readonly>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Password" class="col-md-4 col-lg-3 col-form-label">Password:</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="myInput" value="<?php echo $password ?>">
                    </div>


                  </div>
                  <input type="checkbox" onclick="myFunction()"> Show password

                  <script>
                    function myFunction() {
                      var x = document.getElementById("myInput");
                      if (x.type === "password") {
                        x.type = "text";
                      } else {
                        x.type = "password";
                      }
                    }
                  </script>
                  <div class="text-center">
                    <input type="submit" name="update_profile" class="btn btn-primary" value="Save Changes">
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                      Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                      Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                      New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 50%">
    <div class="copyright">
      &copy; Copyright <strong><span>RSR</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">RSR</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center bg-success"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>