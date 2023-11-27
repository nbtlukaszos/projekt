<?php include('server.php') ;
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM produkty WHERE ID = $delete_id";
    if ($db->query($sql_delete) === TRUE) {
        echo "Wiersz został usunięty.";
    } else {
        echo "Błąd usuwania wiersza: " . $db->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa = $_POST['nazwa'];
    $kategoria = $_POST['kategoria'];
    $cena = $_POST['cena'];

    $sql_insert = "INSERT INTO produkty (Nazwa, Kategoria, Cena) VALUES ('$nazwa', '$kategoria', '$cena')";
    if ($db->query($sql_insert) === TRUE) {
        echo "Nowy wiersz został dodany.";
    } else {
        echo "Błąd dodawania wiersza: " . $db->error;
    }
}


$sql = "SELECT * FROM produkty";
$result = $db->query($sql);


if ($result->num_rows > 0) {
 
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nazwa</th><th>Kategoria</th><th>Cena</th><th>Akcja</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Nazwa"] . "</td><td>" . $row["Kategoria"] . "</td><td>" . $row["Cena"] . "</td><td><a href='?delete_id=" . $row["ID"] . "'>Usuń</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak danych do wyświetlenia.";
}
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nazwa">Nazwa:</label>
    <input type="text" id="nazwa" name="nazwa"><br><br>
    <label for="kategoria">Kategoria:</label>
    <input type="text" id="kategoria" name="kategoria"><br><br>
    <label for="cena">Cena:</label>
    <input type="text" id="cena" name="cena"><br><br>
    <input type="submit" value="Dodaj">
</form>
<form method="get" action="admin.php">
    <input type="submit" value="Powrót do Panelu głownego">
    </form>
</body>
</html>
