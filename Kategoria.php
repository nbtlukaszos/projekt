<?php include('server.php') ;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $delete_id = $_POST['delete'];
    $sql_delete = "DELETE FROM kategoria WHERE id_kat=$delete_id";

    if ($db->query($sql_delete) === TRUE) {
        echo "Kategoria została usunięta.";
    } else {
        echo "Błąd podczas usuwania kategorii: " . $db->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_category'])) {
    $new_category = $_POST['new_category'];
    $sql_insert = "INSERT INTO kategoria (kategoria) VALUES ('$new_category')";

    if ($db->query($sql_insert) === TRUE) {
        echo "Nowa kategoria została dodana.";
    } else {
        echo "Błąd podczas dodawania nowej kategorii: " . $db->error;
    }
}

$sql = "SELECT * FROM kategoria";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Kategoria</th><th>Usuń</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id_kat"] . "</td>";
        echo "<td>" . $row["Kategoria"] . "</td>";
        echo "<td>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='delete' value='" . $row["Id_kat"] . "'>";
        echo "<input type='submit' value='Usuń'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Brak danych do wyświetlenia.";
}

echo "<h2>Dodaj nową kategorię</h2>";
echo "<form method='post' action=''>";
echo "Kategoria: <input type='text' name='new_category'><br>";
echo "<input type='submit' value='Dodaj'>";
echo "</form>";

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
<form method="get" action="admin.php">
    <input type="submit" value="Powrót do Panelu głownego">
    </form>
</body>
</html>