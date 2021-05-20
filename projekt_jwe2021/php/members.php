<?php  


if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    
    $sql = "SELECT * FROM users WHERE role='admin' ORDER BY id ASC";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 

$result = query("SELECT * from gaesteliste where restaurant = (Select titel from restaurant where id = (Select id_restaurant from restaurantbesitzer where id_besitzer = $_SESSION[id])) ORDER BY datum ASC");


while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='row text-center'>";
    echo "<div class='col-1'>{$row['vorname']}</div>";
    echo "<div class='col-1'>{$row['nachname']}</div>";
    echo "<div class='col-1'>";
    $date = date("d.m.Y", strtotime($row['datum']));
    echo $date;
    echo "</div>";
    echo "<div class='col-1'>";
    $date = date("H:i", strtotime($row['zeit_lokal_betreten']));
    echo $date;
    echo "</div>";
    echo "<div class='col-1'>";
    $date = date("H:i", strtotime($row['zeit_lokal_verlassen']));
    echo $date;
    echo "</div>";

}