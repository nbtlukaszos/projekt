<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Rejestracja</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Rejestracja</h2>
  </div>
	
  <form method="post" action="register.html">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nazwa</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Hasło</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Potwierdz hasło</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Rejestracja</button>
  	</div>
  	<p>
  		Masz już konto? <a href="login.php">Logowanie</a>
  	</p>
  </form>
</body>
</html>
