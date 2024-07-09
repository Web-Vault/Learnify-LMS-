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

                .main-header {
                        margin-bottom: 2%;
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
                        padding-bottom: 3%;
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

                .updation-part {
                        margin: 2% 5%;
                        /* box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.4); */
                        border: 1px solid black;
                        padding: 2.4%;
                        border-radius: 0.251rem;
                        width: 90%;
                        margin: auto;
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
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/order-delivered.png" alt="Dashboard" /> <span>Dashboard</span></div>
                                </a>
                                <a href="admin-course-list.php">
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/rules-book.png" alt="rules-book" /> <span>Courses</span></div>
                                </a>
                                <a href="admin-all-users.php">
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/quiz.png" alt="all-users" /> <span>Users</span> </div>
                                </a>
                                <a href="admin-notification.php">
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/notification-center.png" alt="notification-center" /> <span>Announcements</span></div>
                                </a>
                                <!-- <a href="#">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" /> <span>Profile</span></div>
                                        </a> -->

                                <a href="login.php">
                                        <div class="nav-item"> <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/door-opened.png" alt="door-opened" /> <span>Logout</span></div>
                                </a>
                        </nav>
                </div>


                <div class="main">
                        <div class="main-header">
                                <p class="header-text">Welcome to LearniFy, <?php echo $_SESSION['admin-name']; ?>! </p>
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
                                                <p class="count"><?php echo $count; ?></p>
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

                                <div class="edit-course" id="edit">
                                        <div class="course-card-part">
                                                <div class="main-header">
                                                        <p class="header-text">Edit Course's Description ! </p>
                                                        <hr>
                                                </div>


                                                <?php
                                                $course_id = $_REQUEST['courseID'];

                                                $sql =  "SELECT * FROM `courses` WHERE course_id = $course_id";
                                                $result = $con->query($sql);

                                                if ($result->num_rows >= 1) {
                                                        $row = $result->fetch_assoc();

                                                        $name = $row['course_name'];
                                                        $desc = $row['course_desc'];
                                                }
                                                ?>



                                                <div class="updation-part">
                                                        <form action="#" method="post">
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="text" name="course-name" id="course-name" value="<?php echo $name; ?>">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="hidden">
                                                                        </div>
                                                                </div>

                                                                <div class="field">
                                                                        <div class="input">
                                                                                <textarea name="my-bio" id="my-bio" placeholder="Course Description..."><?php echo $desc; ?></textarea>
                                                                        </div>
                                                                </div>

                                                                <div class="main-header">
                                                                        <p class="header-text">Edit Existing Topic's name ! </p>
                                                                        <hr>
                                                                </div>



                                                                <?php
                                                                $course_id = $_REQUEST['courseID'];

                                                                $sql = "SELECT * FROM `course_index` WHERE `course_id` = $course_id";
                                                                $result = $con->query($sql);

                                                                if ($result->num_rows >= 1) {
                                                                        while ($row = $result->fetch_assoc()) {
                                                                                $index = $row['index_id'];
                                                                                $index_name = $row['index_name'];

                                                                                echo '<div class="field">
                                                                                                    <div class="input">
                                                                                                    <input type="text" name="my-bio[' . $index . ']" placeholder="" value="' . $index_name . '">
                                                                                                    </div>';
                                                                ?>
                                                                                <!-- USING WHILE LOOP FETCH TOPIC ALL CONTENT TOPIC NAME WHICH INCLUDES CURRENT INDEX -->
                                                                                <!-- AGAIN USE WHILE LOOP ISIDE TOPIC LOOP TO FETCH CONTENT OF CURRENT TOPIC -->

                                                                <?php
                                                                                echo '</div>';
                                                                        }
                                                                } else {
                                                                        echo "No Index Found!";
                                                                }
                                                                ?>


                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="hidden">
                                                                        </div>
                                                                        <div class="next">
                                                                                <input type="submit" value="Commit Changes...." class="next-btn" name="alter">
                                                                        </div>

                                                                </div>
                                                        </form>


                                                        <?php

                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                if (isset($_POST["alter"])) {
                                                                        if (isset($_POST['my-bio'])) {
                                                                                // Debugging output
                                                                                // var_dump($_POST['my-bio']);

                                                                                $index = $_POST['my-bio'];
                                                                                foreach ($index as $index_id => $index_name) {
                                                                                        // Debugging output
                                                                                        // echo "Index ID: " . $index_id . ", Index Name: " . $index_name . "<br>";

                                                                                        $index_id = $con->real_escape_string($index_id);
                                                                                        $index_name = $con->real_escape_string($index_name);

                                                                                        $update_query = "UPDATE `course_index` SET `index_name`='$index_name' WHERE `index_id`='$index_id'";

                                                                                        if ($con->query($update_query) === TRUE) {
                                                                                                echo "<script>alert('Record updated successfully');</script>";
                                                                                        } else {
                                                                                                echo "Error updating record: " . $con->error;
                                                                                        }
                                                                                }
                                                                        } else {
                                                                                echo "Error: 'my-bio' data is not an array or not received";
                                                                        }
                                                                } else {
                                                                        echo "Error: 'alter' button not clicked";
                                                                }
                                                        }


                                                        ?>



                                                </div>
                                        </div>
                                </div>
                        </div>

                        <footer>
                                <p> &copy; KnowiFy, All Rights reserved</p>
                        </footer>
                </div>
        </main>
</body>

</html>