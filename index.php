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


if (!isset($_SESSION['user-name'])) {
          header('Location: login.php');
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Dashboard | Student</title>

          <style>
                    /* 

                    Essentia 

                    */

                    :root {
                              --main-bg-color: #333333;
                              --form-bg-color: #FFFFFF;
                              --form-border-color: #CCCCCC;
                              --form-shadow-color: rgba(0, 0, 0, 0.1);
                              --form-text-color: #333333;
                              --input-bg-color: #F9F9F9;
                              --input-hover-bg-color: #222222;
                              --button-bg-color: #333333;
                              --button-text-color: #FFFFFF;
                              --footer-bg-color: #333333;
                              --footer-text-color: #FFFFFF;
                              --link-color: #666666;
                              --link-hover-color: #555555;
                    }

                    @import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@100..900&family=Montserrat+Alternates:wght@500&display=swap');


                    html {
                              scroll-behavior: smooth;
                    }

                    * {
                              padding: 0;
                              margin: 0;
                              box-sizing: border-box;
                              font-family: "Big Shoulders Stencil Text", sans-serif;
                              letter-spacing: 0.7px;
                              text-decoration: none;
                    }

                    main {
                              /* border: 1px solid black; */
                              display: flex;
                              min-height: 100vh;
                              /* background-color: #555; */
                    }

                    .sidebar {
                              background-color: var(--main-bg-color);
                              flex-basis: 20%;
                    }

                    .main {
                              background-color: var(--form-bg-color);
                              color: var(--main-bg-color);
                              flex-basis: 80%;
                              /* border-radius: 1rem 0 0 1rem; */
                              /* box-shadow: -5px 5px 15px 5px rgba(255, 255, 255, 0.251); */
                    }


                    @media screen and (max-width: 768px) {
                              main {
                                        flex-direction: column;
                              }

                              .sidebar {
                                        flex-basis: auto;
                                        width: 100%;
                                        border-radius: 0;
                              }

                              .main {
                                        flex-basis: auto;
                                        border-radius: 0;
                                        box-shadow: none;
                              }
                    }


                    /* 
                    
                    Side Navigation Bar
                    
                    */

                    .logo-text {
                              text-align: center;
                              padding: 20px;
                              /* border: 1px solid black; */
                              color: #fff;
                              font-size: 40px;
                    }


                    .nav-item {
                              /* border: 1px solid black; */
                              background-color: var(--form-bg-color);
                              box-shadow: inset 0 0 5px rgba(0, 0, 0, 1);
                              max-width: 75%;
                              height: 60px;
                              margin: 3% auto;
                              display: flex;
                              justify-content: space-between;
                              padding: 3.5%;
                              border-radius: 1rem;
                    }

                    .nav-item>img {
                              width: 20%;
                              height: auto;
                              /* background-color: #fff; */
                    }

                    .nav-item>span {
                              width: 80%;
                              color: var(--main-bg-color);
                              text-decoration: none;
                              font-size: 20px;
                              text-align: left;
                              margin: auto;
                              margin-left: 10%;
                    }

                    @media screen and (max-width: 768px) {
                              .logo-text {
                                        font-size: 30px;
                              }

                              .nav-item {
                                        width: 80%;
                              }

                              .nav-item>img {
                                        width: 15%;
                              }

                              .nav-item>span {
                                        width: 70%;
                                        font-size: x-large;
                                        margin-left: 5%;
                              }
                    }


                    /* 
                    
                    Main Area 

                    */


                    .header-text {
                              font-size: 40px;
                              padding: 20px 30px;
                              color: #000;
                              /* border-bottom: 1px solid black; */
                    }

                    .main-header>hr {
                              width: 90%;
                              padding: 1px;
                              margin-left: 30px;
                              background-color: #000;
                    }

                    .course-card-part {
                              /* border: 1px solid black; */
                              display: flex;
                              justify-content: flex-start;
                              flex-wrap: wrap;
                              margin: 1% auto;
                    }


                    @media screen and (max-width: 768px) {
                              .header-text {
                                        font-size: 30px;
                                        padding: 15px 20px;
                              }

                              .main-header>hr {
                                        width: 65%;
                                        margin-left: 20px;
                              }

                              .course-card-part {
                                        margin: 4% 5px;
                              }
                    }



                    /*  */

                    .card {
                              background-color: var(--form-bg-color);
                              color: var(--main-bg-color);
                              width: 335px;
                              height: 427px;
                              margin: 1% 2%;
                              display: flex;
                              align-items: center;
                              flex-direction: column
                    }

                    .card-info {
                              width: 320px;
                              height: 425px;
                              border-radius: 20px;
                              background: #555555;
                              display: flex;
                              align-items: center;
                              flex-direction: column
                    }

                    .course-img {
                              width: 321px;
                              height: 208px;
                              border-radius: 20px;
                              display: flex
                    }

                    .course-info {
                              width: 279px;
                              height: 93px;
                              margin-top: 21px;
                              display: flex;
                              justify-content: space-between;
                              flex-direction: column
                    }

                    .course-name {
                              color: #FFFFFF;
                              font-size: 25px;
                              font-weight: 700;
                              white-space: nowrap;
                              overflow: hidden;
                              text-overflow: ellipsis;
                    }


                    .course-desc {
                              width: 279px;
                              height: 48px;
                              color: #FFFFFF;
                              font-size: 20px;
                              display: -webkit-box;
                              overflow: hidden;
                              white-space: normal;
                              -webkit-line-clamp: 2;
                              -webkit-box-orient: vertical;
                              display: flex
                    }

                    .enroll-btn {
                              width: 276px;
                              height: 39px;
                              margin-top: 44px;
                              border-radius: 10px;
                              background-color: var(--button-bg-color);
                              color: var(--button-text-color);
                              box-shadow: 0px 5px 10px 1px rgba(0, 0, 0, 0.25);
                              display: flex;
                              align-items: center;
                              flex-direction: column
                    }

                    .btn-text {
                              cursor: pointer;
                              width: 100%;
                              text-align: center;
                              height: 100%;
                              border: none;
                              background: transparent;
                              color: var(--button-text-color);
                              white-space: nowrap;
                              display: flex
                    }

                    .btn-text>span {
                              width: 100%;
                              text-align: center;
                              margin: auto;
                    }


                    @media screen and (max-width: 768px) {
                              .card {
                                        width: 100%;
                                        height: auto;
                                        margin: 1% 0;
                                        flex-direction: column;
                              }

                    }


                    /* 
                    
                    footer
                    
                    */

                    footer>p {
                              /* border: 1px solid black; */
                              background-color: var(--main-bg-color);
                              color: var(--footer-text-color);
                              font-size: large;
                              margin-top: 1.2%;
                              
                              padding: 2%;
                    }

                    @media screen and (max-width: 768px) {
                              footer>p {
                                        border-radius: 0;
                              }
                    }
          </style>

</head>



<?php
$uid = $_REQUEST['uid'];
$clean_uid = trim($uid, "'");
$user_id = trim($clean_uid);
// echo $user_id;

?>



<body>
          <main>
                    <div class="sidebar">
                              <div class="logo-text">
                              LearniFy
                              </div>
                              <nav class="navigation">
                                        <a href="index.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/order-delivered.png" alt="Dashboard" /> <span>Dashboard</span></div>
                                        </a>
                                        <a href="my-courses.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/rules-book.png" alt="rules-book" /> <span>My Courses</span></div>
                                        </a>
                                        <a href="colleagues.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/business-group.png" alt="business-group" /> <span>Colleagues</span></div>
                                        </a>
                                        <a href="notification.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/notification-center.png" alt="notification-center" /> <span>Announcements</span></div>
                                        </a>
                                        <a href="profile.php?uid=<?php echo trim($user_id, "'"); ?>">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" /> <span>Profile</span></div>
                                        </a>
                                        <a href="due.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/quiz.png" alt="quiz" /> <span>Tasks</span> </div>
                                </a>
                                        <a>
                                                  <div class="nav-item" onclick="logout()"> <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/door-opened.png" alt="door-opened" /> <span>Logout</span> </div>
                                        </a>
                              </nav>
                    </div>
                    <div class="main">
                              <div class="main-header">
                                        <p class="header-text">Hello, <?php echo $_SESSION['user-name']; ?>! Discover Your Interest With LearniFy.</p>
                                        <hr>
                              </div>

                              <div class="course-card-part">
                                        <?php
                                        $sql = "SELECT * FROM `courses` ";
                                        $result = $con->query($sql);

                                        if ($result->num_rows >= 1) {
                                                  while ($row = $result->fetch_assoc()) {
                                                            $course_id = $row['course_id'];

                                                            $img = $row['course_img'];
                                                            $name = $row['course_name'];
                                                            $desc = $row['course_desc'];

                                                             $check = "SELECT * FROM `fav_courses` WHERE `course_id` = $course_id";
                                                              $find = $con->query($check);

                                                              if($find->num_rows > 0 ){
                                                                $check_row = $find->fetch_assoc();
                                                                $check_course_id = $check_row['course_id'];
                                                              }

                                                                    if($check_course_id != $course_id) {
                                                                      echo "<div class='card'>
                                                                                                  <div class='card-info'>
                                                                                                  <img src='course-images/" . (empty($row['course_img']) ? 'default_course.png' : $row['course_img']) . "' class='course-img' />
                                                                                        <div class='course-info'>
                                                                                        <span class='course-name'>
                                                                                                  $name
                                                                                        </span>
                                                                                        <span class='course-desc'>
                                                                                                  $desc
                                                                                        </span>
                                                                                        </div>
                                                                                        <a href='my-courses.php?uid=$user_id&course_id=$course_id'>
                                                                                        <form method='post'>
                                                                                                  <div class='enroll-btn'> 
                                                                                                 <button type='submit' name='enroll' class='btn-text'>
                                                                                                    <span>Click to accept invitation</span>
                                                                                                    </button>
                                                                                                        <input type='hidden' name='enroll' value='$course_id'>
                                                                                                  </div>
                                                                                        </form>
                                                                                        </a>
                                                                                        </div>
                                                                              </div>";
                                                                    }
                                                  }
                                        }


                                        if (isset($_POST['enroll'])) {
                                                  $course_id = $_POST['enroll'];
                                                  // echo $user_id;

                                                  $check = "SELECT * FROM `fav_courses` WHERE `course_id` = $course_id && `user_id` = '$user_id'";
                                                  $ckecked = $con->query($check);

                                                  if ($ckecked->num_rows == 1) {
                                                            echo "<script>alert('course is already enrolled.')</script>";
                                                  } else {
                                                            $sql = "INSERT INTO `fav_courses` (`user_id`, `course_id`) VALUES ('$user_id', '$course_id')";

                                                            $fire = $con->query($sql);

                                                            if ($fire) {
                                                              echo "<script>alert('course enrolled successfully!');window.location.href='index.php?uid=$user_id'</script>";
                                                            }
                                                  }
                                        }

                                        if (isset($_POST['enrolled'])) {
                                          ?>
                                                    <script>
                                                              window.location.href = "c-index.php?uid=<?php echo $user_id; ?>&course_id=<?php echo $course_id; ?>";
                                                    </script>
                                          <?php
                                          }
                                        ?>
                              </div>




                                <div class="course-card-part">

                                </div>

                              <!-- <footer>
        <p> &copy; KnowiFy, All Rights reserved</p>
      </footer> -->
                    </div>

          </main>
</body>
</body>



<script>
          function logout() {
                    window.location.href = "logout.php";
          }
</script>


</html>