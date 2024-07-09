<?php
        //   $con = new mysqli("localhost", "root", "", "learnify");
        include_once('connect.php');

          session_start();
          // if($con) {
          //           echo "Connected!";
          // }
          // else {
          //           echo "Connection Failed";
          // }

          $en_id = $_REQUEST['en_id'];
          echo $en_id; 

          $uid = $_SESSION['uid'];

          $sql = "DELETE FROM `fav_courses` WHERE enrollment_id='$en_id'"; 

          $con->query($sql);

          if ($con) {
                    ?>
                              <script>
                                        alert("Course deleted successfully...");
                                        window.location.href = "profile.php?uid=<?php echo $uid?>";
                              </script>
                    <?php
          }

          if (!isset($_SESSION['user-name'])) {
                    header('Location: login.php');
          }
?>