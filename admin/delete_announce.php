<?php 

include '../conn.php';

$del_id = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM announcements WHERE id = '$del_id'");

if($delete == true){
    ?>
    <script>
        alert("Announcement Deleted Successfully!");
        location.href='announcement.php';
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Error Deleting Announcement");
        location.href='announcement.php';
    </script>
    <?php
}

?>