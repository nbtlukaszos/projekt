<?php include('server.php') ;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_username'], $_POST['new_email'], $_POST['new_password'])) {
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    $sql_insert = "INSERT INTO users (username, email, password) VALUES ('$newUsername', '$newEmail', '$newPassword')";

    if ($db->query($sql_insert) === TRUE) {
        echo "Nowy użytkownik został dodany.";
    } else {
        echo "Błąd podczas dodawania użytkownika: " . $db->error;
    }
}

$sql = "SELECT * FROM users";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Brak danych do wyświetlenia.";
}


echo "<h2>Dodaj nowego użytkownika</h2>";
echo "<form method='post' action=''>";
echo "Username: <input type='text' name='new_username'><br>";
echo "Email: <input type='text' name='new_email'><br>";
echo "Password: <input type='text' name='new_password'><br>";
echo "<input type='submit' value='Dodaj użytkownika'>";
echo "</form>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="get" action="admin.php">
    <input type="submit" value="Powrót do Panelu głownego">
    </form>
    <link rel="stylesheet" href="styladmin.css">
</body>
</html>
