<?php
session_start();

$server = "localhost";
$username1= "root";
$username = "";
$password    = "";
$dbname = "sklep";
$email = "";
$errors = array(); 


$db = mysqli_connect($server, $username1, $password, $dbname);


if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Podaj nazwe"); }
  if (empty($email)) { array_push($errors, "Podaj Email"); }
  if (empty($password_1)) { array_push($errors, "Podaj hasło"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Hasła muszą być takie same");
  }


  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Nazwa jest zajęta");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email jest zajęty");
    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Jesteś zalogowany :)";
  	header('location: index.php');
  }
}


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Podaj nazwe");
  }
  if (empty($password)) {
  	array_push($errors, "Podaj hasło");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Jesteś zalogowany :)";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Hasło/Nazwa się niezgadza");
  	}
  }
}

?>
