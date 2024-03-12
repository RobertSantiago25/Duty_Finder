<?php  
    include "conn.php";
    session_start();


    //this code is for registration
    if(isset($_POST['register'])){

    $email=$_POST['email'];
    $password=$_POST['password'];
    $student_name=$_POST['student_name'];
    $contact=$_POST['contact'];
    $id_no=$_POST['id_no'];
    $year_level=$_POST['year_level'];
    $course=$_POST['course'];
    $department=$_POST['department'];
    $status="Pending";

    
   $insertusers=mysqli_query($conn, "INSERT INTO scholars VALUES('0','$email','$password','$student_name','$contact','$id_no','$year_level','$course','$department','$status')");

   if($insertusers==true){
    ?>
    <script>
        alert("Your Registration was Succesful!");
        window.location.href="index.html";
        
    </script>
<?php
  
}else{

    ?>
    <script>
        alert("Error Registration\nTry Again!");
        window.location.href="index.html";
    </script>
<?php
}
}
  

//Closing of Registration


//Code for login admin

if(isset($_POST['login_admin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $check=mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");

    $num=mysqli_num_rows($check);
                                                                                    
    if($num >=1){
        $_SESSION['email']=$email;
        ?>
        <script>
            alert("Account Accepted! Welcome Admin!");
            window.location.href="admin_dashboard1/index.php";     
        </script>
    <?php
    
    }else{
        ?>
        <script>
            alert("Email or Password not Found!");
            window.location.href="index.html";
        </script>
    <?php
    }
}
//Closing of login admin

//Code for login scholar!

if(isset($_POST['login_scholar'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $check=mysqli_query($conn, "SELECT * FROM scholars WHERE email='$email' AND password='$password'");

    $num=mysqli_num_rows($check);
                                                                                    
    if($num >=1){
        $_SESSION['email']=$email;
        ?>
        <script>
            alert("Account Accepted! Welcome Scholar!");
            window.location.href="scholar_dashboard/index.php";     
        </script>
    <?php
    
    }else{
        ?>
        <script>
            alert("Email or Password not Found!");
            window.location.href="index.php";
        </script>
    <?php
    }
}
  
//Closing of scholar

if (isset($_POST['announce'])) {
	$message = $_POST['message'];

	$sql = mysqli_query($conn,"INSERT into announcements values('','$message',current_timestamp)");
	?>
	<script>
		alert("Announcement Added..!");
		window.location.href = 'announcements.php';
	</script>
	<?php
}
//announce
if (isset($_POST['announce'])) {
	$message = $_POST['message'];

	$sql = mysqli_query($conn,"INSERT into announcements values('','$message',current_timestamp)");
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

	$sql = mysqli_query($conn,"UPDATE announcements set message='$message' where id='$id'");
	?>
	<script>
		alert("Announcement Updated..!");
		window.location.href = 'announcements.php';
	</script>
	<?php
}

//Update Scholars Profile 

if (isset($_POST['updscholar_profile'])) {
	$updprofile_id = $_GET['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$student_name = $_POST['student_name'];
	$contact = $_POST['contact'];
	$id_no = $_POST['id_no'];
	$year_level = $_POST['year_level'];
	$course = $_POST['course'];
	$department = $_POST['department'];

	$upd_profile = mysqli_query($conn,"UPDATE scholars set email='$email', password=' $password', student_name='$student_name', contact='$contact', id_no='$id_no' where id='$updprofile_id'");

    if($upd_profile){
	?>
	<script>
		alert("Scholar Profile Updated!");
		window.location.href = 'users-profile.php';
	</script>
	<?php
}else{
    ?>
	<script>
		alert("Error Updating!");
		window.location.href = 'users-profile.php';
	</script>
	<?php

}
}   

//Code for search

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

//applying 

if(isset($_POST['submit_application'])){

    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $id_num = $_POST['id_no'];
    $year_level = $_POST['year_level'];
    $course = $_POST['course'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $faculty_email = $_POST ['faculty_email'];

    $status = "Pending";
    $post_id = $_POST['post_id'];





$sub_app = mysqli_query($conn, "INSERT INTO applicants VALUE('0','$fullname','$contact','$id_num','$year_level','$course','$department','$email','$faculty_email','$status','$post_id')");

if($sub_app == TRUE){
    
    ?>
        <script>
            alert('Application Inserted!');
            location.href="view.php";
        </script>
    <?php
    
}else{
    ?>
    <script>
        alert('Error in applying!');
        location.href="view.php";
    </script>
<?php
}
}

//approving applicants 



?>