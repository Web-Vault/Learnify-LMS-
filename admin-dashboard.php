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

                .user-list {
                        border: 1px solid black;
                        border-radius: 1rem;
                        box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.5);
                        width: 90%;
                        margin: auto;
                        padding-bottom: 3%;
                }

                /*  */

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
                        border-bottom: 2px solid black;
                }

                .single-detail {
                        /* border: 1px solid black; */
                        margin: 1.51%;
                        width: 100%;
                        text-align: left;
                        font-size: larger;
                        text-align: left;
                        display: flex;
                        align-items: center;
                        /* margin-left: 5%; */
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

                .add-user-btn {
                        /* border: 1px solid black; */
                        height: 60px;
                        width: 60px;
                        background-color: #d9d9d9;
                        box-shadow: inset 0 0 15px 0 rgba(0, 0, 0, 0.65);
                        border-radius: 0.552rem;
                        position: relative;
                        right: -40%;
                        top: -25px;
                        margin: auto;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                }

                .edit-user {
                        border: 1px solid black;
                        border-radius: 1rem;
                        /* box-shadow: ; */
                        box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.4);
                        margin: 2% 5%;
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
                input[type="file"],
                input[type="password"] {
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

                                <div class="user-list">
                                        <div class="course-card-part">
                                                <div class="content-header">User Control Center</div>
                                        </div>

                                        <div class="all-users">

                                                <?php

                                                if ($result->num_rows >= 1) {
                                                        while ($row = $result->fetch_assoc()) {
                                                                $profile_pic = $row['profile_picture'];
                                                                $name = $row['first_name'] . " " . $row['last_name'];
                                                                $email = $row['email'];
                                                                $user_id = $row["userID"];

                                                                // echo $user_id;
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
                                                                        <div class='single-detail'>
                                                                                <?php echo $name; ?>
                                                                        </div>
                                                                        <div class='single-detail mail'>
                                                                                <?php echo $email; ?>
                                                                        </div>
                                                                        <div class='single-detail control'>
                                                                                <form method='post' class='control'>
                                                                                        <input type='hidden' name='user_id' value='<?php echo $user_id; ?> '>
                                                                                        <button class='btn' name='edit-user'>Edit
                                                                                                User</button>
                                                                                        <button class='btn' name='delete-user'>Delete
                                                                                                User</button>
                                                                                </form>
                                                                        </div>
                                                                </div>

                                                <?php
                                                        }
                                                } else {
                                                        echo "No users found.";
                                                }
                                                ?>
                                        </div>


                                        <?php
                                        if (isset($_POST['edit-user'])) {
                                                $user_id = $_POST['user_id'];
                                        ?>
                                                <script>
                                                        window.location.href = "admin-edit-user.php?user_id=<?php echo $user_id; ?>";
                                                </script>
                                        <?php
                                        }
                                        ?>


                                        <?php
                                        if (isset($_POST['delete-user'])) {
                                                $user_id = $_POST['user_id'];
                                        ?>
                                                <script>
                                                        window.location.href = "delete.php?user_id=<?php echo $user_id; ?>";
                                                </script>
                                        <?php
                                        }
                                        ?>

                                </div>

                                <div class="edit-user" id="edit">
                                        <div class="course-card-part">
                                                <div class="content-header">Add New User</div>

                                                <?php





                                                use PHPMailer\PHPMailer\PHPMailer;
                                                use PHPMailer\PHPMailer\SMTP;
                                                use PHPMailer\PHPMailer\Exception;

                                                function sendMail($user_id,$email,$pass)
                                                {
                                                        require 'PHPMailer/PHPMailer.php';
                                                        require 'PHPMailer/Exception.php';
                                                        require 'PHPMailer/SMTP.php';

                                                        $mail = new PHPMailer(true);

                                                        try {
                                                                //Server settings                 //Enable verbose debug output
                                                                $mail->isSMTP();                                            //Send using SMTP
                                                                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                                                $mail->Username   = 'aryanlathigara@gmail.com';                     //SMTP username
                                                                $mail->Password   = 'ilzc fdub ckvy chen ';                               //SMTP password
                                                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                                                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                                                                //Recipients
                                                                $mail->setFrom('aryanlathigara@gmail.com', 'Learnify');
                                                                $mail->addAddress($email);     //Add a recipient


                                                                //Content
                                                                $mail->isHTML(true);                                  //Set email format to HTML
                                                                $mail->Subject = 'Login Credintials From LearniFy';
                                                                $mail->Body    = "This mail is sent to inform you that your Learnify account is created successfully. <br><br>
UserID: " . $user_id . "<br>
Email: " . $email . "<br>
Password: " . $pass . "<br><br>
Regards, <br>Admin, Learnify";

                                                                $mail->send();
                                                                // echo 'Message has been sent';
                                                                return true;
                                                        } catch (Exception $e) {
                                                                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                                                return false;
                                                        }
                                                }

                                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-user'])) {
                                                        $user_id = $_POST['user-id'];
                                                        $profile_img = $_FILES['profile-pic']['name'];
                                                        $first_name = $_POST['first-name'];
                                                        $last_name = $_POST['last-name'];
                                                        $username = $_POST['username'];
                                                        $mobile_number = $_POST['mobile-number'];
                                                        $email = $_POST['mail'];
                                                        $password = $_POST['password'];
                                                        $c_password = $_POST['confirm-password'];
                                                        $division = $_POST['div'];
                                                        $enrollment = $_POST['enrollment'];
                                                        $bio = $_POST['my-bio'];
                                                        $birth_date = $_POST['d-o-b'];
                                                        $address = $_POST['address'];
                                                    
                                                        if ($password == $c_password) {
                                                            // Hash the password
                                                            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                                    
                                                            // Prepare and execute the SQL query
                                                            $sql = "INSERT INTO `users_data`(`userID`, `profile_picture`, `first_name`, `last_name`, `username`, `passowrd`, `mobile_number`, `email`, `division`, `enrollment_number`, `bio`, `date_of_birth`, `address`) 
                                                                    VALUES ('$user_id', '$profile_img', '$first_name', '$last_name', '$username', '$password', '$mobile_number', '$email', '$division', '$enrollment', '$bio', '$birth_date', '$address')";
                                                    
                                                            if ($con->query($sql)) {
                                                                // Move uploaded file
                                                                if (!is_dir("course-images/profile_pictures")) {
                                                                    mkdir("course-images/profile_pictures");
                                                                }
                                                                move_uploaded_file($_FILES['profile-pic']['tmp_name'], "course-images/profile_pictures/" . $profile_img);
                                                    
                                                                // Send confirmation email
                                                                if (sendMail($user_id,$email,$password)) {
                                                                    echo "Registration successful and email sent.";
                                                                } else {
                                                                    echo "Registration successful but email could not be sent.";
                                                                }
                                                            } else {
                                                                echo "Error in registration.";
                                                            }
                                                        } else {
                                                            echo "Passwords do not match.";
                                                        }
                                                    }

                                                ?>

                                                <div class="updation-part">
                                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="text" name="user-id" id="user-id" placeholder="Set  UserId...">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="text" name="enrollment" id="enrollment" placeholder="Set Enrollment Number...">
                                                                        </div>
                                                                </div>
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="file" name="profile-pic" id="profile-pic">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="hidden" name="">
                                                                        </div>
                                                                </div>
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="text" name="first-name" id="first-name" placeholder="First Name...">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="text" name="last-name" id="last-name" placeholder="Last Name...">
                                                                        </div>
                                                                </div>
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="text" name="mail" id="mail" placeholder="Email...">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="hidden" name="">
                                                                        </div>
                                                                </div>
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="password" name="password" id="password" placeholder="Password...">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="text" name="confirm-password" id="confirm-password" placeholder="Re-type The Password...">
                                                                        </div>
                                                                </div>

                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="text" name="div" id="div" placeholder="Enter your Division...">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="text" name="username" id="username" placeholder="Username...">
                                                                        </div>

                                                                </div>

                                                                <div class="field">
                                                                        <div class="input">
                                                                                <textarea name="my-bio" id="my-bio" placeholder="My Bio..."></textarea>
                                                                        </div>
                                                                </div>

                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="text" name="d-o-b" id="d-o-b" placeholder="Date of Birth...">
                                                                        </div>
                                                                        <div class="input">
                                                                                <input type="text" name="mobile-number" id="mobile-number" placeholder="Mobile Number...">
                                                                        </div>
                                                                </div>
                                                                <div class="field">
                                                                        <div class="input">
                                                                                <textarea name="address" id="address" placeholder="Address..."></textarea>
                                                                        </div>
                                                                </div>

                                                                <div class="field">
                                                                        <div class="input">
                                                                                <input type="hidden" name="recovery-mail" id="recovery-mail" placeholder="Recovery Email...">
                                                                        </div>
                                                                        <div class="next">
                                                                                <input type="submit" value="Add Changes...." class="next-btn" name="add-user">
                                                                        </div>

                                                                </div>
                                                        </form>
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

<script>
        function logout() {
                window.location.href = "logout.php";
        }
</script>

</html>