<?php include('server.php') ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styladmin.css">
</head>
<body>
<form method="get" action="product.php">
    <input type="submit" value="Produkty">
</form>
<form method="get" action="users.php">
    <input type="submit" value="Użytkownicy">
    </form>
    <form method="get" action="kategoria.php">
    <input type="submit" value="Kategoria">
    </form>
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p> <a href="index.php?logout='1'" style="color: red;">Wyloguj</a> </p>
    <?php endif ?>

</body>
</html>