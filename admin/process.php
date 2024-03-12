<?php 

session_start();
include '../conn.php';


//adding department 
if(isset($_POST['add_dept']))
{
    $add_dept = $_POST['dept'];

    $check_dept = mysqli_query($conn, "SELECT * FROM department WHERE department = '$add_dept'");
    $dept_num = mysqli_num_rows($check_dept);
    if($dept_num >=1 ){
        ?>
            <script>
                alert("Department Already Created!");
                window.location.href='department.php';
            </script>
        <?php
    }else{
        $create_dept = mysqli_query($conn,"INSERT INTO department VALUE('0','$add_dept')");
        if($create_dept == true){
            ?>
                <script>
                    alert("Department Created Successfully!");
                    window.location.href='department.php';
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("Error Creating Department!");
                window.location.href='department.php';
            </script>
        <?php
        }
    }

}

//deleting department 
if(isset($_POST['del_dept'])){
    $deldept_id = $_GET['id'];

    $delete_dept = mysqli_query($conn,"DELETE FROM department WHERE id = '$deldept_id'");
    if($delete_dept == true){
        ?>
            <script>
                alert("Department Deleted Successfully!");
                location.href='department.php';
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error Deleting Department");
            location.href='department.php';
        </script>
    <?php
    }
}

//updating department 
if(isset($_POST['upd_dept'])){
    $upddept_id = $_GET['id'];
    $upd_dept = $_POST['dept'];

    $update_dept  = mysqli_query($conn,"UPDATE department SET department = '$upd_dept' WHERE id='$upddept_id'");
    if($update_dept == true){
        ?>
            <script>
                alert("Department Information Updated!");
                location.href='department.php';
            </script>
        <?php
    }else{
        ?>
           <script>
                alert("Error Updating Info!");
                location.href='department.php';
            </script>
        <?php
    }
}

//creating announcement 
if(isset($_POST['announce'])){
    $title = $_POST['title'];
    $message  = $_POST['message'];
    $date = date('d-m-Y');
    $check_announce = mysqli_query($conn,"SELECT * FROM announcements WHERE title ='$title'");
    $announce_num = mysqli_num_rows($check_announce);
    if($announce_num >= 1){
        ?>
            <script>
                alert("This announcement already created!");
                location.href='announcement.php';
            </script>
        <?php
    }else{
        $create_announce = mysqli_query($conn, "INSERT INTO announcements VALUES('0','$title','$message',NOW())");
        if($create_announce == true){
            ?>
            <script>
                alert("Announcement Created!");
                location.href='announcement.php';
            </script>
            <?php
        }else{
            ?>
                <script>
                    alert("Error Creating Announcement");
                    location.href='announcement.php';
                </script>
            <?php
        }
    }
}

//For Updating Faculty Accounts

if(isset($_POST['update_faculties'])){

    $updfaculties_id = $_GET['id'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $account_status= $_POST['account_status'];
    $id_num= $_POST['id_num'];


    $update_faculties = mysqli_query($conn, "UPDATE faculties SET fullname='$fullname', contact='$contact', address='$address', email='$email', id_num='$id_num', department='$department', account_status='$account_status' WHERE id='$updfaculties_id'");
    if($update_faculties == true){
        ?>
            <script>
                alert("Faculties Information Updated!");
                location.href='account.php';
            </script>
        <?php
    }else{
        ?>
           <script>
                alert("Error Updating Info!");
                location.href='account.php';
            </script>
        <?php
    }

}

//For deleting faculty accounts

if(isset($_POST['delete_faculties'])){

$faculty_id = $_GET['id'];

$del_faculty = mysqli_query($conn, "DELETE FROM faculties WHERE id='$faculty_id'");

if($del_faculty == TRUE){
    ?>
        <script>
            alert("Faculty Information Deleted");
            location.href ="account.php";
        </script>
    <?php
}else{
    ?>
    <script>
        alert("Error Deleting Info");
        location.href ="account.php";
    </script>
<?php
}

}

//For Updating Scholar Accounts

if(isset($_POST['update_scholars'])){

    $updscholars_id = $_GET['id'];
    $email = $_POST['email'];
    $student_name = $_POST['student_name'];
    $contact = $_POST['contact'];
    $id_no = $_POST['id_no'];
    $year_level = $_POST['year_level'];
    $course = $_POST['course'];
    $department = $_POST['department'];
    $status= $_POST['status'];

    $update_scholar = mysqli_query($conn, "UPDATE scholars SET email='$email', student_name='$student_name', contact='$contact', id_no='$id_no', year_level='$year_level',course='$course', department='$department', status = '$status' WHERE id='$updscholars_id'");
    if($update_scholar == true){
        ?>
            <script>
                alert("Scholar Information Updated!");
                location.href='account.php';
            </script>
        <?php
    }else{
        ?>
    
           <script>
                alert("Error Updating Info!");
                location.href='account.php';
            </script>
        <?php
    }
}

//For deleting Scholar Accounts

if(isset($_POST['delete_scholars'])){

    $scholars_id = $_GET['id'];
    
    $del_scholar = mysqli_query($conn, "DELETE FROM scholars WHERE id='$scholars_id'");
    
    if($del_scholar == TRUE){
        ?>
            <script>
                alert("Scholars Information Deleted");
                location.href ="account.php";
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Error Deleting Info");
            location.href ="account.php";
        </script>
    <?php
    }
    
    }

//For Updating Admin Profile
if(isset($_POST['update_profile'])){

    $updadmin_id = $_GET['id'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $update_admin = mysqli_query($conn, "UPDATE admin SET fullname ='$fullname', address ='$address', contact='$contact',  email='$email', password='$password' WHERE id='$updadmin_id'");

    if($update_admin == true){
        ?>
            <script>
                alert("Admin Information Updated!");
                location.href='users-profile.php';
            </script>
        <?php
    }else{
        ?>
    
           <script>
                alert("Error Updating Info!");
                location.href='users-profile.php';
            </script>
        <?php
    }
}

//Announcement Update

if(isset($_POST['upd_announcement'])){

    $announce_id = $_GET['id'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $date = $_POST['date'];


    $update_announcement = mysqli_query($conn, "UPDATE announcements SET title ='$title',  message='$message', date='$date' WHERE id='$announce_id'");

    if($update_announcement == true){
        ?>
            <script>
                alert("Announcement Informations Updated!");
                location.href='announcement.php';
            </script>
        <?php
    }else{
        ?>
    
           <script>
                alert("Error Updating Annoucement!");
                location.href='announcement.php';
            </script>
        <?php
    }
}

//for creating semester 
if(isset($_POST['set_sem'])){

    $sem = $_POST['semester'];
    $year = $_POST['year'];


    $check_year = mysqli_query($conn,"SELECT * FROM semester WHERE school_year = '$year'");
    $year_num = mysqli_num_rows($check_year);
    if($year_num >=1 ){
        ?>
            <script>
                alert("School Year Already Set!");
                location.href='set-sem.php';
            </script>
        <?php
    }else{
        $set_sem = mysqli_query($conn,"INSERT INTO semester VALUES('0','$sem','$year')");

        if($set_sem == true){
            ?>
                <script>
                    alert("Semester Set Successfully!");
                    location.href='set-sem.php';
                </script>
            <?php
        }else{
            ?>
            <script>
                alert("Error Setting Semester!");
                location.href='set-sem.php';
            </script>
        <?php 
        }
    }
}

//editing semester


?>