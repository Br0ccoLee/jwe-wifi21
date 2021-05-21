<?php  

$sql = "SELECT * FROM users WHERE role='admin' order By ID ASC";

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    

    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 

$result = query("SELECT * from gaesteliste where restaurant = (Select titel from restaurant where id = (Select id_restaurant from restaurantbesitzer where id_besitzer = $_SESSION[id])) ORDER BY datum ASC");


while ($row = mysqli_fetch_assoc($result)) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Vorname</th>";
    echo "<th>Nachname</th>";
    echo "<th>Restaurant</th>";
    echo "<th>Anzahl Erwachsene:</th>";
    echo "<th>Anzahl Kinder</th>";
    echo "<th>Datum</th>";
    echo "<th>Lokal betreten:</th>";
    echo "<th>Lokal verlassen:</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<br>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>{$row['vorname']}</td>";
    echo "<td>{$row['nachname']}</td>";
    echo "<td>{$row['restaurant']}</td>";
    echo "<td>{$row['anzahl_erwachsene']}</td>";
    echo "<td>{$row['anzahl_kinder']}</td>";
    echo "<td>";
    $date = date("d.m.Y", strtotime($row['datum']));
    echo "<td>";
    echo $date;

    echo "<td>";
    $date = date("H:i", strtotime($row['zeit_lokal_betreten']));
    echo "<td>";
    echo $date;
    echo "<td>";
    $date = date("H:i", strtotime($row['zeit_lokal_verlassen']));
    echo "<td>";
    echo $date;
    echo "</tr>";
    echo "</tbody>";
    echo "<br>";
    echo "<table>";
}