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
  $get_admin_det = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$e'");
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

        <!-- End Notification Nav -->

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $fullname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 class=" text-dark fw-bold"><?php echo $fullname ?></h6>

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
              <a class="dropdown-item d-flex align-items-center  text-dark" href="logout.php">
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

      <li class="nav-item bg-success">
        <a class="nav-link collapsed text-light bg-success fw-bold" href="index.php">
          <i class="bi bi-grid text-light"></i>
          <span class="btn btn-success">DASHBOARD</span>
        </a>


        <a class="nav-link bg-success fw-bold text-light" href="account.php">
          <i class="bi bi-person text-light "></i>
          <span class="btn btn-success fw-bold  ">ACCOUNTS</span>
        </a>

        <a class="nav-link collapsed btn btn-light bg-success text-light " href="department.php">
          <i class="bi bi-building text-light"></i>
          <span class="btn btn-success">DEPARTMENT</span>
        </a>

        <a class="nav-link collapsed bg-success text-light " href="view.php">
          <i class="bi bi-eye text-light"></i>
          <span class="btn btn-success">VIEW POST</span>
        </a>

        <a class="nav-link collapsed bg-success text-light " href="announcement.php">
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


    <div class="pagetitle ">
      <h1 class="text-dark">ACCOUNTS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item "><a href="index.php" class="text-dark btn btn-light">Home</a></li>
          <li class="breadcrumb-item btn btn-light text-dark">Accounts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">

        <!-- Sales Card -->

        <!-- End Sales Card -->


        <!-- Sales Card -->


        <!-- End Sales Card -->


        <!-- Sales Card -->

        <!-- End Sales Card -->


      </div>


      <div class="card shadow">

        <div class="card-body">
          <div class="container mt-3">
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

              <!--New Status-->
              <li class="nav-item">
                <?php
                $get_new_sch = mysqli_query($conn, "SELECT * FROM scholars WHERE status = 'New'");
                $scholar_new = mysqli_num_rows($get_new_sch);
                ?>
                <a class="nav-link active btn btn-light text-dark fw-bold" data-bs-toggle="tab" href="#scholars">Scholars <sup class="badge bg-danger"><?php echo $scholar_new; ?></sup></a>
              </li>
              <li class="nav-item">
                <?php
                $get_new = mysqli_query($conn, "SELECT * FROM faculties WHERE account_status = 'New'");
                $faculties_new = mysqli_num_rows($get_new);
                ?>
                <a class="nav-link btn btn-light text-dark  fw-bold" data-bs-toggle="tab" href="#faculties">Faculties<sup class="badge bg-danger"><?php echo $faculties_new; ?></sup></a>
              </li>

            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div id="scholars" class="container tab-pane active"><br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Email</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Id Number </th>
                      <th scope="col">Year Level</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $get_students = mysqli_query($conn, "SELECT * FROM scholars");
                    while ($std = mysqli_fetch_array($get_students)) {


                    ?>
                      <tr>
                        <th scope="row"><?php echo $std['email'] ?></th>
                        <th scope="row"><?php echo $std['student_name'] ?></th>
                        <th scope="row"><?php echo $std['contact'] ?></th>
                        <th scope="row"><?php echo $std['id_no'] ?></th>
                        <th scope="row"><?php echo $std['year_level'] ?></th>
                        <th scope="row"><?php echo $std['status'] ?></th>


                        <th scope="col"><a href="" class="btn btn-light text-success fw-bold" data-bs-toggle="modal" data-bs-target="#more<?php echo $std['id'] ?>">View more</a></th>
                      </tr>

                      <!--Modal For Update Delete Students-->
                      <div class="modal" tabindex="-1" id="more<?php echo $std['id'] ?>">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Account ID <?php echo $std['id'] ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="process.php?id=<?php echo $std['id'] ?>" method="POST">
                                <div class="row">

                                  <div class="col-md-6 mb-3 ">
                                    <label>Email</label>

                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="email" value="<?php echo $std['email'] ?>" name="email" class="form-control" readonly>
                                    </div>
                                  </div>


                                  <div class="col-md-6 mb-3 ">
                                    <label>Student Name</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $std['student_name'] ?>" name="student_name" class="form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-3 ">
                                    <label>Contact</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $std['contact'] ?>" name="contact" class="form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-3 ">
                                    <label>Id Number</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $std['id_no'] ?>" name="id_no" class="form-control">

                                    </div>
                                  </div>


                                  <div class="col-md-6 mb-3 ">
                                    <label>Year Level</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $std['year_level'] ?>" name="year_level" class="form-control">
                                    </div>
                                  </div>


                                  <div class="col-md-6 mb-3 ">
                                    <label>Course</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $std['course'] ?>" name="course" class="form-control">

                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-3 ">
                                    <label>Department</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $std['department'] ?>" name="department" class="form-control">

                                    </div>
                                  </div>

                                  

                                  <div class="col-md-6 mb-3 ">
                                  <label>Status</label><br>

                                    <div class="input-group">
                                      <div class="input-group-text">


                                      </div>
                                      <select class="form-select form-select-3" name="status" require>
                                      <option value="<?php echo $std['status']; ?>"><?php echo $std['status']; ?></option>
                                      <option value="Activate">Activate</option>
                                      <option value="Deactivate">Deactivate</option>

                                    </select>



                                    </div>
                                  </div>








                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="delete_scholars" value="DELETE" class="btn btn-danger" onclick="return confirm('Do you want to delete this account?')">

                                  <input type="submit" value="UPDATE" name="update_scholars" class="btn btn-primary">
                                </div>

                              </form>

                            </div>
                          </div>
                        </div>

                      <?php

                    }
                      ?>
                  </tbody>
                </table>
              </div>

              <!--faculties Update Delete-->
              <div id="faculties" class="container tab-pane fade"><br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Email</th>
                      <th scope="col">Faculty Name</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Address </th>
                      <th scope="col">Status </th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $get_faculties = mysqli_query($conn, "SELECT * FROM faculties");
                    while ($faculties = mysqli_fetch_array($get_faculties)) {


                    ?>
                      <tr>
                        <th scope="row"><?php echo $faculties['email'] ?></th>
                        <th scope="row"><?php echo $faculties['fullname'] ?></th>
                        <th scope="row"><?php echo $faculties['contact'] ?></th>
                        <th scope="row"><?php echo $faculties['address'] ?></th>
                        <th scope="row"><?php echo $faculties['account_status'] ?></th>



                        <th scope="col"><a href="" data-bs-toggle="modal" class="btn btn-light fw-bold text-success" data-bs-target="#more1<?php echo $faculties['id']; ?>">View more</a></th>
                      </tr>

                      <!--Modal For Update Delete Faculties-->
                      <div class="modal" tabindex="-1" id="more1<?php echo $faculties['id']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Account ID <?php echo $faculties['id'] ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="process.php?id=<?php echo $faculties['id'] ?>" method="POST">
                              <div class="row">

                                  <div class="col-md-6 mb-3 ">
                                    <label>Email</label>

                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="email" value="<?php echo $faculties['email'] ?>" name="email" class="form-control" readonly>
                                    </div>
                                  </div>


                                  <div class="col-md-6 mb-3 ">
                                    <label>Faculty Name</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $faculties['fullname'] ?>" name="fullname" class="form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-3 ">
                                    <label>Contact</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $faculties['contact'] ?>" name="contact" class="form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-3 ">
                                    <label>Address</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $faculties['address'] ?>" name="address" class="form-control">

                                    </div>
                                  </div>


                                  <div class="col-md-6 mb-3 ">
                                    <label>Department</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $faculties['department'] ?>" name="department" class="form-control">
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-3 ">
                                    <label>Id Number</label>
                                    <div class="input-group">
                                      <div class="input-group-text"></div>
                                      <input type="text" value="<?php echo $faculties['id_num'] ?>" name="id_num" class="form-control">

                                    </div>
                                  </div>

                             
                                  

                                  <div class="col-md-12 mb-3 ">
                                  <label>Status</label><br>

                                    <div class="input-group">
                                      <div class="input-group-text">


                                      </div>
                                      <select class="form-select form-select-3" name="faculty_status" require>
                                      <option value="<?php echo $faculties['account_status']; ?>"><?php echo $faculties['account_status']; ?></option>
                                      <option value="Activate">Activate</option>
                                      <option value="Deactivate">Deactivate</option>

                                    </select>



                                    </div>
                                  </div>


                                </div>
                            <div class="modal-footer">
                              <input type="submit" name="delete_faculties" value="DELETE" class="btn btn-danger" onclick="return confirm('Do you want to delete this account?')">
                              <input type="submit" name="update_faculties" value="UPDATE" class="btn btn-primary">
                            </div>
                          </div>
                          </form>

                        </div>
                      </div>

                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>


            </div>
          </div>
        </div>
      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 10%">
    <div class="copyright text-success">
      &copy; Copyright <strong><span class="text-success">RSR</span></strong>. All Rights Reserved
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