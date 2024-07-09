<!-- delete-content.php -->
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

$content_id = $_REQUEST['contentID'];
echo $content_id;

$sql = "DELETE FROM `course_content` WHERE content_id='$content_id'";

$con->query($sql);

if ($con) {
?>
          <script>
                    alert("User deleted successfully...");
                    window.location.href = "admin-course-content.php?courseID=1&indexID=1&headingID=1";
          </script>
<?php
}


// if (!isset($_SESSION['admin-name'])) {
// header('Location: login.php');
// }
?>