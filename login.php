<?php include('server.php') ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {

        header("Location: admin.php");
        exit(); 
    } else {

        echo "Błędny login lub hasło.";
    }
}?>
<!DOCTYPE html>
<html>
<head>
  <title>Logowanie</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Logowanie</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Nazwa</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Hasło</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Zaloguj</button>
  	</div>
  	<p>
  		Nie masz konta? <a href="register.php">Rejestracja</a>
  	</p>
  </form>
</body>
</html>
