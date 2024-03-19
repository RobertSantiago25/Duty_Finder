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
  $get_faculties_det = mysqli_query($conn, "SELECT * FROM `faculties` WHERE email = '$e'");
  $faculties = mysqli_fetch_object($get_faculties_det);
  $fullname  = $faculties->fullname;
  $contact  = $faculties->contact;
  $address  = $faculties->address;
  $email  = $faculties->email;
  $password  = $faculties->password;
  $id = $faculties->id;
  
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
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block text-light">Faculty: Duty Finder</span>
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
            <span class="d-none d-md-block dropdown-toggle ps-2 text-light "><?php echo $fullname ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fullname ?></h6>

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

    <ul class="sidebar-nav " id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link collapsed bg-success" href="index.php">
          <i class="bi bi-grid text-light"></i>
          <span class="btn btn-success text-light">DASHBOARD</span>
        </a>

      <li class="nav-item ">
        <a class="nav-link collapsed bg-success" href="create.php">
          <i class="bi bi-pencil text-light"></i>
          <span class="btn btn-success text-light">CREATE POST</span>
</a> 
        
        <a class="nav-link bg-success" href="accepted.php">
          <i class="bi bi-check-lg text-light"></i>
          <span class=" btn btn-success text-light" >ACCEPTED APPLICANTS</span>
        </a>
        <a class="nav-link bg-success" href="declined.php">
          <i class="bi bi-x-lg text-light"></i>
          <span class=" btn btn-success  text-light">DECLINED APPLICANTS</span>
        </a>

        <a class="nav-link bg-success" href="announcement.php">
          <i class="bi bi-megaphone text-light"></i>
          <span class=" btn btn-success fw-bold text-light" >ANNOUNCEMENT</span>
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
      <h1 class="text-dark">ANNOUNCEMENT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php" class="btn btn-light text-dark">Home</a></li>
          <li class="breadcrumb-item btn btn-light">Announcement</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

  


<div class="row mx-5">
  <div class="col-md-11 border border-3 border-dark">
    <div class="card">
      <div class="card-header">
        <span class=" text-dark fw-bold">Announcements</span>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="">
              <th>Title:</th>
              <th scope="col">message:</th>
              <th scope="col">Date Announced:</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $announcements = mysqli_query($conn, "SELECT * FROM announcements order by id desc");

            while ($announcement = mysqli_fetch_array($announcements)) {
            ?>
              <tr>
                <td><?php echo $announcement['title']; ?></td>
                <td><?php echo $announcement['message']; ?></td>
                <td><?php echo $announcement['date']; ?></td>
               
              </tr>

              <div class="modal fade" id="updateModal<?php echo $announcement['id'] ?>" tabindex="-1" >
                <div class="modal-dialog">  
                  <div class="modal-content">
                    <form action="process.php?id=<?php echo $announcement['id'] ?>" method="POST">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Announcement</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                          <label for="">Title</label>
                            <div class="input-group">
                             
                              <input type="text" name="title" class="form-control" value="<?php echo $announcement['title'];?>">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Message</label>
                              <textarea name="message" class="form-control" style="height: 100px; resize: none;"><?php echo $announcement['message'] ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updateAnnouncement" class="btn btn-success">Save changes</button>
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
    </div>
  </div>

</div>
</section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-top: 50%">
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