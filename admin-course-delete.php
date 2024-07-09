<?php
// $con = new mysqli("localhost", "root", "", "learnify");
include_once('connect.php');

session_start();
// if($con) {
//           echo "Connected!";
// }
// else {
//           echo "Connection Failed";
// }


$cid = $_REQUEST['courseID'];

$sql = "DELETE FROM `courses` WHERE course_id='$cid'";
$con->query($sql);

if ($con) {
          ?>
                    <script>
                              alert("course deleted successfully...");
                              window.location.href = "admin-course-list.php";
                    </script>
          <?php
}


if (!isset($_SESSION['admin-name'])) {
          header('Location: login.php');
}
?>

