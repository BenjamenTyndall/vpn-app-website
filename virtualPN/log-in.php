<?php

require "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST["submit"])){
  $user = $_POST["name"];
  $password = $_POST["password"];
  $hashpass = password_hash($password, PASSWORD_DEFAULT);
  $match = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
  $hashed = mysqli_query($conn, "SELECT * FROM users WHERE password = '$password'");
  $row = mysqli_fetch_assoc($match);
  if (mysqli_num_rows($match)>0 ){
    if (password_verify($password, (string)$row['password'])) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      echo "      <script>
              alert('login in successful');
              
              
      </script>";
      }
    else{
      echo "
      <script>
              alert('Incorrect username or password');
              
              
      </script>

      ";      
        }
    }
  else{
    echo "<script>alert('This user does not exist..');</script>
    ";
  }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
  </head>
<body>
<div >
  <form method="post">
    <h1 id="logintext">Log-in</h1>
      <label for="name" id="enter-user username">Username</label>
      <input type="name" placeholder="Username" id="enter-user" name="name" required value="">
    <br>
      <label for="password">Password</label>
      <input type="password" placeholder="********" name="password" required value="">
    <br>
      <button type="submit" name="submit" >Log in</button>
      <div>
    <p6 id="areyounew"> are you new?</p6> <a href="sign-up.php">sign up here</a>
    </div>
  </form>
</div>
</body>
</html>