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

$uid = $_REQUEST['uid'];
$clean_uid = trim($uid, "'");
$user_id = trim($clean_uid);
// echo $user_id;


$uname = "select username from users_data where userID = '$user_id'";
$un = $con->query($uname);

if ($un->num_rows == 1) {
        $row = $un->fetch_assoc();
        $username = $row['username'];
}

$sql = "SELECT * FROM `users_data`  WHERE userID='" . trim($user_id, "'") . "' ";
$result = $con->query($sql);
$row = $result->fetch_assoc();

// echo "User ID: " . $row['userID'] . "<br>";
// echo "Username: " . $row['username'] . "<br>";
// echo "Profile Image:".  $row['profile_picture'] . "<br>";
// echo "First Name: " . $row['first_name'] . "<br>";
// echo "Last Name: " . $row['last_name'] . "<br>";
// echo "Mobile Number: " . $row['mobile_number'] . "<br>";
// echo "Email: " . $row['email'] . "<br>";
// echo "Division: " . $row['division'] . "<br>";
// echo "Enrollment: " . $row['enrollment_number'] . "<br>";
// echo "Recovery Email: " . $row['secondary_email'] . "<br>";
// echo "Bio: " . $row['bio'] . "<br>";
// echo "Birth Date: " . $row['date_of_birth'] . "<br>";
// echo "Emergency Contact 1: " . $row['emerg_contact_1'] . "<br>";
// echo "Emergency Contact 2: " . $row['emerg_contact_2'] . "<br>";
// echo "Address: " . $row['address'] . "<br>";

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
                        margin-bottom: 2%;
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

                }

                /*  */

                .profile {
                        width: 90%;
                        margin: auto;
                }

                .banner {
                        height: 400px;
                }

                .banner-img {
                        width: 100%;
                        box-shadow: 0 15px 15px 0 rgba(0, 0, 0, 0.5);
                }

                .course-img-name {
                        box-shadow: 0 15px 15px 0 rgba(0, 0, 0, 0.5);
                        position: absolute;
                        top: 35%;
                        left: 28%;
                        height: 180px;
                        width: 180px;
                        border-radius: 50%;
                        object-fit: cover;
                }

                .current-info,
                .course-list {
                        border: 1px solid black;
                        padding: 2.4%;
                        margin: auto;
                        border-radius: 0.251rem;
                        /* box-shadow: 0 15px 15px 0 rgba(0, 0, 0, 0.5); */
                        margin-bottom: 5%;
                }

                .col {
                        display: flex;
                        justify-content: space-evenly;
                        padding: 0.51%;
                        color: #000;
                        font-size: x-large;
                        border-bottom: 2px solid #000;
                }

                .data {
                        margin: 1%;
                        width: 50%;
                        margin-left: 5%;
                        display: flex;
                        align-items: center;
                }

                span.none,
                span.dont {
                        display: none;
                }


                .update-info {
                        border: 1px solid black;
                        padding: 2.4%;
                        margin: auto;
                        /* box-shadow: 0 15px 15px 0 rgba(0, 0, 0, 0.5); */
                        margin-bottom: 5%;
                        border-radius: 0.251rem;
                }

                @media screen and (max-width: 768px) {
                        .profile {
                                width: 95%;
                        }

                        .banner {
                                height: 200px;
                        }

                        .banner-img {
                                box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.5);
                                /* Adjusted box-shadow */
                        }

                        .course-img-name {
                                top: 158%;
                                left: 10%;
                                height: 100px;
                                width: 100px;
                        }

                        .current-info,
                        .course-list,
                        .update-info {
                                padding: 2%;
                                margin-bottom: 3%;
                        }

                        .col {
                                flex-direction: column;
                                font-size: large;
                                border-bottom: 1px solid #000;
                        }

                        .data {
                                width: 70%;

                        }

                        span.none {
                                display: block;
                        }
                }



                /*  */

                .course-card-part {
                        border-bottom: 2px solid black;
                        width: 90%;
                        display: flex;
                        flex-direction: column;
                        justify-content: flex-start;
                        flex-wrap: wrap;
                        margin: 2.4%;
                        padding-bottom: 2%;
                }



                .content-header {
                        font-size: xx-large;
                        color: #000;
                }

                .updation-part {
                        border-radius: 1rem;
                        width: 80%;
                        margin: auto;
                }

                /*  */

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

                @media screen and (max-width: 768px) {
                        .course-card-part {
                                width: 95%;
                                /* Adjusted width for better fitting */
                                margin: 2% auto;
                                /* Centered and reduced margin */
                        }

                        .content-header {
                                font-size: x-large;
                                /* Adjusted font size */
                        }

                        .updation-part {
                                width: 90%;
                                /* Adjusted width for better fitting */
                        }

                        .field {
                                flex-direction: column;
                                /* Changed flex direction for smaller screens */
                                align-items: flex-start;
                                /* Adjusted alignment */
                                margin: 2% 0;
                                /* Adjusted margin */
                        }

                        input,
                        textarea {
                                padding: 3%;
                                /* Adjusted padding */
                                font-size: medium;
                                /* Adjusted font size */
                        }

                        .next {
                                width: 95%;
                                /* Adjusted width for better fitting */
                                justify-content: center;
                                /* Centered button */
                        }

                        .next>input {
                                padding: 2%;
                                font-size: large;
                                height: 40px;
                        }
                }


                /*  */

                .course-list-img {
                        height: 60px;
                        width: 60px;
                        border-radius: 50%;
                        object-fit: cover;
                }

                .c-in {
                        /* border: 1px solid black; */
                        width: 100%;
                }

                .course-list>.col>.c-in {
                        width: 100%;
                        display: flex;
                        justify-content: space-between;
                        /* Adjusted alignment */
                        align-items: center;
                        /* border: 1px solid black; */
                }

                .course-list>.col>.c-in>.c-data>a.fr {
                        margin-left: auto;
                }

                @media screen and (max-width: 768px) {
                        .course-list>.col {
                                flex-direction: row;
                                justify-content: space-between;
                        }

                        .data {
                                /* border: 1px solid black; */
                                width: fit-content;
                        }

                        .course-list>.col>.c-in {
                                justify-content: flex-start;
                        }

                        .course-list>.col>.c-data {
                                width: 100%;
                                margin-bottom: 5px;
                                display: flex;
                                align-items: center;
                        }

                        .course-list>.col>.c-data>a.fr {
                                margin-left: auto;
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

                        <div class="profile">

                                <div class="banner">
                                        <img src="course-images/canva-black-and-gray-abstract-linkedin-banner-2CkD5P2xUDo.jpg" alt="" class="banner-img">
                                        <img src="course-images/profile_pictures/<?php
                                                                                        if (empty($row['profile_picture'])) {
                                                                                                echo "default.png";
                                                                                        } else {
                                                                                                echo $row["profile_picture"];
                                                                                        }
                                                                                        ?>" alt="Current Profile Image" class="course-img-name">
                                </div>

                                <div class="current-info">
                                        <div class="col">
                                                <span class="data"><span class="none">UserID : </span><?php echo $row['userID']; ?></span>
                                                <span class="data"><span class="none">Username : </span><?php echo $row['username']; ?></span>
                                        </div>
                                        <div class="col">
                                                <span class="data"><span class="dont">Name : </span><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                <span class="data"></span>
                                        </div>
                                        <div class="col">
                                                <span class="data"><span class="none">Mobile number : </span><?php echo $row['mobile_number']; ?></span>
                                                <span class="data"><span class="none">Email : </span><?php echo $row['email']; ?></span>
                                        </div>
                                        <div class="col">
                                                <span class="data"><span class="none">Division : </span><?php echo $row['division']; ?></span>
                                                <span class="data"><span class="none">Enrollment Number : </span><?php echo $row['enrollment_number']; ?></span>
                                        </div>
                                        <div class="col">
                                                <span class="data"><span class="none">Date of birth : </span> <?php echo $row['date_of_birth']; ?></span>
                                                <span class="data"></span>
                                        </div>

                                        <div class="col">
                                                <span class="data"><span class="none">Address : </span><?php echo trim($row['address'], '"'); ?></span>
                                                <span class="data"><span class="none">Bio : </span><?php echo trim($row['bio'], '"'); ?></span>
                                        </div>
                                </div>

                                <div class="update-info">
                                        <div class="course-card-part">
                                                <div class="content-header">Update Your Details Here...</div>
                                        </div>

                                        <div class="updation-part">
                                                <form action="#" method="post" enctype="multipart/form-data">
                                                        <div class="field">
                                                                <div class="input">
                                                                        <input type="text" name="user-id" value="<?php echo $row['userID']; ?>" disabled>

                                                                </div>
                                                                <div class="input">
                                                                        <input type="text" name="enrollment" id="enrollment" placeholder="Set Enrollment Number..." value="<?php echo $row['enrollment_number']; ?>" disabled>
                                                                </div>
                                                        </div>
                                                        <div class="field">
                                                                <div class="input">
                                                                        <input type="file" name="profile-pic" id="profile-pic">
                                                                </div>
                                                                <div class="input">

                                                                </div>
                                                        </div>
                                                        <div class="field">
                                                                <div class="input">
                                                                        <input type="text" name="first-name" id="first-name" placeholder="First Name..." value="<?php echo $row['first_name']; ?>">
                                                                </div>
                                                                <div class="input">
                                                                        <input type="text" name="last-name" id="last-name" placeholder="Last Name..." value="<?php echo $row['last_name']; ?>">
                                                                </div>
                                                        </div>

                                                        <div class="field">
                                                                <div class="input">
                                                                        <input type="text" name="username" id="username" placeholder="Username..." value="<?php echo $row['username']; ?>">
                                                                </div>
                                                                <div class="input">
                                                                        <input type="hidden">
                                                                </div>
                                                        </div>
                                                        <div class="field">

                                                                <div class="input">
                                                                        <input type="text" name="mail" id="mail" placeholder="Email..." value="<?php echo $row['email']; ?>">
                                                                </div>
                                                                <div class="input">
                                                                        <input type="text" name="div" id="div" placeholder="Enter your Division..." value="<?php echo $row['division']; ?>" disabled>
                                                                </div>
                                                        </div>

                                                        <div class="field">
                                                                <div class="input">
                                                                        <textarea name="my-bio" id="my-bio" placeholder="My Bio..."><?php echo $row['bio']; ?></textarea>
                                                                </div>
                                                        </div>

                                                        <div class="field">
                                                                <div class="input">
                                                                        <input type="text" name="d-o-b" id="d-o-b" placeholder="Date of Birth..." value="<?php echo $row['date_of_birth']; ?>">
                                                                </div>
                                                                <div class="input">
                                                                        <input type="text" name="mobile-number" id="mobile-number" placeholder="Mobile Number..." value="<?php echo $row['mobile_number']; ?>">
                                                                </div>
                                                        </div>
                                                        <div class="field">
                                                                <div class="input">
                                                                        <textarea name="address" id="address" placeholder="Address..."><?php echo $row['address']; ?></textarea>
                                                                </div>
                                                        </div>
                                                        <div class="field">
                                                                <div class="next">
                                                                        <input type="submit" value="Change Password" class="next-btn" name="change-password">
                                                                </div>
                                                                <div class="input">
                                                                        <input type="hidden">
                                                                </div>
                                                                <div class="next">
                                                                        <input type="submit" value="Remove Profile Image" class="next-btn" name="remove-pic">
                                                                </div>
                                                                <div class="next">
                                                                        <input type="submit" value="Alter Changes...." class="next-btn" name="edit-user">
                                                                </div>
                                                        </div>
                                                </form>

                                                <?php
                                                if (isset($_POST['change-password'])) {
                                                ?>
                                                        <script>
                                                                window.location.href = "change_password.php";
                                                        </script>
                                                <?php
                                                }
                                                ?>


                                                <?php
                                                if (isset($_POST['remove-pic'])) {
                                                        $del = "UPDATE `users_data`
                                                                SET `profile_picture` = ''
                                                                WHERE userID = '$user_id';
                                                                ";

                                                        if ($con->query($del)) {
                                                ?>
                                                                <script>
                                                                        alert("<?php echo $row['username']; ?>'s Profile picture has been removed...");

                                                                        window.location.href = "profile.php?uid=<?php echo $user_id; ?>";
                                                                </script>
                                                <?php
                                                        }
                                                }
                                                ?>




                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit-user'])) {
                                                        // $id = $_POST['user-id'];
                                                        $first_name = $_POST['first-name'];
                                                        $last_name = $_POST['last-name'];
                                                        $username = $_POST['username'];
                                                        $mobile_number = $_POST['mobile-number'];
                                                        $mail = $_POST['mail'];
                                                        $pic = $_FILES['profile-pic']['name'];
                                                        // $enrollment = $_POST['enrollment'];
                                                        $bio = trim($_POST['my-bio'], '"');
                                                        $birth_date = $_POST['d-o-b'];
                                                        $address = trim($_POST['address'], '"');


                                                        $target_dir = "course-images/profile_pictures/";
                                                        $target_file = $target_dir . basename($pic);

                                                        if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target_file)) {

                                                                $sql = "UPDATE `users_data` SET `profile_picture` = '$pic', `first_name`='$first_name', `last_name`='$last_name', `username`='$username', `mobile_number`=$mobile_number, `email`='$mail', `bio`='$bio', `date_of_birth`='$birth_date', `address`='$address' WHERE userID='$user_id'";

                                                                $result = $con->query($sql);
                                                                if ($result) {
                                                ?>
                                                                        <script>
                                                                                alert("<?php echo $first_name; ?>'s data updated successfully...");
                                                                                window.location.href = "profile.php?uid=<?php echo trim($user_id, "'"); ?>";
                                                                        </script>

                                                <?php
                                                                } else {
                                                                        echo "Error updating user's data: " . $con->error;
                                                                }
                                                        }
                                                }
                                                ?>

                                        </div>
                                </div>
                                <div class="course-info">
                                        <div class="course-card-part">
                                                <div class="content-header">Courses You Have Enrolled In</div>
                                        </div>

                                        <div class="course-list">



                                                <?php
                                                $sql = "SELECT DISTINCT fav_courses.enrollment_id,fav_courses.course_id, courses.course_name 
                                                                    FROM fav_courses 
                                                                    INNER JOIN courses 
                                                                    ON fav_courses.course_id = courses.course_id";

                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                                $name = $row['course_name'];
                                                                $en_id = $row['enrollment_id'];

                                                                echo '<div class="col">
                                                                                          <span class="data"><img src="course-images/php-course.jpg" alt="Course Image" class="course-list-img"></span>
                                                                                          <span class="c-in">
                                                                                                <span class="data c-name">' . $name . '</span>
                                                                                                <span class="data c-data"><a href="delete-course.php?en_id=' . $en_id . '" class="fr"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/delete-forever.png" alt="delete-forever" /></a></span>
                                                                                                
                                                                                          </span>

                                                                                </div>';
                                                        }
                                                } else {
                                                        echo '<div class="col">
                                                                                
                                                                                <span class="data c-data">No Enrolled Courses...</span>
                                                                      
                                                                      </div>';
                                                }
                                                ?>

                                                <!--  -->



                                                <!--  -->

                                        </div>
                                </div>
                        </div>

                        <!-- <footer>
                                <p> &copy; KnowiFy, All Rights reserved</p>
                        </footer> -->

                </div>

                <?php

                ?>

        </main>
</body>


<script>
        function logout() {
                window.location.href = "logout.php";
        }
</script>


</html>