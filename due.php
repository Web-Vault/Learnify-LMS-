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

                    .content-header {
                              margin: 2% 5%;
                              font-size: xx-large;
                              color: #000;
                    }

                    .content-sup-text {
                              color: #000;
                    }

                    /*  */

                    /* CSS for Task Details Container */

                    .task-container {
                              width: 80%;
                              margin: 2% auto;
                              padding: 20px;
                              background-color: var(--form-bg-color);
                              border: 1px solid var(--form-border-color);
                              box-shadow: 0 2px 4px var(--form-shadow-color);
                              border-radius: 8px;
                              display: flex;
                              align-items: flex-start;
                    }

                    .task-details {
                              flex: 1;
                              margin-right: 20px;
                              flex-basis: 35%;
                    }

                    .task-details h1 {
                              font-size: 24px;
                              margin-bottom: 10px;
                              color: var(--form-text-color);
                    }

                    .task-details p {
                              font-size: 16px;
                              margin-bottom: 10px;
                              color: var(--form-text-color);
                    }

                    .task-details .deadline {
                              color: red;
                    }

                    .task-container form {
                              display: flex;
                              flex-direction: column;
                              align-items: flex-end;
                    }

                    .task-container label {
                              display: block;
                              font-size: 16px;
                              margin-bottom: 10px;
                              color: var(--form-text-color);
                    }

                    .task-container input[type="file"] {
                              display: none;
                    }

                    #uploadLabel {
                              cursor: pointer;
                              background-color: var(--button-bg-color);
                              color: var(--button-text-color);
                              padding: 10px 20px;
                              border-radius: 5px;
                              display: inline-block;
                    }

                    #uploadBtn {
                              background-color: var(--button-bg-color);
                              color: var(--button-text-color);
                              border: none;
                              padding: 10px 20px;
                              border-radius: 5px;
                              cursor: pointer;
                              transition: background-color 0.3s;
                    }

                    #uploadBtn:hover {
                              background-color: var(--input-hover-bg-color);
                    }

                    /*  */


                    .task-container {
                              border: 1px solid #ddd;
                              padding: 20px;
                              margin-bottom: 20px;
                    }

                    .task-details h1 {
                              margin-top: 0;
                    }

                    .completed-header {
                              margin-bottom: 15px;
                    }

                    .completed-header h2 {
                              color: #007700;
                              margin: 0;
                    }

                    .completion-date {
                              color: #666;
                              margin-top: 5px;
                              font-style: italic;
                    }

                    .completed-details {
                              padding-left: 20px;
                    }

                    .completed-details p {
                              margin: 5px 0;
                    }

                    .completed-details strong {
                              font-weight: bold;
                    }

                    .feedback-text {
                              color: #333;
                    }

                    textarea.feedback-text {
                              width: 100%;
                              padding: 10px;
                              margin-top: 10px;
                              border: 1px solid #ccc;
                              border-radius: 5px;
                              resize: vertical;
                              min-height: 100px;
                              font-family: Arial, sans-serif;
                              font-size: 14px;
                    }

                    textarea.feedback-text:focus {
                              outline: none;
                              border-color: #007bff;
                              box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
                    }

                    .no-pending {
                              margin: 0 5%;
                              font-size: 20px;
                              border-bottom: 1px solid black;
                              padding: 5px;
                              width: max-content;
                    }

                    /*  */

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
                                        <a href="notification.php?uid='<?php echo trim($user_id, "'"); ?>'">
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
                                        <p class="header-text">Hello, <?php echo $_SESSION['user-name']; ?>! Discover Your Interest With LearniFy.</p>
                                        <hr>
                              </div>

                              <div class="pending-assignment">

                                        <div class="main-header">
                                                  <div class="content-header">Pending assignment</div>
                                                  <!-- <hr> -->
                                        </div>

                                        <?php
                                        $fetch_div = "SELECT division FROM users_data WHERE userID = '$user_id'";
                                        $result_div = $con->query($fetch_div);

                                        if ($result_div->num_rows == 1) {
                                                  while ($row = $result_div->fetch_assoc()) {
                                                            $division = $row['division'];
                                                  }
                                        }

                                        $fetch_task = "SELECT * FROM `task` WHERE `division` = '$division' OR `division` = ''";
                                        $result_task = $con->query($fetch_task);

                                        if ($result_task->num_rows > 0) {
                                                  while ($row = $result_task->fetch_assoc()) {
                                                            $check_submit = "SELECT * FROM `task_uploaders` WHERE `user_id` = '$user_id' AND `task_id` = {$row['task_id']}";
                                                            $check_submit_result = $con->query($check_submit);

                                                            if ($check_submit_result->num_rows > 0) {
                                                                      // echo "<p class='no-pending'>no pending assignments....</p>";
                                                            } else {
                                        ?>
                                                                      <div class="task-container">
                                                                                <div class="task-details">
                                                                                          <h1>Task Details</h1>
                                                                                          <p>Task Name: <?php echo $row['task_name']; ?> </p>
                                                                                          <p>Task Description: <?php echo $row['task_desc']; ?></p>
                                                                                          <p class="deadline">Deadline: <?php echo $row['task_due']; ?> </p>
                                                                                </div>
                                                                                <form action="#" method="post" enctype="multipart/form-data">
                                                                                          <label for="fileUpload" id="uploadLabel">Choose File</label>
                                                                                          <input type="file" name="fileUpload" id="fileUpload">
                                                                                          <input type="hidden" name="task-id" value="<?php echo $row['task_id']; ?>">

                                                                                          <?php

                                                                                          $currentDate = new DateTime();

                                                                                          $taskDueDate = DateTime::createFromFormat('Y-m-d', $row['task_due']);
                                                                                          $taskDate = DateTime::createFromFormat('Y-m-d', $row['task_date']);

                                                                                          if ($taskDueDate > $currentDate && $taskDueDate > $taskDate) {
                                                                                          ?>
                                                                                                    <button type="submit" id="uploadBtn" name="upload">Upload</button>
                                                                                          <?php
                                                                                          } else {
                                                                                          ?>
                                                                                                    <button type="submit" id="uploadBtn" name="upload" disabled>Expired</button>
                                                                                          <?php
                                                                                          }
                                                                                          ?>

                                                                                          <textarea name="feedback" class="feedback-text" placeholder="write your thoughts.."></textarea>
                                                                                </form>
                                                                      </div>
                                        <?php
                                                            }
                                                  }
                                        } else {
                                                  echo "<p class='no-pending'>no pending assignments....</p>";
                                        }



                                        ?>



                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileUpload"])) {
                                                  $file = $_FILES["fileUpload"];
                                                  $feedback = $_POST['feedback'];
                                                  $t_id = $_POST['task-id'];

                                                  $uploadDir = 'uploads/';
                                                  $uploadedFile = $uploadDir . basename($file["name"]);

                                                  if (!file_exists($uploadDir)) {
                                                            mkdir($uploadDir);
                                                  }

                                                  if (!empty($file["tmp_name"]) && is_uploaded_file($file["tmp_name"])) {
                                                            if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
                                                                      echo "<p>File uploaded successfully.</p>";

                                                                      $submit_task = "INSERT INTO `task_uploaders`(`task_id`, `user_id`, `file`, `upload_feedback`) VALUES ($t_id,'$user_id','$uploadedFile','$feedback')";
                                                                      $success = $con->query($submit_task);

                                                                      if ($success) {
                                        ?>
                                                                                <script>
                                                                                          alert("Task has been successfully submitted.");
                                                                                          window.location.href = "due.php?uid=<?php echo $user_id; ?>";
                                                                                </script>
                                        <?php
                                                                      } else {
                                                                                echo "<p>Error in submitting task.</p>";
                                                                      }
                                                            } else {
                                                                      echo "<p>Error moving uploaded file.</p>";
                                                            }
                                                  } else {
                                                            echo "<p>No file selected or invalid file.</p>";
                                                  }
                                        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                  echo "<p>No file selected.</p>";
                                        }

                                        ?>
                              </div>

                              <div class="done-assignment">
                                        <div class="main-header">
                                                  <div class="content-header">Submitted assignment</div>
                                                  <!-- <hr> -->
                                        </div>


                                        <?php
                                        $submitted_task = "SELECT * 
                                        FROM task_uploaders 
                                        INNER JOIN task ON task_uploaders.task_id = task.task_id 
                                        WHERE task_uploaders.user_id = '$user_id'
                                        ";
                                        $result = $con->query($submitted_task);

                                        if ($result->num_rows > 0) {
                                                  while ($row = $result->fetch_assoc()) {
                                        ?>
                                                            <div class="task-container">
                                                                      <div class="task-details">
                                                                                <h1>Task Details</h1>
                                                                                <p>Task Name: <?php echo $row['task_name']; ?></p>
                                                                                <p>Task Description:<?php echo $row['task_desc']; ?></p>
                                                                                <p class="deadline">Deadline: <?php echo $row['task_due']; ?></p>
                                                                      </div>
                                                                      <div class="completed-task">
                                                                                <div class="completed-header">
                                                                                          <h2>Task Completed!</h2>
                                                                                          <p class="completion-date">Completion Date: <?php echo $row['time']; ?></p>
                                                                                </div>
                                                                                <div class="completed-details">
                                                                                          <p><strong>Uploaded File:</strong> <a href="<?php echo $row['file']; ?>" target="_blank"><?php echo "uploads/" . $row['file']; ?></a></p>
                                                                                          <p><strong>Feedback:</strong></p>
                                                                                          <p class="feedback-text"><?php echo $row['upload_feedback']; ?></p>
                                                                                </div>
                                                                      </div>
                                                            </div>
                                        <?php
                                                  }
                                        } else {
                                                  echo "<p class='no-pending'>no submitted assignments....</p>";
                                        }

                                        ?>
                              </div>
                    </div>
          </main>
</body>


<script>
          function logout() {
                    window.location.href = "logout.php";
          }
</script>

</html>