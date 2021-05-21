<?php 


$erfolg = false;



$sql_vorname = "";
$sql_nachname = "";
$sql_mail = "";
$sql_gaesteliste_id = "";
$sql_id = "";
$_SESSION = "";
$_GET['id'] = "";


?>
<?php


// Prüfen ob das Formular abgeschickt wurde
if (!empty($_POST)) {
    $sql_vorname = escape($_POST['vorname']);
    $sql_nachname = escape($_POST['nachname']);
	$sql_restaurant = escape($_POST['restaurant']);
    $sql_anzahl_erwachsene = escape($_POST['anzahl_erwachsene']);
    $sql_anzahl_kinder = escape($_POST['anzahl_kinder']);
    $sql_zeit_lokal_betreten = escape($_POST['zeit_lokal_betreten']);
	$sql_zeit_lokal_verlassen = escape($_POST['zeit_lokal_verlassen']);
	$sql_datum_besuch = escape($_POST['datum']);
	$sql_mail = escape($_POST['mail']);
    $sql_id = ($_GET['id']);
    
    


    query("UPDATE gaesteliste SET 
        vorname = '{$sql_vorname}',
        nachname = '{$sql_nachname}', 
        restaurant = '{$sql_restaurant}',
        anzahl_erwachsene = '{$sql_anzahl_erwachsene}',
        anzahl_kinder = '{$sql_anzahl_kinder}',
		zeit_lokal_betreten = '{$sql_zeit_lokal_betreten}',
		zeit_lokal_verlassen = '{$sql_zeit_lokal_verlassen}',
		datum = '{$sql_datum_besuch}',
		mail = '{$sql_mail}',
        WHERE id = '{$sql_id}'
        ");

    $erfolg = true;

}

    // Datenbank zur Vorausfüllung fragen
    $sql_id = ($_GET['id']);
    $result = query("SELECT * FROM gaesteliste WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);
?>

<h1>Besuch bearbeiten</h1>

<form action="besuch_bearbeiten.php?id=<?php echo $row['id']; ?>" method="POST" class="form_index">
    <div>
        <label for="vorname">Vorname:</label><br>
        <input type="text" name="vorname" id="vorname" value="<?php 
        
        
                                                                if (!empty($_POST['vorname']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['vorname']);
                                                                } else echo htmlspecialchars ($row['name']); ?>" readonly>
    
    
        <label for="nachname">Nachname:</label><br>
        <input type="text" name="nachname" id="nachname" value="<?php if (!empty($_POST['nachname']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['nachname']);
                                                                } else echo htmlspecialchars ($row['nachname']); ?>" readonly>
    <br>

                <label for="restaurant" class="form_index"
                    >Hier können Sie wählen in welchem Restaurant Sie sich aktuell befinden:</label
                ><br>
                <select
                    class="form-select"
					name="restaurant"
                    id="restaurant"
                    required
                >
                    <option value="">Bitte wählen...</option>
					<?php
            		$result = query("SELECT * FROM restaurant ORDER BY id ASC");

            		while ($restaurant = mysqli_fetch_assoc($result)) {
                	echo "<option value='{$restaurant["titel"]}'";

                	if (!empty($_POST["restaurant"]) && !$erfolg && $_POST["restaurant"] == $restaurant["id"]) {
                    // Formular wurde mit Fehlern abgeschickt -> Mit POST-Werten vorausfüllen
                    echo " selected";
                	}
               	 	echo ">{$restaurant["titel"]}</option>";
            		}
           			?>
        		</select>



			<div class="col-md-3">
                <label for="anzahl_erwachsene" class="form-label"
                    >Anzahl der Erwachsenen</label
                ><br>
                <select
                    class="form-select"
					name="anzahl_erwachsene"
                    id="anzahl_erwachsene"
                    required
                >
                    <option value="">Anzahl Erwachsene:</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>


                <div class="col-md-3">
                <label for="anzahl_kinder" class="form-label"
                    >Anzahl der Kinder</label
                ><br>
                <select
                    class="form-select"
					name="anzahl_kinder"
                    id="anzahl_kinder"
                    required
                >
                    <option value="">Anzahl Kinder:</option>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>

		
               

			<label for="zeit_lokal_betreten" id="l_t_lokal_betreten">Uhrzeit Lokal betreten:</label><br>
            <input type="time" name="zeit_lokal_betreten" id="t_lokal_betreten" required><br>
            <label for="zeit_lokal_verlassen" id="l_t_lokal_verlassen">Uhrzeit Lokal verlassen:</label><br>
            <input type="time" name="zeit_lokal_verlassen" id="t_lokal_verlassen" required>
            
            <label for="datum" id="l_date">Datum:</label><br>
            <input type="date" format="yyy.mm.dd" name="datum" id="l_datum" required>
            

            <label for="mail" id="u_mail">Ihre E-Mail Adresse:</label><br>
            <input type="email" name="mail" id="u_mail" placeholder="Bitte E-Mail Adresse eintragen" value="<?php if (!empty($_POST['mail']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['mail']);
                                                                } else echo htmlspecialchars ($row['vorname']); ?>" readonly>
		
	
                                                    
    <div>
        <button type="submit">Besuch dokumentieren</button>
    </div>
</form>

<div>
    <?php

$result = query("SELECT * FROM gaesteliste WHERE userid = $sql_user_id"); 



while ($row = mysqli_fetch_assoc($result)) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
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

    ;}
    // Erfolgsmeldung
    if ($erfolg) {
        echo "<p><strong>Besuch wurde bearbeitet.</strong><br>";
        
    }
    
?>
</div>