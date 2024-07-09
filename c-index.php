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
          <title>KnowiFy</title>

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
                              flex-direction: column;
                              justify-content: flex-start;
                              flex-wrap: wrap;
                              margin: 2% 5%;
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

                    .course-name {
                              width: 90%;
                              display: flex;
                              align-items: center;
                              margin: 0 0 2% 2.4%;
                    }

                    .course-img-name {
                              height: 70px;
                              width: 70px;
                              border-radius: 50%;
                              object-fit: cover;
                              object-position: center;
                    }

                    .course-name-heading {
                              font-size: xx-large;
                              color: #000;
                              margin-left: 2%;
                    }

                    @media screen and (max-width: 768px) {
                              .course-name {
                                        width: 95%;
                                        /* Adjusted width for smaller screens */
                                        margin: 2% auto;
                                        /* Adjusted margins for smaller screens */
                              }

                              .course-img-name {
                                        height: 50px;
                                        /* Reduced height for smaller screens */
                                        width: 50px;
                                        /* Reduced width for smaller screens */
                              }

                              .course-name-heading {
                                        font-size: large;
                                        /* Reduced font size for smaller screens */
                                        margin-left: 2%;
                                        /* Adjusted margin for smaller screens */
                              }
                    }

                    /*  */

                    /* Define styles for the index container */
                    .index {
                              margin-bottom: 15px;
                              margin-left: 80px;
                    }
                    
                    .index a {
                              text-decoration: none;
                              color: #333;
                    }

                    .topic-n {
                              display: flex;
                              align-items: center;
                              padding: 10px;
                              border-bottom: 1px solid #333;
                    }

                    .topic-n img {
                              margin-right: 10px;
                    }

                    .topic-name {
                              font-size: 16px;
                              font-weight: bold;
                    }


                    @media screen and (max-width: 768px) {
                              .content-container {
                                        width: 90%;
                                        padding: 1.5%;
                                        font-size: 16px;
                              }

                              .index>a {
                                        font-size: 16px;
                              }

                              .topic-n {
                                        padding: 1.5%;
                              }

                              .topic-n>img {
                                        margin-left: 1%;
                              }

                              .topic-n>span {
                                        margin-left: 2%;
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

$uname = "select username from users_data where userID = '$user_id'";
$un = $con->query($uname);

if($un->num_rows == 1){
          $row = $un->fetch_assoc();
          $username = $row['username'];
}
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
                                        <a href="profile.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" /> <span>Profile</span></div>
                                        </a>
                                        <a href="due.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/quiz.png" alt="quiz" /> <span>Tasks</span> </div>
                                </a>
                                        <a href="#">
                                                  <div class="nav-item" onclick="logout()"> <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/door-opened.png" alt="door-opened" /> <span>Logout</span></div>
                                        </a>
                              </nav>
                    </div>
                    <div class="main">
                              <div class="main-header">
                                        <p class="header-text">Hello, <?php echo $username; ?>! Discover Your Interest With LearniFy.</p>
                                        <hr>
                              </div>

                              <div class="course-card-part">
                                        <div class="course-name">
                                                  <img src="course-images/php-course.jpg" alt="Course image" class="course-img-name">
                                                  <p class="course-name-heading">Web Programming With PHP</p>
                                        </div>

                                        <div class="course-name">
                                                  <div class="index">
                                                            <?php

                                                            if (isset($_REQUEST['course_id'])) {
                                                                      $course_id = $_REQUEST['course_id'];

                                                                      $sql = "SELECT * FROM `course_index` WHERE course_id = $course_id";
                                                                      $result = $con->query($sql);

                                                                      if ($result->num_rows > 0) {
                                                                                while ($row = $result->fetch_assoc()) {
                                                                                          $index_name = $row['index_name'];
                                                                                          $index_id = $row['index_id'];

                                                                                          echo "<a href='c-content.php?uid=$uid&indexID=$index_id&courseID=$course_id'>
                                                                                                                        <div class='topic-n'>
                                                                                                                                  <img width='30' height='30' src='https://img.icons8.com/ios-glyphs/30/ellipsis.png' alt='ellipsis' />
                                                                                                                                  <span class='topic-name'>$index_name</span>
                                                                                                                        </div>
                                                                                                              </a>";
                                                                                }
                                                                      } else {
                                                                                echo "No topics found for this course.";
                                                                      }
                                                            } else {
                                                                      echo "No course selected.";
                                                            }
                                                            ?>


                                                  </div>
                                        </div>
                              </div>
                              <footer>
                                        <p> &copy; KnowiFy, All Rights reserved</p>
                              </footer>
                    </div>

          </main>
</body>


<script>
          function logout() {
                    window.location.href = "logout.php";
          }
</script>


</html>