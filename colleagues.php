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

    .content-header {
      font-size: xx-large;
      color: #000;
    }

    .content-sup-text {
      color: #000;
    }


    .colleague-list {
      border: 1px solid black;
      width: 90%;
      margin: auto;
      /* box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.5); */
      border-radius: 0.251rem;
    }

    .course-img-name {
      height: 70px;
      width: 70px;
      border-radius: 50%;
      object-fit: cover;
      object-position: center;
    }

    .user {
      color: #000;
      display: flex;
      font-size: larger;
      width: 85%;
      justify-content: space-between;
      align-items: center;
      margin: 2% auto;
      padding-bottom: 1%;
      border-bottom: 2px solid black;

    }

    .u-info {
      text-align: right;
      width: 100%;
      /* border: 1px solid black; */
    }

    @media screen and (max-width: 768px) {
      .colleague-list {
        width: 100%;
        margin: 0 auto;
        /* Center the list */
        padding: 10px;
        /* Add padding for spacing */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Add box shadow for depth */
        border-radius: 10px;
        /* Add border radius for rounded corners */
      }

      .user {
        flex-direction: column;
        align-items: flex-start;
        margin: 10px 0;
        /* Add margin for spacing between users */
        padding: 10px;
        /* Add padding for spacing */
        border-bottom: 1px solid #ccc;
        /* Add bottom border for separation */
      }

      .user:last-child {
        border-bottom: none;
        /* Remove bottom border from the last user */
      }

      .u-info {
        text-align: left;
        width: 100%;
        margin-top: 5px;
        /* Adjusted margin for spacing */
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

      <div class="course-card-part">
        <div class="content-header">My Colleagues</div>
        <div class="content-sup-text">See Who is your batchmate...</div>
      </div>

      <div class="colleague-list">
        <?php
        // $sql = "SELECT * FROM students_table ORDER BY division ASC;";
        $sql = "SELECT * FROM `users_data`";
        $result = $con->query($sql);


        if ($result->num_rows >= 1) {
          while ($row = $result->fetch_assoc()) {
            $profile_pic = $row['profile_picture'];
            $name = $row['first_name'] . " " . $row['last_name'];
            $email = $row['email'];
            $div = $row['division'];

        ?>
            <div class='user'>
              <div class='user-img'>
                <img width='50' src='course-images/profile_pictures/<?php
                                                                    if (empty($row['profile_picture'])) {
                                                                      echo "default.png";
                                                                    } else {
                                                                      echo $row['profile_picture'];
                                                                    }
                                                                    ?>' alt='Profile Picture' class='course-img-name'>
              </div>

              <div class='user-name u-info'><?php echo $name; ?></div>


              <div class='user-mail u-info'><?php echo $email; ?></div>

              <div class='user-mail u-info'>Division : <?php echo $div; ?></div>
            </div>
        <?php
          }
        } else {
          echo "No users found.";
        }
        ?>
      </div>

      <!-- <footer>
                                        <p> &copy; KnowiFy, All Rights reserved</p>
                              </footer> -->

    </div>

  </main>
</body>


<script>
  function logout() {
    window.location.href = "logout.php";
  }
</script>


</html>