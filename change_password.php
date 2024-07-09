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

$ses = $_SESSION['user-name'];
// echo "$ses";

$sql = "SELECT * FROM `users_data` WHERE `username` = '$ses'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['userID'];
        $email = $row['email'];
        $pass = $row['passowrd'];

        // echo $user_id;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

            .course-card-part {
                margin: 4% 5px;
            }
        }


        /* 
                    
                    main area
                    
                    */


        .course-card-part {
            /* border-bottom: 2px solid black; */
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
            .updation-part {
                width: 90%;
            }

            .field {
                flex-direction: column;
                align-items: flex-start;
            }

            .field>.input {
                margin-top: 2%;
            }

            input {
                padding: 4%;
            }
        }

        .next {
            width: 77%;
            /* border: 1px solid black; */
            margin: 3% auto;
            display: flex;
            justify-content: end;
        }

        .next>input {
            background-color: #555;
            /* border: 1px solid #000012; */
            box-shadow: 0 0 15px 0px rgba(0, 0, 0, 0.5);
            border-radius: 0.51rem;
            padding: 2.4%;
            margin: 2%;
            font-size: larger;
            color: #fff;
            height: 50px;
            width: 100%;
        }

        @media screen and (max-width: 768px) {
            .next {
                width: 90%;
            }

            .next>input {
                padding: 2%;
                font-size: medium;
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

if ($un->num_rows == 1) {
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
                    <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/business-group.png" alt="business-group" /> <span>Colleagues</span>
                    </div>
                </a>
                <a href="notification.php?uid='<?php echo trim($user_id, "'"); ?> '">
                    <div class="nav-item"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/notification-center.png" alt="notification-center" />
                        <span>Announcements</span>
                    </div>
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
                <p class="header-text">Hello,
                    <?php echo $username; ?>! Discover Your Interest With
                    LearniFy.
                </p>
                <hr>
            </div>

            <div class="update-info">
                <div class="course-card-part">
                    <div class="content-header">Update Your Password Here...</div>
                </div>

                <div class="updation-part">
                    <form action="#" method="post" enctype="multipart/form-data">


                        <div class="field">
                            <div class="input">
                                <input type="text" name="mail" id="mail" placeholder="Email...">
                            </div>
                            <div class="input">
                                <input type="text" name="old-pass" id="old-pass" placeholder="Enter Old Password">
                            </div>
                        </div>


                        <div class="field">
                            <div class="input">
                                <input type="text" name="new-pass" id="new-pass" placeholder="Enter New Password...">
                            </div>
                            <div class="input">
                                <input type="text" name="con-new-pass" id="con-new-pass" placeholder="Enter Old Password">
                            </div>
                        </div>


                        <div class="field">
                            <div class="next">
                                <input type="submit" value="Change Password" class="next-btn" name="change-password">
                            </div>
                            <div class="input">
                                <input type="hidden">
                            </div>

                        </div>
                    </form>

                    <?php
                    if (isset($_POST['change-password'])) {
                        $fetched_email = $_POST['mail'];
                        $fetched_pass = $_POST['old-pass'];
                        $new_pass = $_POST['new-pass'];
                        $con_new_pass = $_POST['con-new-pass'];

                        if ($fetched_email == $email) {
                            if ($fetched_pass == $pass) {
                                if ($new_pass != $pass) {
                                    if ($new_pass == $con_new_pass) {
                                        $sql = "UPDATE `users_data` SET `passowrd` = '$new_pass' WHERE `email` = '$fetched_email'";
                                        $result = $con->query($sql);

                                        if ($result) {
                                            echo "<script>
                                                                                                                                  alert('Password is changed');
                                                                                                                                  window.location.href = 'profile.php?uid=$user_id';    
                                                                                                                              </script>";
                                        }
                                    } else {
                                        echo "re-entered new password is not similar to entered new passowrd.";
                                    }
                                } else {
                                    echo "entered new password is similar to old password. password cannot be changed.";
                                }
                            } else {
                                echo "wrong password entered";
                            }
                        } else {
                            echo "email not matched";
                        }
                    }
                    ?>

                </div>
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