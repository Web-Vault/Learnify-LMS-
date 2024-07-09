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

          $uid = $_REQUEST['user_id'];
          echo $uid; 

          $sql = "DELETE FROM `users_data` WHERE userID='$uid'"; 

          $con->query($sql);

          if ($con) {
                    ?>
                              <script>
                                        alert("User deleted successfully...");
                                        window.location.href = "admin-dashboard.php";
                              </script>
                    <?php
          }


          if (!isset($_SESSION['admin-name'])) {
                    header('Location: login.php');
          }
?>