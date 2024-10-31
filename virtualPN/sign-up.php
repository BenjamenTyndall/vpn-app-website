<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $username = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    // Check for duplicate username or invalid email
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert ('This email or username is already in use') </script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert ('Invalid email') </script>";
    } elseif (!preg_match('/^[A-Za-z0-9]{1,20}$/', $username)) {
        echo "<script> alert ('Invalid username. Username must be 1-20 characters long and contain only letters and numbers. Please try again.') </script>";
    } else {
        // Insert user data into the database
        $query = "INSERT INTO users (email, password, username) VALUES('$email', '$hashpass', '$username')";
        if (mysqli_query($conn, $query)) {
            echo "<script> alert ('You are registered') </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Virtual Pirate Network | Home</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg fixed-top navbar-dark navbar-purp">

  <div class="container-fluid">
    <a class="navbar-brand" href="#">Virtual Pirate Network</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-outline-light nav-item" aria-current="page" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<h4 class="title">Sign-Up</h4>
	<br>
	<br>
	
	<div class="">
		<form method="post">



<div class="container">
    <div class="col">
    	<h2 class="smalltxt pad white darkshadow">Creating an account with us is free, but you will need to subscribe with us to use your personal VPN service</h2>
      <div class="card bgg" style="width: 30rem;">
  <div class="card-body bgg">
    <h5 class="card-title">Sign-Up here</h5>
<style>   
input{
            background-color: rgba(255, 255, 255, 0); /* White color with 50% transparency */
            border-bottom: 1px solid white; /* Add a black border to the input */
            width: 28rem;
            padding-bottom: 10px;
            border-left: none;
            border-right: none;
            border-top: none;
            color: white;

        }
    </style>
    <label for="user" class="labeltx">username</h6><br>
    <input type="text" name="user" id="user" class="input" required placeholder="VirtualPirateUsername">
	<br>
    <label for="email" class="labeltx">e-mail</h6><br>
    <input type="e-mail" name="email" id="email" class="input" required placeholder="VirtualPirate@gmail.com">
	<br>
    <label for="password" class="labeltx">password</h6><br>
    <input type="password" name="password" id="password" class="input" required placeholder="**************">
    <br>
    <button type="submit" name="submit" class="btn btn-outline-light">Sign-Up</button><br>

  </div>
</div>
    </div>
    </div>
</form>
    	
    	<div class="row">
    		<div>
    
    </div>
    </div>
  </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>


