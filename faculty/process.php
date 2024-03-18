<?php
include "../conn.php";
session_start();


//this code is for registration
if (isset($_POST['register'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $student_name = $_POST['student_name'];
    $contact = $_POST['contact'];
    $id_no = $_POST['id_no'];
    $year_level = $_POST['year_level'];
    $course = $_POST['course'];
    $department = $_POST['department'];
    $status = "Pending";


    $insertusers = mysqli_query($conn, "INSERT INTO scholars VALUES('0','$email','$password','$student_name','$contact','$id_no','$year_level','$course','$department','$status')");

    if ($insertusers == true) {
?>
        <script>
            alert("Your Registration was Succesful!");
            window.location.href = "index.html";
        </script>
    <?php

    } else {

    ?>
        <script>
            alert("Error Registration\nTry Again!");
            window.location.href = "index.html";
        </script>
    <?php
    }
}


//Closing of Registration


//Code for login admin

if (isset($_POST['login_admin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");

    $num = mysqli_num_rows($check);

    if ($num >= 1) {
        $_SESSION['email'] = $email;
    ?>
        <script>
            alert("Account Accepted! Welcome Admin!");
            window.location.href = "admin_dashboard1/index.php";
        </script>
    <?php

    } else {
    ?>
        <script>
            alert("Email or Password not Found!");
            window.location.href = "index.html";
        </script>
    <?php
    }
}
//Closing of login admin

//Code for login scholar!

if (isset($_POST['login_scholar'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM scholars WHERE email='$email' AND password='$password'");

    $num = mysqli_num_rows($check);

    if ($num >= 1) {
        $_SESSION['email'] = $email;
    ?>
        <script>
            alert("Account Accepted! Welcome Scholar!");
            window.location.href = "scholar_dashboard/index.php";
        </script>
    <?php

    } else {
    ?>
        <script>
            alert("Email or Password not Found!");
            window.location.href = "index.php";
        </script>
    <?php
    }
}

//Closing of scholar


//announce
if (isset($_POST['announce'])) {
    $message = $_POST['message'];

    $sql = mysqli_query($conn, "INSERT into announcements values('','$message',NOW())");
    ?>
    <script>
        alert("Announcement Added..!");
        window.location.href = 'announcements.php';
    </script>
<?php
}

//update announcement
if (isset($_POST['updateAnnouncement'])) {
    $id = $_GET['id'];
    $message = $_POST['message'];

    $sql = mysqli_query($conn, "UPDATE announcements set message='$message' where id='$id'");
?>
    <script>
        alert("Announcement Updated..!");
        window.location.href = 'announcements.php';
    </script>
    <?php
}
//for adding dept 
if (isset($_POST['add_dept'])) {
    $dept = $_POST['dept'];


    $get_dept = mysqli_query($conn, "SELECT * FROM department WHERE department = '$dept'");
    $dept_num = mysqli_num_rows($get_dept);

    if ($dept_num <= 0) {
        $add_dept = mysqli_query($conn, "INSERT INTO department VALUE('0','$dept')");
        if ($add_dept == true) {
    ?>
            <script>
                alert("Department Created!");
                window.location.href = 'department.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Failed to Create Department");
                window.location.href = 'department.php';
            </script>
        <?php
        }
    }
}
//For deleting department

if (isset($_POST['del_dept'])) {

    $del_id = $_GET['id'];

    $del_dept = mysqli_query($conn, "DELETE FROM department WHERE id='$del_id'");



    if ($del_dept == TRUE) {
        ?>
        <script>
            alert('Department Deleted Successfully!');
            location.href = "department.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error!');
            location.href = "department.php";
        </script>
    <?php
    }
}
//updating dept 
if (isset($_POST['upd_dept'])) {
    $upd_id = $_GET['id'];

    $upd_dept = $_POST['dept'];

    $upd_dept_query = mysqli_query($conn, "UPDATE department SET department = '$upd_dept' WHERE id='$upd_id'");
    if ($upd_dept_query == true) {
    ?>
        <script>
            alert("Details Updated Successfully!");
            location.href = 'department.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error Updating");
            location.href = 'department.php';
        </script>
    <?php
    }
}
//Profile Update for Faculty

if (isset($_POST['update_profile'])) {

    $update_id = $_GET['id'];

    $fullname = $_POST['fullName'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $id_num = $_POST['id_num'];
    $department = $_POST['department'];

    $password = $_POST['password'];

    

    $upd_profile = mysqli_query($conn, "UPDATE faculties SET fullname='$fullname', address ='$address', contact ='$contact', email='$email', id_num='$id_num', department='$department', password='$password' WHERE id ='$update_id'");

    if ($upd_profile == TRUE) {
    ?>
        <script>
            alert('Profile Updated Succsessfully');
            location.href = "users-profile.php"
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Profile Update Error');
            location.href = "users-profile.php"
        </script>
    <?php
    }
}
/*
//create save post

if (isset($_POST['post'])) {

    $save_id = $_GET['id'];

    $fullname = $_POST['fullName'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $scholar_num = $_POST['scholar_num'];
    $id_num = $_POST['id_num'];
    $department = $_POST['department'];

    $password = $_POST['password'];


    $upd_profile = mysqli_query($conn, "UPDATE faculties SET fullname='$fullname', address ='$address', contact ='$contact', email='$email', id_num='$id_num', department='$department', password='$password' WHERE id ='$update_id'");

    if ($upd_profile == TRUE) {
    ?>
        <script>
            alert('Profile Updated Succsessfully');
            location.href = "users-profile.php"
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Profile Update Error');
            location.href = "users-profile.php"
        </script>
    <?php
    }
}
*/


//Create Post Title Process

if (isset($_POST['post'])) {

    $fullname = $_POST['fullname'];
    $title = $_POST['title'];
    $num_students = $_POST['num_students'];
    $description = $_POST['description'];
    $faculty_email = $_POST['faculty_email'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $department = $_POST['department'];
    $create_title = mysqli_query($conn, "INSERT INTO post VALUES('0','$fullname','$description','$title','$num_students','$faculty_email','$start_time','$end_time','$day','$department','$semester','$school_year')");

    if ($create_title == TRUE) {

    ?>
        <script>
            alert('Post Created!');
            location.href = "create.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Error Posting!');
            location.href = "create.php";
        </script>
<?php
    }
}

//Update Edit Post


if (isset($_POST['edit1_post'])) {

    $edit_post = $_GET['id'];

    $fullname = $_POST['fullname'];
    $department = $_POST['department'];
    $title = $_POST['title'];
    $num_students = $_POST['num_students'];
    $description = $_POST['description'];
    $faculty_email = $_POST['faculty_email'];

    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $ed_post = mysqli_query($conn, "UPDATE post SET fullname='$fullname', department ='$department', title ='$title',num_students='$num_students', description='$description', faculty_email='$faculty_email',  day='$day', start_time='$start_time',  end_time='$end_time' WHERE id='$edit_post'");

    if ($ed_post == TRUE) {
    ?>
        <script>
            alert('Updating Post Succsessfully');
            location.href = "create.php"
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Update Error');
            location.href = "create.php"
        </script>
    <?php
    }
}

//Delete Post in edit

if(isset($_POST['del_post_fac'])){
$delete_id = $_GET['id'];

$delete_post = mysqli_query($conn, "DELETE FROM post WHERE id='$delete_id'");



if ($delete_post == TRUE) {
    ?>
    <script>
        alert('Post Deleted Successfully!');
        location.href = "create.php";
    </script>
<?php
} else {
?>
    <script>
        alert('Error in Deleting!');
        location.href = "create.php";
    </script>
<?php
}
}


//Accept Scholar Application
if(isset($_POST['accept'])){
    $accept_id = $_GET['id'];

    $update_accept = mysqli_query($conn,"UPDATE applicants SET status ='approved' WHERE id = '$accept_id'");
    if($update_accept == true){
        ?>
            <script>
                alert("Applicant Approved!");
                location.href='create.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Applicant not Approved!");
            location.href='create.php';
        </script>
    <?php 
    }
}

//Reject Scholar Application
if(isset($_POST['reject'])){
    $decline_id = $_GET['id'];

    $update_decline = mysqli_query($conn,"UPDATE applicants  SET status='Decline' WHERE id = '$decline_id'");
    if($update_decline == true){
        ?>
            <script>
                alert("Applicants Declined");
                location.href='create.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error Decline applicants ");
            location.href='create.php';
        </script>
    <?php
    }
}

//Approve Applicants
if(isset($_POST['approve_app'])){
    $app_id = $_GET['id'];

    $approve_applicants = mysqli_query($conn,"UPDATE applicants SET status = 'Approved' WHERE id ='$app_id'");
    if($approve_applicants == true){
        ?>
            <script>
                alert("Applicant Accepted!");
                location.href='accepted.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error Updating Status!");
            location.href='create.php';
        </script>
    <?php
    }
}

//Decline Applicant

if(isset($_POST['decline_app'])){
    $dec_id =$_GET['id'];

    $decline_applicants = mysqli_query($conn,"UPDATE applicants SET status = 'Decline' WHERE id ='$dec_id'");
    if($decline_applicants == true){
        ?>
            <script>
                alert("Applicant Declined!");
                location.href='declined.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error Updating Status!");
            location.href='create.php';
        </script>
    <?php
    }


}

?>