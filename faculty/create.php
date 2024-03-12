<?php
include '../conn.php';
session_start();
if (empty($_SESSION['email'])) {
?>
  <script>
    alert("Session Expired Please Login Again");
    location.href = 'login.php';
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
  $department = $faculties->department;
  $profile  = $faculties->profile;
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
  <aside id="sidebar " class="sidebar bg-success">

    <ul class="sidebar-nav bg-success" id="sidebar-nav">

      <li class="nav-item bg-success">
        <a class="nav-link collapsed bg-success fw-bold text-light" href="index.php">
          <i class="bi bi-grid  text-light"></i>
          <span class="btn btn-success">DASHBOARD</span>
        </a>

      <li class="nav-item bg-success">
        <a class="nav-link bg-success fw-bold text-light" href="create.php">
          <i class="bi bi-pencil text-light"></i>
          <span class="btn btn-success fw-bold">CREATE POST</span>
        </a>



        <a class="nav-link bg-success" href="accepted.php">
          <i class="bi bi-check text-light"></i>
          <span class=" btn btn-success  text-light">ACCEPTED APPLICANTS</span>
        </a>

        
        <a class="nav-link bg-success" href="declined.php">
          <i class="bi bi-check text-light"></i>
          <span class=" btn btn-success  text-light">DECLINED APPLICANTS</span>
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
  <main id="main" class="main ">

    <div class="pagetitle">
      <h1 class="text-dark">CREATE POST</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item "><a href="index.php" class="text-dark btn btn-light">Home</a></li>
          <li class="breadcrumb-item text-dark btn btn-light">Create Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <!--Post Code-->
    <button type="submit" class="btn btn-primary" style="margin-left:30px;" data-bs-target="#add_post" data-bs-toggle="modal">CREATE POST</button>

    <div class="modal" id="add_post" tabindex="-1">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Post Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="process.php" id="id" method="POST">

              <label for="" readonly>Fullname</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-person"></i></div>
                <input type="text" name="fullname" value="<?php echo $fullname; ?>" class="form-control " placeholder="Fullname" readonly require>
              </div>

              <label for="">Department</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-building"></i></div>
                <input type="text" name="department" value="<?php echo $department; ?>" class="form-control" placeholder="Department" readonly require>
              </div>

              <label for="">Title</label>
              <div class="input-group mb-3 ">
                <div class="input-group-text text-light bg-success"><i class="bi bi-person"></i></div>
                <select name="title" class="form-select">
                  <option value="">-Select Title-</option>
                  <option value="Laboratory Assistant">Laboratory Assistant</option>
                  <option value="Student Facilitator ">Student Facilitator </option>
                  <option value="Library Assistant ">Library Assistant </option>
                  <option value="Office Assistant">Office Assistant </option>



                </select>
              </div>

              <label for="">Number of Students</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-person"></i></div>
                <input type="text" name="num_students" class="form-control" placeholder="Number of Students" require>
              </div>



              <label for="">Qualification</label>
              <div class="input-group">
                <div class="input-group-text text-light bg-success"><i class="bi bi-pen"></i></div>
                <textarea name="description" id="" style="resize:none;" class="form-control" require></textarea>
              </div>


              <label for="">Email</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-person"></i></div>
                <input type="email" name="faculty_email" value="<?php echo $e; ?>" class="form-control" placeholder="Email" readonly>
              </div>


              <label for="">Day</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-cloud"></i></div>
                <input type="day" name="day" value="" class="form-control" placeholder="Day" require>
              </div>

              <label for="">Start Time</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-clock"></i></div>
                <input type="time" name="start_time" value="<?php echo $e; ?>" class="form-control" placeholder="Start Time" require>
              </div>


              <label for="">End Time</label>
              <div class="input-group mb-3">
                <div class="input-group-text text-light bg-success"><i class="bi bi-clock"></i></div>
                <input type="time" name="end_time" value="<?php echo $e; ?>" class="form-control" placeholder="End Time" require>
              </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="post">Post</button>
          </div>
        </div>
      </div>
    </div>
    </form>

    <!--Edit Post-->
    <section class="vh-100" style="background-color: #f4f5f7;">

      <div class="container py-3 " style="margin-right: 100x;">
        <div class="row d-flex  h-100">

          <?php
          $get_post = mysqli_query($conn, "SELECT * FROM post WHERE faculty_email = '$e'");
          while ($post = mysqli_fetch_array($get_post)) {



          ?>


            <div class="col-md-6 mb-4 mb-lg-0">
              <div class="card mb-2 shadow" style="border-radius: .5rem; border: 2px solid black;">
                <div class="row g-0 mx-3">
                  <div class="col-md-4 gradient-custom text-center text-white " style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="../uploads/<?php echo $profile; ?>" alt="Avatar" class="img-fluid my-4 rounded-circle border border-3 border-dark" style="width: 120px; height:120px;" />
                    <h5 class="text-success fw-bold"> <?php echo $fullname; ?></h5>
                    <h6 class="text-dark"> <?php echo $department; ?></h6>
                    <p class="text-dark"> <?php echo $email ?></p>

                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-3">

                      <h6 class="fw-bold">Title: <?php echo $post['title']; ?></h6>
                      <h6 class="fw-bold">Number of Students: <?php echo $post['num_students']; ?> <p>Reference #: <?php echo $post['id']; ?></p>
                      </h6>

                      <hr class="mt-0 mb-4">

                      <div class="row pt-1">

                        <div class="col-12 mb-3">
                          <h6 class="fw-bold">Qualification:</h6>
                          <p class="text-muted">-<?php echo $post['description']; ?></p>
                        </div>
                      </div>
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6 class="fw-bold">Day:</h6>
                          <p class="text-muted"><?php echo $post['day']; ?></p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6 class="fw-bold">Time:</h6>
                          <p class="text-muted"><?php echo $post['start_time'] . '-' . $post['end_time']; ?></p>
                        </div>
                      </div>
                      <div class="card-footer">

                        <div class="d-flex gap-2" style="float:right;">
                          <button type="submit" name="del_post" data-bs-toggle="modal" data-bs-target="#edit<?php echo $post['id']; ?>" class="btn btn-primary">Edit</button>

                          <button type="submit" name="view_app" data-bs-toggle="modal" data-bs-target="#view_app<?php echo $post['id']; ?>" class="btn btn-success">View Applicants</button>
                        </div>

                        <div class="modal" id="view_app<?php echo $post['id']; ?>" tabindex="-1">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Pending Applicants</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Fullname</th>
                                      <th scope="col">Contact</th>
                                      <th scope="col">Id Number</th>
                                      <th scope="col">Course</th>
                                      <th scope="col">Department</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>


                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                    $get_spec = mysqli_query($conn, "SELECT * FROM applicants WHERE post_id = '" . $post['id'] . "' AND status = 'Pending'");
                                    while ($spec = mysqli_fetch_array($get_spec)) {



                                    ?>
                                      <tr>
                                        
                                        <td scope="row"><?php echo $spec['fullname']; ?></td>
                                        <td scope="row"><?php echo $spec['contact']; ?></td>
                                        <td scope="row"><?php echo $spec['id_num']; ?></td>
                                        <td scope="row"><?php echo $spec['course']; ?></td>
                                        <td scope="row"><?php echo $spec['department']; ?></td>
                                        <td scope="row"><?php echo $spec['email']; ?></td>
                                        <td scope="row"><?php echo $spec['status']; ?></td>
                                        
                                        <td>
                                          
                                          <form action="process.php?id=<?php echo $spec['id']; ?>" method="POST">



                                            <div class="d-flex gap-2">
                                              
                                              
                                              <button type="submit" name="approve_app" class="btn btn-success" onclick="return confirm('Do you want to Approve this applicant?')">Approve</button>
                                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#decline<?php echo $spec['id']; ?>">
                                                
                                              Decline

                                              </button>


                                            </div>
                                         
                                          </form>
                                          
                                          
                                        </td>
                                       


                                      </tr>
                                      

                                    <?php
                                    }

                                    ?>

                                  </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      





                      </div>


                      <!---Edit Post-->
                      <div class="modal" id="edit<?php echo $post['id']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit post info</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body p-3">
                              <form action="process.php?id=<?php echo $post['id']; ?>" method="POST">

                                <h6 class="fw-bold">Reference #</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-person "></i></div>
                                  <input type="text" name="fullname" class="form-control " readonly value="<?php echo $post['id']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Fullname</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-person "></i></div>
                                  <input type="text" name="fullname" class="form-control " value="<?php echo $post['fullname']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Department</h6>

                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light "><i class="bi bi-geo-alt"></i></div>
                                  <input type="text" name="department" class="form-control" value="<?php echo $post['department']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Title</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-building"></i></div>
                                  <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Number of Students</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-person-fill"></i></div>
                                  <input type="text" name="num_students" class="form-control" value="<?php echo $post['num_students']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Qualification</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-question-circle"></i></div>
                                  <input type="text" name="description" class="form-control" value="<?php echo $post['description']; ?>">
                                </div><br>


                                <h6 class="fw-bold">Email</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-envelope"></i></div>
                                  <input type="email" name="faculty_email" class="form-control" readonly value="<?php echo $post['faculty_email']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Day</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-question-circle"></i></div>
                                  <input type="text" name="day" class="form-control" value="<?php echo $post['day']; ?>">
                                </div><br>

                                <h6 class="fw-bold">Start Time</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-question-circle"></i></div>
                                  <input type="time" name="start_time" class="form-control" value="<?php echo $post['start_time']; ?>">
                                </div><br>

                                <h6 class="fw-bold">End Time</h6>
                                <div class="input-group">
                                  <div class="input-group-text bg-success text-light"><i class="bi bi-question-circle"></i></div>
                                  <input type="time" name="end_time" class="form-control" value="<?php echo $post['end_time']; ?>">
                                </div>
                            </div>

                            <div class="modal-footer">

                              <button type="submit" name="edit1_post" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr>
                  </hr>

                </div>
              </div>



            </div>
          <?php
          }
          ?>
        </div>




        <!--Accept/Regject Applicants-->
      
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