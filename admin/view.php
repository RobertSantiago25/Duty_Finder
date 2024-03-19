<?php
include '../conn.php';
session_start();
if (empty($_SESSION['email'])) {
?>
  <script>
    alert("Session Expired Please Login Again");
    location.href = '../index.php';
  </script>
<?php
} else {
  $e = $_SESSION['email'];
  $get_admin_det = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$e'");
  while ($admin = mysqli_fetch_object($get_admin_det)) {
    $fullname  = $admin->fullname;
    $contact  = $admin->contact;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HK: DUTY FINDER</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../admin/assets/img/logo.png" rel="icon">
  <link href="../admin/assets/img/logo.png" rel="apple-touch-icon">

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
      <i class="bi bi-list toggle-sidebar-btn text-white "></i>
    </div><!-- End Logo -->


    </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto ">
      <ul class="d-flex align-items-center ">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!-- End Notification Nav -->

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $fullname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $fullname ?></h6>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <aside id="sidebar" class="sidebar bg-success">

    <ul class="sidebar-nav " id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed bg-success text-light fw-bold" href="index.php">
          <i class="bi bi-grid text-light"></i>
          <span class="btn btn-success">DASHBOARD</span>
        </a>


        <a class="nav-link collapsed bg-success  text-light fw-bold" href="account.php">
          <i class="bi bi-person text-light"></i>
          <span class="btn btn-success">ACCOUNTS</span>
        </a>

        <a class="nav-link collapsed bg-success  text-light fw-bold" href="department.php">
          <i class="bi bi-building text-light"></i>
          <span class="btn btn-success">DEPARTMENT</span>
        </a>

        <a class="nav-link bg-success  text-light fw-bold" href="view.php">
          <i class="bi bi-eye text-light"></i>
          <span class="btn btn-success fw-bold">VIEW POST</span>
        </a>

        <a class="nav-link collapsed bg-success  text-light fw-bold" href="announcement.php">
          <i class="bi bi-megaphone text-light"></i>
          <span class="btn btn-success">ANNOUNCEMENT</span>
        </a>

        
      <li class="nav-item ">
        <a class="nav-link collapsed bg bg-success" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide text-light"></i><span class="text-light">HK Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse text-light" data-bs-parent="#sidebar-nav">
        <li>
            <a href="archive.php">
              <i class="bi bi-circle text-light"></i><span class="text-light p-2 btn btn-success">Archive</span>
            </a>
          </li>

          <li>
            <a href="set-sem.php">
              <i class="bi bi-circle text-light"></i><span class="text-light p-2  btn btn-success">Semester</span>
            </a>
          </li>

          <li>
            <a href="designation.php">
              <i class="bi bi-circle text-light"></i><span class="text-light p-2 btn btn-success">Scholars Designation</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

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

    <div class="pagetitle text-dark">
      <h1 class="text-dark">VIEW POST</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php" class="text-dark btn btn-light">Home</a></li>
          <li class="breadcrumb-item text-dark  btn btn-light">View Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="vh-100" style="background-color: #f4f5f7;">

      <div class="container py-3 " style="margin-right: 100x;">
        <div class="row d-flex  h-100">

          <?php
          $get_post = mysqli_query($conn, "SELECT * FROM post WHERE semester = '$semester' AND school_year = '$school_year'");
          while ($post = mysqli_fetch_array($get_post)){
            $profile = $post['faculty_email'];
            $get_profile = mysqli_query($conn,"SELECT * FROM faculties WHERE email = '$profile'");
            while($profile = mysqli_fetch_array($get_profile)){

          

          ?>


            <div class="col-md-6 mb-3">
              <div class="card shadow h-100 border border-danger" style="border-radius: .5rem; border: 2px solid black">
                <div class="row g-0  ">
                  <div class="col-md-4  gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="../uploads/<?php echo $profile['profile']; ?>" alt="Avatar" class="img-fluid my-4 rounded-circle border border-3 border-dark" style="width: 120px;" />
                    <h6 class=" fw-bold" style="font-size: 20px; color: green; text-decoration: underline;"> <?php echo $post['fullname']; ?></h6>
                    <h6 class="text-dark fw-bold"> <?php echo $post['department']; ?></h6>
                    <p class="text-dark fw-bold"> <?php echo $post['faculty_email']; ?></p>

                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-3 fw-bold">
                      <h6 class="fw-bold">Title: <?php echo $post['title']; ?> </h6>

                      <div class="row pt-1">
                        <div class="col-12 mb-3">
                          <h6 class="fw-bold">Number of Students: <?php echo $post['num_students']; ?> </h6>
                          <hr class="mt-0 mb-4">
                        </div>
                      </div>


                      <div class="row pt-1">
                        <div class="col-12 mb-3">
                          <h6 class="fw-bold">Qualification</h6>
                          <p class="text-muted"><?php echo $post['description']; ?></p>
                        </div>
                      </div>
                      <div class="row pt-1">
                        <div class="col-6 mb-3 fw-bold">
                          <h6 class="fw-bold">Day</h6>
                          <p class="text-muted"><?php echo $post['day']; ?></p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6 class="fw-bold">Time</h6>
                          <p class="text-muted"><?php echo $post['start_time'] . '-' . $post['end_time']; ?></p>
                        </div>
                      </div>
                      <hr class="mt-0 mb-4">

                      <div class="card-footer">


                      </div>
                      <div class="modal" id="edit<?php echo $post['id']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Post Info</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="process.php" method="POST">
                                <div class="input-group">
                                  <div class="input-group-text"><i class="bi bi-person"></i></div>
                                  <input type="text" name="fullname" class="form-control" readonly value="<?php echo $post['fullname']; ?>">
                                </div>

                                <div class="input-group">
                                  <div class="input-group-text"><i class="bi bi-building"></i></div>
                                  <input type="text" name="department" class="form-control" value="<?php echo $post['department']; ?>">
                                </div>

                                <div class="input-group">
                                  <div class="input-group-text"><i class="bi bi-building"></i></div>
                                  <input type="text" name="department" class="form-control" value="<?php echo $post['title']; ?>">
                                </div>

                                <div class="input-group">
                                  <div class="input-group-text"><i class="bi bi-building"></i></div>
                                  <input type="text" name="num_students" class="form-control" value="<?php echo $post['num_students']; ?>">
                                </div>
                                <div class="input-group">
                                  <div class="input-group-text"><i class="bi bi-building"></i></div>
                                  <input type="text" name="department" class="form-control" value="<?php echo $post['description']; ?>">
                                </div>
                                <div class="input-group">
                                  <div class="input-group-text"><i class="bi bi-building"></i></div>
                                  <input type="text" name="department" class="form-control" readonly value="<?php echo $post['faculty_email']; ?>">
                                </div>
                            </div>

                            <div class="modal-footer">
                              <button type="delete" name="" class="btn btn-secondary" data-bs-dismiss="modal">Delete</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          <?php
          }
        }
          ?>
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 10%">
    <div class="copyright text-success">
      &copy; Copyright <strong><span>RSR</span></strong>. All Rights Reserved
    </div>
    <div class="credits text-success">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/" class="text-success fw-bold">RSR</a>
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