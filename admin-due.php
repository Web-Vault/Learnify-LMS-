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



                    /*  */


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

                    /*  */

                    .content-header {
                              margin: 2% 5%;
                              font-size: xx-large;
                              color: #000;
                    }

                    .content-sup-text {
                              color: #000;
                    }

                    /*  */

                    .login-form {
                              width: 550px;
                              margin: auto;
                              padding: 2%;
                              box-shadow: 0 0 20px var(--form-shadow-color);
                              background-color: var(--form-bg-color);
                              border-radius: 10px;
                    }

                    .logo-text {
                              text-align: center;
                              padding: 30px 20px;
                              margin-bottom: 20px;
                              border-bottom: 2px solid var(--form-text-color);
                              color: var(--form-text-color);
                              font-size: 24px;
                    }

                    .field {
                              margin: 10px 0;
                    }

                    .input,
                    .next {
                              width: 100%;
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
                    }

                    .next>input:hover {
                              background-color: var(--input-hover-bg-color);
                    }

                    /*  */

                    .task-card {
                              background-color: var(--form-bg-color);
                              border: 1px solid var(--form-border-color);
                              border-radius: 8px;
                              padding: 20px;
                              margin: 2% 5%;
                    }

                    .task-details h2 {
                              margin-top: 0;
                              margin-bottom: 10px;
                    }

                    .details-table .row {
                              display: flex;
                              margin-bottom: 10px;
                    }

                    .details-table .label {
                              flex-basis: 30%;
                              font-weight: bold;
                    }

                    .details-table .value {
                              flex-grow: 1;
                    }

                    /*  */

                    .search {
                              display: flex;
                              justify-content: space-between;

                    }

                    .field select {
                              font-size: 16px;
                              padding: 12px;
                              width: 100%;
                              height: 50px;
                              border-radius: 5px;
                              border: 1px solid var(--form-border-color);
                              background-color: var(--input-bg-color);
                              margin-bottom: 10px;
                    }

                    /* CSS for button */
                    .field .btn {
                              width: 90%;
                              height: 50px;
                              font-size: 16px;
                              padding: 12px 20px;
                              border-radius: 5px;
                              border: none;
                              cursor: pointer;
                              background-color: var(--button-bg-color);
                              color: var(--button-text-color);
                              transition: background-color 0.3s ease;
                    }

                    .field .btn:hover {
                              background-color: var(--input-hover-bg-color);
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
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/order-delivered.png" alt="Dashboard" /> <span>Dashboard</span></div>
                                        </a>
                                        <a href="admin-course-list.php">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/rules-book.png" alt="rules-book" /> <span>Courses</span></div>
                                        </a>
                                        <a href="admin-all-users.php">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/quiz.png" alt="all-users" /> <span>Users</span> </div>
                                        </a>
                                        <a href="admin-notification.php">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/notification-center.png" alt="notification-center" />
                                                            <span>Announcements</span>
                                                  </div>
                                        </a>
                                        <a href="admin-due.php">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" /> <span>Dead-Lines</span></div>
                                        </a>

                                        <a>
                                                  <div class="nav-item" onclick="logout()"> <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/door-opened.png" alt="door-opened" /> <span>Logout</span> </div>
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
                              $sql = "SELECT * FROM `users_data`";

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

                              $result = $con->query($sql);

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
                                                            <p class="count">
                                                                      <?php echo $cc; ?>
                                                            </p>
                                                  </div>
                                                  <div class="counter">
                                                            <p class="counter-info">KnowiFy Notifications</p>
                                                            <p class="count">
                                                                      <?php echo $cn; ?>
                                                            </p>
                                                  </div>
                                        </div>

                                        <!--  -->


                                        <div class="task-form-container">
                                                  <form action="" method="post" class="login-form">
                                                            <div class="logo-text">
                                                                      Post a Task
                                                            </div>

                                                            <div class="field">
                                                                      <div class="input">
                                                                                <input type="text" name="task-name" id="ID" placeholder="Task name...">
                                                                      </div>
                                                            </div>
                                                            <div class="field">
                                                                      <div class="input">
                                                                                <input type="text" name="task-description" id="email" placeholder="Task Description...">
                                                                      </div>
                                                            </div>
                                                            <div class="field">
                                                                      <div class="input">
                                                                                <input type="datetime-local" name="due-date" id="password" placeholder="Due date...">
                                                                      </div>
                                                            </div>

                                                            <div class="field">
                                                                      <div class="search">
                                                                                <div class="input">
                                                                                          <select name="division" id="divisionSelect">
                                                                                                    <option value="">All</option>
                                                                                                    <?php
                                                                                                    $select = "SELECT division FROM users_data GROUP BY division";
                                                                                                    $result = $con->query($select);

                                                                                                    if ($result->num_rows > 0) {
                                                                                                              while ($row = $result->fetch_assoc()) {
                                                                                                                        echo '<option value="' . htmlspecialchars($row['division']) . '">' . htmlspecialchars($row['division']) . '</option>';
                                                                                                              }
                                                                                                    } else {
                                                                                                              echo '<option disabled>No divisions found</option>';
                                                                                                    }
                                                                                                    ?>
                                                                                          </select>
                                                                                </div>
                                                                      </div>
                                                            </div>

                                                            <div class="field">
                                                                      <div class="next">
                                                                                <input type="submit" name="submit" id="submit" value="Assign task">
                                                                      </div>
                                                            </div>
                                                  </form>
                                        </div>



                                        <!--  -->

                                        <?php
                                        if (isset($_POST['submit'])) {
                                                  $task_name = $_POST['task-name'];
                                                  $task_desc = $_POST['task-description'];
                                                  $due_date = $_POST['due-date'];

                                                  $selected_div = $_POST['division'];
                                                  $escaped_selected_div = addslashes($selected_div);

                                                  $add_task = "INSERT INTO `task`( `task_name`, `task_desc`, `task_due`, `division`) VALUES ('$task_name','$task_desc','$due_date','$escaped_selected_div')";
                                                  if($con->query($add_task)){
                                                            echo "<script>alert('task added successfully...');</script>";
                                                  }
                                        }
                                        ?>


                                        <!-- previous tasks -->


                                        <div class="last-tasks">

                                                  <div class="main-header">
                                                            <div class="content-header">Previous assignment</div>
                                                            <hr>
                                                  </div>

                                                  <?php
                                                  $sql = "SELECT * FROM `task` ";
                                                  $result = $con->query($sql);

                                                  if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                      $fetch_count = "SELECT COUNT(*) as counts FROM task_uploaders WHERE task_id = {$row['task_id']}";
                                                                      $counts = $con->query($fetch_count);
                                                                      $count_row = $counts->fetch_assoc();
                                                                      $num_count = $count_row['counts'];


                                                                      echo '<div class="task-card">
                                                                      <div class="task-details">
                                                                                <h2>Task Details</h2>
                                                                                <div class="details-table">
                                                                                          <div class="row">
                                                                                                    <div class="label">Task ID:</div>
                                                                                                    <div class="value">' . $row['task_id'] . '</div>
                                                                                          </div>
                                                                                          <div class="row">
                                                                                                    <div class="label">Task Name:</div>
                                                                                                    <div class="value">' . $row['task_name'] . '</div>
                                                                                          </div>
                                                                                          <div class="row">
                                                                                                    <div class="label">Description:</div>
                                                                                                    <div class="value">' . $row['task_desc'] . '</div>
                                                                                          </div>
                                                                                          <div class="row">
                                                                                                    <div class="label">Due Date:</div>
                                                                                                    <div class="value">' . $row['task_due'] . '</div>
                                                                                          </div>
                                                                                          <div class="row">
                                                                                                    <div class="label">Number of Completions:</div>
                                                                                                    <div class="value">' . $num_count . '</div>
                                                                                          </div>
                                                                                </div>
                                                                      </div>
                                                            </div>';
                                                            }
                                                  }
                                                  ?>



                                                  <!--  -->

                                        </div>
                              </div>
                    </div>
          </main>
</body>

</html>