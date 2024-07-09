<?php
include_once ("connect.php");


session_start();
// if($con) {
//           echo "Connected!";
// }
// else {
//           echo "Connection Failed";
// }


$uid = $_REQUEST['uid'];
$clean_uid = trim($uid, "'");
$user_id = trim($clean_uid);

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

        .chat-container {
            height: calc(100vh - 110px);
            display: flex;
            flex-direction: column;
            /* color: #fff; */
            margin: 20px 30px 0;
            border: 3px solid #333;
            border-radius: 0.251rem;
        }

        .messages-container {
            /* flex-grow: 1; */
            overflow-y: auto;
            padding: 20px;
            /* padding-bottom: 0; */
            /* border: 1px solid red; */
            height: 82.7%;
        }

        .message {
            margin-bottom: 10px;
        }

        .message.sender {
            text-align: right;
        }

        .message-content {
            background-color: #333;
            /* color: #fff; */
            border-radius: 10px;
            padding: 10px 15px;
            display: inline-block;
            max-width: 70%;
        }

        .message.sender .message-content {
            background-color: #007bff;
        }

        .input-container {
            display: flex;
            padding: 20px;
            /* background-color: #000; */
            /* border-top:1px solid  var(--link-color); */
            box-shadow: 0px -5px 10px var(--link-color);
            align-items: center;
            bottom: 0;
            width: calc(80% - 68px);
            position: fixed;
        }

        .message-input {
            flex-grow: 1;
            padding: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
            border: 2px solid black;
        }

        .file-input {
            display: none;
        }

        .file-label {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .send-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }

        /*  */

        .message {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .text {
            flex-grow: 1;
        }

        .msg {
            color: var(--button-text-color);
            width: 99%;
            margin: 1.5%;
            background-color: var(--main-bg-color);
            box-shadow: inset 0 0 15px 0px rgba(255, 255, 255, 0.7);
            padding: 2%;
            border-radius: 0.351rem;
            font-size: larger;
        }

        .time {
            margin-left: 10px;
            width: 100px;
        }

        .time p {
            font-size: 12px;
            color: #888;
        }
    </style>

</head>

<?php
$uid = $_REQUEST['uid'];
$clean_uid = trim($uid, "'");
$user_id = trim($clean_uid);

$uname = "select username from users_data where userID = '$user_id'";
$un = $con->query($uname);

if ($un->num_rows == 1) {
    $row = $un->fetch_assoc();
    $username = $row['username'];
}

// echo $_SESSION['uid'];

?>


<body>
    <main>
        <div class="sidebar">
            <div class="logo-text">
                LearniFy
            </div>
            <nav class="navigation">
                <a href="index.php?uid='<?php echo trim($user_id, "'"); ?> '">
                    <div class="nav-item"><img width="30" height="30"
                            src="https://img.icons8.com/ios-glyphs/30/order-delivered.png" alt="Dashboard" />
                        <span>Dashboard</span></div>
                </a>
                <a href="my-courses.php?uid='<?php echo trim($user_id, "'"); ?> '">
                    <div class="nav-item"><img width="30" height="30"
                            src="https://img.icons8.com/ios-glyphs/30/rules-book.png" alt="rules-book" /> <span>My
                            Courses</span></div>
                </a>
                <a href="colleagues.php?uid='<?php echo trim($user_id, "'"); ?> '">
                    <div class="nav-item"><img width="30" height="30"
                            src="https://img.icons8.com/ios-glyphs/30/business-group.png" alt="business-group" />
                        <span>Colleagues</span></div>
                </a>
                <a href="notification.php?uid='<?php echo trim($user_id, "'"); ?> '">
                    <div class="nav-item"><img width="30" height="30"
                            src="https://img.icons8.com/ios-glyphs/30/notification-center.png"
                            alt="notification-center" /> <span>Announcements</span></div>
                </a>
                <a href="profile.php?uid=<?php echo trim($user_id, "'"); ?>">
                    <div class="nav-item"><img width="30" height="30"
                            src="https://img.icons8.com/ios-glyphs/30/contract-job.png" alt="contract-job" />
                        <span>Profile</span></div>
                </a>
                <a href="due.php?uid='<?php echo trim($user_id, "'"); ?> '">
                                        <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/quiz.png" alt="quiz" /> <span>Tasks</span> </div>
                                </a>
                <a>
                    <div class="nav-item" onclick="logout()"> <img width="30" height="30"
                            src="https://img.icons8.com/ios-glyphs/30/door-opened.png" alt="door-opened" />
                        <span>Logout</span> </div>
                </a>
            </nav>
        </div>
        <div class="main">
            <div class="main-header">
                <p class="header-text">Hello, <?php echo $username; ?>! Discover Your Interest With LearniFy.</p>
                <hr>
            </div>


            <div class="chat-container">
                <div class="messages-container" id="messages-container">



                    <?php
                    $get_messages = "SELECT * FROM `forum` ";
                    $messages = $con->query($get_messages);

                    if ($messages->num_rows > 0) {
                        while ($row = $messages->fetch_assoc()) {
                            $get_msg = $row['message'];
                            $time = $row['time'];
                            $user = $row['userID'];
                            $img_msg = $row['img_msg'];

                            // Fetch the profile picture for the current message sender
                            $fetch_pic = "SELECT `profile_picture` FROM `users_data` WHERE userID = '$user'";

                            $uname = "select * from forum inner join users_data on forum.userID = users_data.userID where forum.userID= '$user'";
                            $nm = $con->query($uname);
                            $row = $nm->fetch_assoc();
                            $name = $row['username'];


                            $prifile = $con->query($fetch_pic);

                            if ($prifile->num_rows > 0) {
                                $pic = $prifile->fetch_assoc();
                                $profile_img = $pic['profile_picture'];
                            } else {
                                // If profile picture not found, use default image
                                $profile_img = "default.png";
                            }
                            ?>
                            <div class="message">
                                <div class="profile">
                                    <img src="course-images/profile_pictures/<?php echo $profile_img; ?>"
                                        alt="<?php echo $name ?>" class="course-img-name">
                                </div>
                                <div class="text">
                                    <p class="msg">


                                        <?php
                                        if ($img_msg == "") {
                                            echo $get_msg;
                                        } else {
                                            echo $get_msg;
                                            echo "<img src=forum images/'.$img_msg.' alt='text image'>";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="time">
                                    <p class="time">
                                        <?php echo $time; ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }




                    if (isset($_POST['send-btn'])) {

                        ?>
                        <script>
                            window.location.href = "forum.php?uid='<?php echo trim($user_id, "'"); ?> ";
                        </script>
                        <?php



                        $message = $_POST['message-imput'];
                        $currentDateTime = date("H:i:s");
                        $img_msg = $_FILES['img-msg']['name'];
                        // echo $currentDateTime;
                    
                        $target_dir = "forum images/";
                        $target_file = $target_dir . basename($file);

                        if (move_uploaded_file($_FILES['img_msg']['tmp_name'], $target_file)) {
                            if ($message != "") {
                                $sql = "INSERT INTO `forum`(`userID`,`message`,`time`,`img_msg`) VALUES ('$user_id','$message','$currentDateTime','$img_msg')";
                                $result = $con->query($sql);
                            } else {
                            }
                        }

                        if ($message != "") {
                            $sql = "INSERT INTO `forum`(`userID`,`message`,`time`) VALUES ('$user_id','$message','$currentDateTime')";
                            $result = $con->query($sql);
                        } else {
                        }



                        // $result = $con->query($sql);
                    

                        // 
                    
                    }

                    ?>
                    <!-- <div class="message">
                                                            <div class="profile">
                                                                      <img src="course-images/profile_pictures/<?php
                                                                      // if (empty($pic['profile-picture'])) {
                                                                      //           echo "default.png";
                                                                      // } else {
                                                                      //           echo $pic['profile-picture'];} 
                                                                      ?>" alt="Current Profile Image" class="course-img-name">
                                                            </div>
                                                            <div class="text">
                                                                      <p class="msg">
                                                                                <?php
                                                                                // echo $get_msg;
                                                                                ?>
                                                                                hello, this is the message sent by me!
                                                                      </p>
                                                            </div>
                                                            <div class="time">
                                                                      <p class="time">
                                                                                <?php
                                                                                // echo $time;
                                                                                ?>
                                                                                this is time
                                                                      </p>
                                                            </div>
                                                  </div> -->


                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-container">
                        <textarea id="message-input" class="message-input" placeholder="Type your message here..."
                            name="message-imput"></textarea>
                        <input type="file" id="file-input" class="file-input" name="img_msg">
                        <label for="file-input" class="file-label">Choose Image</label>
                        <button id="send-btn" class="send-btn" name="send-btn">Send</button>
                    </div>
                </form>
            </div>
    </main>
</body>

<script>
    function logout() {
        window.location.href = "logout.php";
    }
</script>


</html>