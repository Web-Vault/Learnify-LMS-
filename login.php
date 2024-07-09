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

?>


<!DOCTYPE html>
<html lang="en">

<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Login | KnowiFy</title>


          <style>
                    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

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


                    /* Essential */
                    html {
                              scroll-behavior: smooth;
                    }

                    * {
                              padding: 0;
                              margin: 0;
                              box-sizing: border-box;
                              font-family: "Montserrat", sans-serif;
                              letter-spacing: 0.7px;
                              text-decoration: none;
                    }

                    main {
                              display: flex;
                              flex-direction: column;
                              min-height: 100vh;
                              background-color: var(--main-bg-color);
                    }

                    .login-form {
                              width: 350px;
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


                    /* .send-forget-password-mail {
                              color: var(--link-color);
                              text-decoration: underline;
                              cursor: pointer;
                              display: block;
                              text-align: right;
                              padding-right: 5%;
                              margin-top: 10px;
                    } */

                    /* Footer */
                    footer {
                              background: var(--footer-bg-color);
                              color: var(--footer-text-color);
                              font-size: 14px;
                              padding: 20px;
                              text-align: center;
                    }
          </style>
</head>

<body>
          <main>
                    <form action="" method="post" class="login-form">
                              <div class="logo-text">
                                        Discover Your Interest With Us !
                              </div>

                              <div class="field">
                                        <div class="input">
                                                  <input type="text" name="ID" id="ID" placeholder="Enter Your ID...">
                                        </div>
                              </div>
                              <div class="field">
                                        <div class="input">
                                                  <input type="text" name="email" id="email" placeholder="Email Address...">
                                        </div>
                              </div>
                              <div class="field">
                                        <div class="input">
                                                  <input type="password" name="password" id="password" placeholder="Password...">
                                        </div>
                              </div>
                              <div class="field">
                                        <div class="next">
                                                  <input type="submit" name="submit" id="submit" value="Login To KnowiFy...">
                                        </div>
                              </div>
                              <!-- <a href="forget_password"><span class="send-forget-password-mail"> Forgot Password?</span> </a> -->
                    </form>
                    <footer>
                              <p> &copy; KnowiFy, All Rights reserved</p>
                    </footer>

                    <?php


                    if (isset($_POST['submit'])) {
                              $ID = $_POST['ID'];
                              echo $ID;
                              $mail = $_POST['email'];
                              $pass = $_POST['password'];

                              if ($ID == "Admin0103") {
                                        $sql = "SELECT * FROM `admin_details` ";
                                        $result = $con->query($sql);

                                        if ($result->num_rows == 1) {
                                                  $row = $result->fetch_assoc();

                                                  if ($pass == $row['password'] && $ID == $row['userID']) {
                                                            $_SESSION['admin-name'] = $row['username'];

                    ?>
                                                            <script>
                                                                      window.location.href = "admin-dashboard.php";
                                                            </script>
                                                  <?php
                                                            exit();
                                                  } else {
                                                            echo "Invalid password";
                                                  }
                                        } else {
                                                  echo "User not found";
                                        }
                              } else {
                                        $sql = "SELECT * FROM `users_data` WHERE `userID` = '$ID' ";
                                        $result = $con->query($sql);

                                        if ($result->num_rows == 1) {
                                                  $row = $result->fetch_assoc();

                                                  if ($pass == $row['passowrd'] && $mail == $row['email']) {
                                                            $_SESSION['user-name'] = $row['username'];
                                                            $_SESSION['uid'] = $ID;
                                                            $passing_variable = $_SESSION['uid'];
                                                  ?>
                                                            <script>
                                                                      window.location.href = "index.php?uid='<?php echo $passing_variable; ?> '";
                                                            </script>
                    <?php
                                                            exit();
                                                  } else {
                                                            echo "Invalid password";
                                                  }
                                        } else {
                                                  echo "User not found";
                                        }
                              }
                    }
                    ?>

          </main>

</body>

</html>