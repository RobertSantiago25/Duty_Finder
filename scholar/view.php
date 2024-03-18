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
  $id = $scholars->id;
  $department  = $scholars->department;
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
  <header id="header" class="header fixed-top d-flex align-items-center shadow" style="background: #198754 ;">

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

      <a class="nav-link bg-success text-light" href="view.php">
        <i class="bi bi-eye text-light"></i>
        <span class="btn btn-success fw-bold">VIEW POST</span>
      </a>

      <a class="nav-link collapsed bg-success text-light" href="status.php">
        <i class="bi bi-bookmark-check text-light"></i>
        <span class="btn btn-success ">STATUS</span>
      </a>

      <a class="nav-link collapsed bg-success text-light" href="announcement.php">
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

    <div class="pagetitle ">
      <h1 class="text-dark">VIEW POST</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item btn btn-light"><a href="index.php" class="text-dark">Home</a></li>
          <li class="breadcrumb-item btn btn-light text-dark">View Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
      <form action="view.php" method="POST">
        <div class="input-group " style="margin-right: 100px;">
          <div class="input-group-text bg-success"><i class="  text-light fw-bold"></i></div>
          <select name="title" class="form-select" required>
            <option value="">-Search Title-</option>
            <option value="Laboratory Assistant">Laboratory Assistant</option>
            <option value="Student Facilitator ">Student Facilitator </option>
            <option value="Office Assistant ">Office Assistant </option>
            <option value="Library Assitant">Library Assistant</option>



          </select>

          <!--Search Botton-->

          <button type="submit" class="bi bi-search text-light fw-bold  p-2 btn btn-success" name="search" class="btn btn="> Search</button>
      </form>
      </div>
      <?php
      if (isset($_POST['search'])) {

        $title = $_POST['title'];
        $get1 = mysqli_query($conn, "SELECT * from post WHERE title ='$title'");

        $num = mysqli_num_rows($get1);

        if ($num >= 1) {

      ?>
          <div class="row d-flex mt-3  h-100">

            <?php
            $get_post = mysqli_query($conn, "SELECT * FROM post WHERE title LIKE'%$title%'");
            while ($post = mysqli_fetch_array($get_post)) {

              $get_profile = mysqli_query($conn, "SELECT * FROM faculties WHERE email ='{$post['faculty_email']}'");
              while($profile = mysqli_fetch_object($get_profile)){

                  $faculty_profile = $profile -> profile;
              }



            ?>
              <div class="col-md-6 mb-4 mb-lg-0">
                <div class="card mb-2 shadow" style="border-radius: .5rem; border: 2px solid black;">
                  <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                      <img src="../uploads/<?php echo $faculty_profile; ?>" alt="Avatar" class="img-fluid my-4 rounded-circle border border-3 border-dark" style="width: 100px; height: 90px;" />
                      <h6 class=" fw-bold" style="font-size: 20px; color: green; text-decoration: underline;"> <?php echo $post['fullname']; ?></h6>
                      <h6 class="text-dark fw-bold"> <?php echo $post['department']; ?></h6>
                      <p class="text-dark fw-bold"> <?php echo $post['faculty_email']; ?></p>

                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-3 fw-bold">

                        <h6 class="fw-bold">Title: <?php echo $post['title']; ?> </h6>
                        <h6 class="fw-bold">Number of Students: <?php echo $post['num_students']; ?> </h6>
                        <h6 class="text-black fw-bold">Reference #: <?php echo $post['id'];?></h6>

                        <hr class="mt-0 mb-4">

                        <div class="row pt-1">
                          <div class="col-12 mb-3">
                            <h6 class="fw-bold">Description</h6>
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
                          <input type="submit" value="Apply" data-bs-toggle="modal" data-bs-target="#apply<?php echo $post['id']; ?>" class="btn btn-success mb-2" style="float:right;">


                        </div>
                        <div class="modal" id="apply<?php echo $post['id']; ?>" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Application Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="process.php" method="POST">

                                  <label for="">Fullname</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text bg-success text-light"><i class="bi bi-person"></i></div>
                                    <input type="text" name="fullname" class="form-control" value="<?php echo $student_name ?>" readonly>
                                  </div>

                                  <label for="">Contact</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text  bg-success text-light"><i class="bi bi-phone"></i></div>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $contact ?>" readonly>
                                  </div>

                                  <label for="">Id Number</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text bg-success text-light"><i class="bi bi-phone"></i></div>
                                    <input type="text" name="id_no" class="form-control" value="<?php echo $id_no ?>" readonly>
                                  </div>

                                  <label for="">Year Level</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text bg-success text-light"><i class="bi bi-arrow-up"></i></div>
                                    <input type="text" name="year_level" class="form-control" value="<?php echo $year_level ?>" readonly>
                                  </div>

                                  <label for="">Course</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text bg-success text-light"><i class="bi bi-building"></i></div>
                                    <input type="text" name="course" class="form-control" value="<?php echo $course ?>" readonly>
                                  </div>

                                  <label for="">Department</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text bg-success text-light"><i class="bi bi-phone"></i></div>
                                    <input type="text" name="department" class="form-control" value="<?php echo $department ?>" readonly>
                                  </div>

                                  <label for="">Email</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-text bg-success text-light"><i class="bi bi-  "></i></div>
                                    <input type="text" name="email" class="form-control" value="<?php echo $email ?>" readonly>
                                  </div>

                                  <input type="hidden" name="faculty_email" value="<?php echo $post['faculty_email'] ?>">
                                  <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit_application" class="btn btn-primary">Submit Application</button>
                              </div>
                              </form>
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
            ?>
          </div>

        <?php
        } else {
        ?>
          <div class="alert alert-danger mt-3">
            <strong>No data as of the moment</strong>
          </div>
      <?php

        }
      }

      ?>

      <section class="vh-100" style="background-color: #f4f5f7;">

        <div class="container py-3 " style="margin-right: 100x;">

          </form>

      </section>

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">






      </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 10%">
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