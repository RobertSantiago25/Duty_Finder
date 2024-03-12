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
  $get_scholars_det = mysqli_query($conn, "SELECT * FROM `scholars` WHERE email = '$e'");
  $scholars = mysqli_fetch_object($get_scholars_det);
  $email  = $scholars->email;
  $password  = $scholars->password;
  $student_name  = $scholars->student_name;
  $contact  = $scholars->contact;
  $id_no  = $scholars->id_no;
  $year_level  = $scholars->year_level;
  $course  = $scholars->course;
  $department  = $scholars->department;
  $id = $scholars->id;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HK: Duty Finder</title>
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
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block text-light">HK: Duty Finder</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!-- End Notification Nav -->

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $student_name ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $student_name ?></h6>

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

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar bg-success">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed bg-success text-light" href="view.php">
          <i class="bi bi-eye text-light fw-bold"></i>
          <span class="btn btn-success">VIEW POST</span>
        </a>

        <a class="nav-link bg-success text-light" href="status.php">
          <i class="bi bi-bookmark-check text-light"></i>
          <span class="btn btn-success fw-bold">STATUS</span>
        </a>

        <a class="nav-link collapsed bg-success text-light" href="announcement.php">
          <i class="bi bi-megaphone text-light"></i>
          <span class="btn btn-success">ANNOUNCEMENT</span>
        </a>

      </li><!-- End Dashboard Nav -->



    </ul>

  </aside><!-- End Sidebar-->
  <section>
    <main id="main" class="main">

      <div class="pagetitle">
        <h1 class="text-dark">STATUS</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html" class="text-dark btn btn-light">Home</a></li>
            <li class="breadcrumb-item btn btn-light text-dark">Status</li>
          </ol>
        </nav>
        <div class="container mt-3">
          <h2>Application Status</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Refenrence #</th>
                <th>Fullname</th>
                <th>Id Number</th>
                <th>Year Level</th>
                <th>Coure </th>
                <th>Department </th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $app_stat = mysqli_query($conn, "SELECT * FROM applicants WHERE email='$e'");
              while ($status = mysqli_fetch_array($app_stat)) {
                $fact_email = $status['faculty_email'];
                $get_post_fact = mysqli_query($conn, "SELECT * FROM post WHERE faculty_email = '$fact_email'");
                while ($post = mysqli_fetch_array($get_post_fact)) {
                 
               
              ?>
                <tr>

                  <td> <?php echo $post['id']; ?></td>
                  <td><?php echo $status['fullname']; ?></td>
                  <td><?php echo $status['id_num']; ?></td>
                  <td><?php echo $status['year_level']; ?></td>
                  <td><?php echo $status['course']; ?></td>
                  <td><?php echo $status['department']; ?></td>
                  <td><?php echo $status['status']; ?></td>
                </tr>
              <?php

              }
            }

              ?>

            </tbody>
          </table>
        </div>

    </main><!-- End #main -->
    <table class="table table-striped">
      ...
    </table>
  </section>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer " style="margin-top: 20%;">
    <div class="copyright">
      &copy; Copyright <strong><span>RSR</span></strong class="mb-12">. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/licddddddddddddddddddddddddense/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">RSR</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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