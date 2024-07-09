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

if (!isset($_SESSION['admin-name'])) {
          header('Location: login.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Dashboard | Admin</title>

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



                    .counters {
                              /* border: 1px solid black; */
                              width: 95%;
                              margin: 2% auto 5%;
                              display: flex;
                              justify-content: space-around;
                    }

                    .counter {
                              border: 1px solid #555;
                              width: 30%;
                              margin: auto;
                              border-radius: 1rem;
                              background-color: #555;
                              color: #fff;
                              box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.5);
                    }

                    .counter-info {
                              font-size: xx-large;
                              margin: 5% auto;
                              padding: 3%;
                              text-align: center;
                    }

                    .count {
                              font-size: x-large;
                              margin: 3% auto;
                              padding-bottom: 3%;
                              text-align: center;
                    }

                    .user-list {
                              border: 1px solid black;
                              border-radius: 1rem;
                              box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.5);
                              width: 90%;
                              margin: auto;
                              /* padding-bottom: 1%; */
                    }

                    .course-card-part {
                              /* border: 1px solid black; */
                              width: 90%;
                              display: flex;
                              flex-direction: column;
                              justify-content: flex-start;
                              flex-wrap: wrap;
                              margin: 2.4%;
                    }

                    .content-header {
                              font-size: xx-large;
                              color: #000;
                    }


                    .single {
                              display: flex;
                              justify-content: space-around;
                              margin-bottom: 20px;
                              border-bottom: 2px solid black;
                    }

                    .single-detail {
                              margin: 1.51%;
                              width: 100%;
                              text-align: left;
                              font-size: larger;
                              text-align: left;
                              display: flex;
                              align-items: center;
                              /* border: 1px solid black; */
                              /* margin-left: 5%; */
                    }

                    .single-detail>a {
                              color: #000;
                    }

                    .course-img-name {
                              height: 70px;
                              width: 70px;
                              border-radius: 50%;
                              object-fit: cover;
                              object-position: center;
                    }

                    .control {
                              display: flex;
                              justify-content: end;
                              align-items: center;
                    }

                    .btn {
                              width: 40%;
                              font-size: large;
                              margin: 0.5em;
                              border: none;
                              border-radius: 0.351rem;
                              padding: 5%;
                              display: flex;
                              justify-content: center;
                              background-color: #555;
                              color: #fff;
                              cursor: pointer;
                              /* margin: auto; */
                    }

                    a.btn {
                              color: #fff;
                    }

                    .add-user-btn {
                              /* border: 1px solid black; */
                              height: 60px;
                              width: 60px;
                              background-color: #d9d9d9;
                              box-shadow: inset 0 0 15px 0 rgba(0, 0, 0, 0.65);
                              border-radius: 0.552rem;
                              /* position: relative; */
                              /* right: -40%; */
                              /* top: -25px; */
                              margin: 2% auto;
                              display: flex;
                              justify-content: center;
                              align-items: center;
                    }

                    .edit-btn-pos {
                              margin: 2.4%;
                              display: flex;
                              justify-content: end;
                    }

                    .edit-user {
                              border: 1px solid black;
                              border-radius: 1rem;
                              /* box-shadow: ; */
                              box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.4);
                              margin: 2% 5%;
                    }

                    .new {
                              margin-top: 2%;
                    }

                    .add-course {
                              border: 1px solid black;
                              width: 90%;
                              margin: auto;
                              /* display: flex; */
                              /* justify-content: space-around; */
                              /* align-items: center; */
                              border-radius: 1rem;
                              box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.4);
                    }

                    .add-course>form {
                              /* border: 1px solid black; */
                              width: 90%;
                              margin: 2% auto;
                              padding: 1% 2%;
                    }

                    .input {
                        width: 100%;
                }

                .next {
                        width: 80%;
                }

                input {
                        font-size: 16px;
                        padding: 12px;
                        height: 50px;
                        width: 100%;
                        border-radius: 5px;
                        border: 1px solid var(--form-border-color);
                        background-color: var(--input-bg-color);
                }

                .next>input {
                        background-color: var(--button-bg-color);
                        color: var(--button-text-color);
                        border: none;
                        cursor: pointer;
                        transition: background-color 0.3s ease;
                        width: 90% !important;
                }

                .next>input:hover {
                        background-color: var(--input-hover-bg-color);
                }


                .field {
                        margin: 10px 0;
                }

                .input {
                        width: 100%;
                }

                input[type="text"],
                input[type="file"] {
                        font-size: 16px;
                        padding: 12px;
                        height: 50px;
                        width: calc(100% - 24px);
                        border-radius: 5px;
                        border: 1px solid var(--form-border-color);
                        background-color: var(--input-bg-color);
                        margin-bottom: 10px;
                }

                textarea {
                        font-size: 16px;
                        padding: 12px;
                        width: calc(100% - 24px);
                        border-radius: 5px;
                        border: 1px solid var(--form-border-color);
                        background-color: var(--input-bg-color);
                        margin-bottom: 10px;
                        resize: vertical;
                        min-height: 100px;
                }


                input[type="submit"] {
                        font-size: 16px;
                        padding: 12px 0;
                        width: 100%;
                        border-radius: 5px;
                        border: none;
                        cursor: pointer;
                        background-color: var(--button-bg-color);
                        color: var(--button-text-color);
                        transition: background-color 0.3s ease;
                }

                input[type="submit"]:hover {
                        background-color: var(--input-hover-bg-color);
                }


                /*  */

                .field {
                        display: flex;
                        justify-content: space-around;
                        align-items: center;
                        margin: 2% 0;
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

<body>
          <main>
                    <div class="sidebar">
                              <div class="logo-text">
                              LearniFy
                              </div>
                              <nav class="navigation">
                                        <a href="admin-dashboard.php">
                                                  <div class="nav-item"><img width="30" height="30"
                                                                      src="https://img.icons8.com/ios-glyphs/30/order-delivered.png"
                                                                      alt="Dashboard" /> <span>Dashboard</span></div>
                                        </a>
                                        <a href="admin-course-list.php">
                                                  <div class="nav-item"><img width="30" height="30"
                                                                      src="https://img.icons8.com/ios-glyphs/30/rules-book.png"
                                                                      alt="rules-book" /> <span>Courses</span></div>
                                        </a>
                                        <a href="admin-all-users.php">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/quiz.png" alt="all-users" /> <span>Users</span> </div>
                                        </a>
                                        <a href="admin-notification.php">
                                                  <div class="nav-item"><img width="30" height="30"
                                                                      src="https://img.icons8.com/ios-glyphs/30/notification-center.png"
                                                                      alt="notification-center" />
                                                            <span>Announcements</span></div>
                                        </a>
                                        <!-- <a href="#">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" /> <span>Profile</span></div>
                                        </a> -->

                                        <a href="login.php">
                                                  <div class="nav-item"> <img width="30" height="30"
                                                                      src="https://img.icons8.com/ios-glyphs/30/door-opened.png"
                                                                      alt="door-opened" /> <span>Logout</span></div>
                                        </a>
                              </nav>
                    </div>

                    <div class="main">
                              <div class="main-header">
                                        <p class="header-text">Welcome to LearniFy,
                                                  <?php echo $_SESSION['admin-name']; ?>!
                                        </p>
                                        <hr>
                              </div>

                              <?php
                              $countQuery = "SELECT COUNT(*) AS user_count FROM `users_data`";
                              $user_num = $con->query($countQuery);

                              $countCourse = "SELECT COUNT(*) AS course_count FROM `courses` ";
                              $course_num = $con->query($countCourse);

                              $countNotification = "SELECT COUNT(*) AS notification_count FROM `notification` ";
                              $count_noti = $con->query($countNotification);

                              if ($user_num) {
                                        $row = $user_num->fetch_assoc();

                                        $count = $row['user_count'];
                              }

                              if ($course_num) {
                                        $row = $course_num->fetch_assoc();

                                        $cc = $row['course_count'];
                              }

                              if ($count_noti) {
                                        $row = $count_noti->fetch_assoc();

                                        $cn = $row['notification_count'];
                              }
                              ?>

                              <div class="main-area">
                                        <div class="counters">
                                                  <div class="counter">
                                                            <p class="counter-info">KnowiFy Users</p>
                                                            <p class="count">
                                                                      <?php echo $count; ?>
                                                            </p>
                                                  </div>
                                                  <div class="counter">
                                                            <p class="counter-info">KnowiFy Courses</p>
                                                            <p class="count"><?php echo $cc; ?></p>
                                                  </div>
                                                  <div class="counter">
                                                            <p class="counter-info">KnowiFy Notifications</p>
                                                            <p class="count"><?php echo $cn; ?></p>
                                                  </div>
                                        </div>

                                        <div class="user-list">
                                                  <div class="course-card-part">
                                                            <div class="content-header">User Control Center</div>
                                                  </div>

                                                  <div class="all-users">


                                                            <?php
                                                            $sql = "SELECT * FROM `courses` ";
                                                            $result = $con->query($sql);

                                                            if ($result->num_rows > 0) {
                                                                      while ($row = $result->fetch_assoc()) {
                                                                                $course_id = $row['course_id'];
                                                                                $img = $row['course_img'];
                                                                                $course_name = $row['course_name'];
                                                                                ?>
                                                                                <div class="single">
                                                                                          <div class="single-detail profile">
                                                                                                    <img width="50" src="course-images/<?php
                                                                                                    if (empty($row['course_img'])) {
                                                                                                              echo "default_course.png";
                                                                                                    } else {
                                                                                                              echo $row['course_img'];
                                                                                                    }
                                                                                                    ?>" alt="Course image"
                                                                                                              class="course-img-name">
                                                                                          </div>
                                                                                          <div class="single-detail">
                                                                                                    <a
                                                                                                              href="admin-course-index.php?courseID=<?php echo $course_id; ?> ">
                                                                                                              <?php echo $course_name ?>
                                                                                                    </a>
                                                                                          </div>
                                                                                          <div class="single-detail control">
                                                                                                    <a href="admin-course-content-edit.php?courseID=<?php echo $course_id; ?> "
                                                                                                              class="btn"> Edit Course</a>
                                                                                                    <a href="admin-course-delete.php?courseID=<?php echo $course_id; ?> "
                                                                                                              class="btn">Delete Course</a>
                                                                                          </div>
                                                                                </div>
                                                                                <?php
                                                                      }
                                                            }
                                                            ?>

                                                  </div>
                                                  
                                        </div>
                              </div>

                              <div class="new">

                                        <div class="main-header">
                                                  <p class="header-text">Add A New Course... </p>
                                                  <hr>
                                        </div>

                                        <div class="add-course" id="add">
                                                  <form action="#" method="post">
                                                            <div class="field">
                                                                      <div class="input">
                                                                                <input type="text" name="course-name"
                                                                                          id="course-name"
                                                                                          placeholder="Course Name...">
                                                                      </div>
                                                                      <div class="input">
                                                                                <input type="file" name="course-img"
                                                                                          placeholder="Course Image...">
                                                                      </div>
                                                            </div>

                                                            <div class="field">
                                                                      <div class="input">
                                                                                <textarea name="desc" id="desc"
                                                                                          placeholder="Course Description..."></textarea>
                                                                      </div>
                                                            </div>

                                                            <div class="field">
                                                                      <div class="input">
                                                                                <input type="hidden"
                                                                                          name="recovery-mail"
                                                                                          id="recovery-mail"
                                                                                          placeholder="Recovery Email...">
                                                                      </div>
                                                                      <div class="next">
                                                                                <input type="submit"
                                                                                          value="Commit Changes...."
                                                                                          name="submit"
                                                                                          class="next-btn">
                                                                      </div>

                                                            </div>
                                                  </form>


                                                  <?php
                                                  if (isset($_POST['submit'])) {
                                                            $name = $_POST['course-name'];
                                                            $img = $_FILES['course_img']['name'];
                                                            $desc = $_POST['desc'];

                                                            $sql = "INSERT INTO `courses`(`course_img`, `course_name`, `course_desc`) VALUES ('$img','$name','$desc')";
                                                            $con->query($sql);

                                                            ?>
                                                            <script>
                                                                      window.location.href = "admin-course-list.php";
                                                            </script>
                                                            <?php
                                                  }
                                                  ?>

                                        </div>

                              </div>

                              <footer>
                                        <p> &copy; KnowiFy, All Rights reserved</p>
                              </footer>
                    </div>
          </main>
</body>

</html>