<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "kaltenboeck_db";

// Verbindung zur DB herstellen
$conn = mysqli_connect($sname, $uname, $password, $db_name);

// MySQL mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($conn, "utf8");

// Kurzform für mysqli_query
function query($statement) {
    global $conn;
    $result = mysqli_query($conn, $statement) or die(mysqli_error($conn) . "<br />" . $statement);
    return $result;
}

// Escape-Funktion um SQL-Injections zu vermeiden
function escape($input) {
    global $conn;

    if (is_array($input)) {
        // nur für arrays
        $ret = array();
        foreach ($input as $key => $value) {
            $ret[$key] = escape($value);
        }
        return $ret;
    } else {
        // strings, float, int
        return mysqli_real_escape_string($conn, $input);
    }
}

// Wenn keine Verbindung zur DB hergestellt werden kann
if (!$conn) {
	echo "Connection Failed!";
	exit();
}
