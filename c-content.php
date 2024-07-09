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
        /* Main course content */
        .main-course-content {
            border: 1px solid #ddd;
            /* Light border */
            padding: 20px;
            /* Increased padding for better spacing */
            border-radius: 15px;
            /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle box shadow */
            width: 90%;
            margin: 0 auto 20px;
            /* Center the content and add bottom margin */
        }

        /* Topic heading */
        .topic-heading {
            border-bottom: 2px solid #333;
            /* Darker border */
            padding: 10px 0;
            /* Vertical padding only */
            display: flex;
            align-items: center;
        }

        .topic-heading>span {
            font-size: 24px;
            /* Larger font size */
            color: #333;
            /* Darker text color */
            margin-left: 20px;
            /* Increased left margin */
        }

        /* Topic content */
        .topic-content {
            padding: 20px;
            /* Increased padding */
            width: 100%;
            /* Full width */
            margin: auto;
        }

        /* Paragraph and code blocks */
        .topic-content>p.para,
        .topic-content>p.code {
            padding: 10px;
            /* Reduced padding */
            font-size: 18px;
            /* Slightly smaller font size */
            color: #333;
            /* Darker text color */
        }

        /* Code block styling */
        .topic-content>p.code {
            background-color: #f9f9f9;
            /* Light gray background for code blocks */
            border-radius: 5px;
            /* Rounded corners */
            overflow-x: auto;
            /* Enable horizontal scrolling if needed */
            white-space: pre-wrap;
            /* Preserve line breaks */
        }

        @media screen and (max-width: 768px) {

            .main-course-content {
                width: 95%;
                margin: 0 2.4% 2%;
            }

            .topic-content {
                width: 95%;
                margin: 0 auto 2%;
            }

            .topic-heading>span {
                margin-left: 2%;
            }

            .topic-content>p.para,
            p.code {
                font-size: large;
            }
        }

        /*  */

        .next {
            width: 77%;
            margin: 3% auto;
            display: flex;
            justify-content: end;
        }

        .next-btn {
            text-align: center;
            background-color: #333;
            border: none;
            box-shadow: 0 0 15px 0px rgba(0, 0, 0, 0.5);
            border-radius: 0.51rem;
            padding: 2%;
            width: 15%;
            color: #fff;
            transition: all 0.3s ease;
        }

        .next-btn:hover {
            background-color: #555;
        }

        @media screen and (max-width: 768px) {
            .next {
                width: 95%;
                margin: 3% auto;
                justify-content: end;
            }

            .next-btn {
                width: auto;
                padding: 2% 5%;
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

if ($un->num_rows == 1) {
    $row = $un->fetch_assoc();
    $username = $row['username'];
}


$index_id = $_REQUEST['indexID'];
$course_id = $_REQUEST['courseID'];

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
               
                </a> <a href="due.php?uid='<?php echo trim($user_id, "'"); ?> '">
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

            <?php
            $cid = "SELECT  * FROM `courses` WHERE `course_id` = $course_id";
            $res = $con->query($cid);

            if ($res->num_rows == 1) {
                $row = $res->fetch_assoc();
                $name = $row['course_name'];
            }
            ?>

            <div class="course-content-part">
                <div class="course-name">
                    <img src="course-images/<?php
                                            if (empty($row['course_img'])) {
                                                echo "default_course.png";
                                            } else {
                                                echo $row['course_img'];
                                            }
                                            ?>" alt="Course image" class="course-img-name">
                    <p class="course-name-heading"><?php echo $name; ?></p>
                </div>

                <div class="main-course-content">

                    <?php


                    // echo $index_id;
                    // echo $course_id;

                    $heading = "SELECT * FROM course_headings WHERE index_id = $index_id AND `course_id` = $course_id";
                    $heading_result = $con->query($heading);

                    if ($heading_result->num_rows >= 1) {
                        while ($row_heading = $heading_result->fetch_assoc()) {
                            $heading_text = $row_heading['heading_name'];

                            echo '<div class="group">
            <div class="topic-heading">
                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/graphql.png" alt="graphql" /> <span>' . $heading_text . '</span>
            </div>
            <div class="topic-content">';

                            $content = "SELECT * FROM `course_content` WHERE `index_id` = $index_id AND `course_id` = $course_id AND `heading_id` = {$row_heading['heading_id']}";
                            $content_result = $con->query($content);

                            if ($content_result->num_rows >= 1) {
                                while ($row_content = $content_result->fetch_assoc()) {
                                    $content_text = $row_content['content_text'];
                                    echo '<p class="para">' . $content_text . '</p>';
                                }
                            }

                            echo '</div>
        </div>';
                        }
                    }
                    ?>




                    <a href='c-content.php?uid=<?php echo trim($user_id, "'"); ?>&indexID=<?php echo $index_id + 1; ?>&courseID=<?php echo $course_id; ?>'>
                        <div class="next">
                            <a href='c-content.php?uid=<?php echo $user_id; ?>&indexID=<?php echo $index_id + 1; ?>&courseID=<?php echo $course_id; ?>' class="next-btn">Next Page</a>
                        </div>
                    </a>
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