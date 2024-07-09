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
        <title>Document</title>

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

                .user-list {
                        border: 1px solid black;
                        border-radius: 0.251rem;
                        /* box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.5); */
                        width: 90%;
                        margin: 5% auto;
                        padding-bottom: 3%;
                }

                /*  */


                .field select {
                        font-size: 16px;
                        padding: 12px;
                        width: 100%;
                        border-radius: 5px;
                        border: 1px solid var(--form-border-color);
                        background-color: var(--input-bg-color);
                        margin-bottom: 10px;
                }

                .content-header {
                        font-size: xx-large;
                        color: #000;
                }

                .all-users {
                        height: auto;
                }

                .course-card-part {
                        /* border: 1px solid black; */
                        width: 90%;
                        display: flex;
                        flex-direction: row;
                        justify-content: space-between;
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
                        border-bottom: 2px solid black;
                }

                .single-detail {
                        /* border: 1px solid black; */
                        margin: 1.51% 0.25%;
                        width: 100%;
                        text-align: left;
                        font-size: larger;
                        text-align: left;
                        display: flex;
                        align-items: center;
                        /* margin-left: 5%; */
                }

                .profile {
                        width: 10%;
                }

                .name {
                        min-width: 20%;
                }

                .division {
                        max-width: 3%;
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
                        width: 100%;
                }

                .btn {
                        border: 1px solid black;
                        width: 60%;
                        font-size: small;
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


                .search {
                        display: flex;
                }

                .field select {
                        font-size: 16px;
                        padding: 12px;
                        width: 100%;
                        border-radius: 5px;
                        border: 1px solid var(--form-border-color);
                        background-color: var(--input-bg-color);
                        margin-bottom: 10px;
                }

                /* CSS for button */
                .field .btn {
                        width: 100%;
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

                /*  */

                /* Modal styles */
                .modal {
                        /* display: none; */
                        position: fixed;
                        z-index: 1;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100vh;
                        overflow: auto;
                        overflow-y: none;
                        background-color: rgba(0, 0, 0, 0.5);
                }

                .modal-content {
                        background-color: #fefefe;
                        margin: 15% auto;
                        padding: 20px;
                        border: 1px solid #ccc;
                        width: 80%;
                        border-radius: 5px;
                }

                .detail {
                        margin-bottom: 10px;
                }

                .field {
                        margin-bottom: 20px;
                }

                .change-div-search label {
                        font-weight: bold;
                }

                .input .select {
                        font-size: 16px;
                        padding: 8px;
                        margin: 10px 0;
                        width: 100%;
                        border-radius: 5px;
                        border: 1px solid #ccc;
                }

                .change-div-btn {
                        font-size: 16px;
                        padding: 10px 20px;
                        border-radius: 5px;
                        border: none;
                        background-color: #333;
                        color: #fff;
                        cursor: pointer;
                }

                .change-div-btn:hover {
                        background-color: #555;
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
                                <!-- <a href="#">
                                                  <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" /> <span>Profile</span></div>
                                        </a> -->

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


                                <div class="user-list" id="userListContainer">
                                        <div class="course-card-part">
                                                <div class="content-header">User Control Center</div>
                                                <div class="content-header">
                                                        <form action="" method="post">
                                                                <div class="field">
                                                                        <div class="search">
                                                                                <label for="search">Division :</label>
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
                                                                        <button type="submit" class="btn" name="fetch">Fetch</button>
                                                                </div>
                                                        </form>



                                                        <?php
                                                        if (isset($_POST['fetch'])) {
                                                                $selected_div = $_POST['division'];
                                                                $escaped_selected_div = addslashes($selected_div);

                                                                if ($escaped_selected_div == "") {
                                                                        $sql = "SELECT  *  FROM `users_data`";
                                                                } else {
                                                                        $sql = "SELECT  *  FROM `users_data` WHERE `division` = '$escaped_selected_div'";
                                                                }
                                                        }
                                                        ?>




                                                </div>
                                        </div>
                                        <div class="all-users" id="allUsers">
                                                <?php
                                                $all = $sql;
                                                $result = $con->query($all);

                                                if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                ?>
                                                                <div class='single'>
                                                                        <div class='single-detail profile'>
                                                                                <img width='50' src='course-images/profile_pictures/<?php
                                                                                                                                        if (empty($row['profile_picture'])) {
                                                                                                                                                echo "default.png";
                                                                                                                                        } else {
                                                                                                                                                echo $row['profile_picture'];
                                                                                                                                        }
                                                                                                                                        ?>' alt='Profile Picture' class='course-img-name'>
                                                                        </div>

                                                                        <div class='single-detail name'><?php echo  $row['first_name'] . " " . $row['last_name'] ?></div>
                                                                        <div class='single-detail mail'><?php echo $row['email'] ?></div>
                                                                        <div class='single-detail enrollment'><?php echo $row['enrollment_number'] ?></div>
                                                                        <div class='single-detail division'><?php echo $row['division'] ?></div>
                                                                        <div class='single-detail control'>
                                                                                <form method='post' class='control'>
                                                                                        <input type='hidden' name='user_id' value="<?php echo $row['userID']; ?>">
                                                                                        <button type="submit" name="change-div-btn" class='btn' id="openModalBtn">Change Division</button>
                                                                                </form>

                                                                        </div>
                                                                </div>
                                                <?php
                                                        }
                                                }

                                                ?>

                                        </div>

                                        <?php
                                        $uid = $_REQUEST['uid'];
                                        // echo $uid;

                                        $get = "SELECT * FROM `users_data` WHERE `userID` = '$uid'";
                                        $result = $con->query($get);

                                        if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                        }
                                        ?>


                                        <div id="myModal" class="modal">
                                                <div class="modal-content">
                                                        <div class="detail"><?php echo $row['userID']; ?></div>
                                                        <div class="detail"><?php
                                                                                echo $row['enrollment_number'];
                                                                                ?></div>
                                                        <div class="detail">
                                                                <form action="" method="post" id="modalForm">
                                                                        <div class="field">
                                                                                <div class="change-div-search">
                                                                                        <label for="search">Division :</label>
                                                                                        <div class="input">
                                                                                                <!-- <select name="new_division" id="divisionSelect">
                                                                                                        <option value="">All</option>
                                                                                                        <?php
                                                                                                        // $select = "SELECT division FROM users_data GROUP BY division";
                                                                                                        // $result = $con->query($select);

                                                                                                        // if ($result->num_rows > 0) {
                                                                                                        //         while ($row = $result->fetch_assoc()) {
                                                                                                        //                 echo '<option value="' . htmlspecialchars($row['division']) . '">' . htmlspecialchars($row['division']) . '</option>';
                                                                                                        //         }
                                                                                                        // } else {
                                                                                                        //         echo '<option disabled>No divisions found</option>';
                                                                                                        // }
                                                                                                        ?>
                                                                                                </select> -->

                                                                                                <input type="text" name="new_division" class="select" placeholder="Division...">

                                                                                        </div>
                                                                                </div>
                                                                                <button type="submit" name="fetch" class="change-div-btn" id="submitFormBtn" class="btn">Alter Changes</button>
                                                                        </div>


                                                                        <?php

                                                                        if (isset($_POST['fetch'])) {
                                                                                $new_div = $_POST['new_division'];

                                                                                $safe_new_div = $con->real_escape_string($new_div);

                                                                                $change = "UPDATE `users_data` SET `division` = '$safe_new_div' WHERE userID = '$uid'";

                                                                                $con->query($change);

                                                                                if ($con->affected_rows > 0) {
                                                                                        echo "<script>alert('Division changed successfully...');</script>";
                                                                                        echo "<script>window.location.href = 'admin-all-users.php';</script>";
                                                                                } else {
                                                                                        echo "<script>alert('Error: Division could not be changed.');</script>";
                                                                                }
                                                                        }
                                                                        ?>




                                                                </form>
                                                        </div>
                                                </div>
                                        </div>

                                        <script>
                                                var modal = document.getElementById("myModal");
                                                var openModalBtn = document.getElementById("openModalBtn");
                                                var closeModalBtn = document.getElementById("closeModalBtn");

                                                openModalBtn.onclick = function(event) {
                                                        event.preventDefault();
                                                        modal.style.display = "block";
                                                }

                                                closeModalBtn.onclick = function() {
                                                        modal.style.display = "none";
                                                        window, location.href = "admin-all-users.php";
                                                }
                                        </script>

                                </div>

                                <footer>
                                        <p> &copy; KnowiFy, All Rights reserved</p>
                                </footer>
                        </div>
                </div>


        </main>
</body>

</html>