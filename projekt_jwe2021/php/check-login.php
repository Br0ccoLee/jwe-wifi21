<?php  
session_start();
include "../db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../index.php?error=Password is Required");
	}else {


		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// Benutzername muss eindeutig sein
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['role'] == $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];

        		header("Location: ../home.php");

        	}else {
        		header("Location: ../index.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location: ../index.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location: ../index.php");

}


/*
	VERSUCHEN ZU INTEGRIEREN!!!!

    function checkUsername($username) {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            echo "Der Benutzername ist zulässig";
        } else {
            echo "Der Benutzername ist unzulässig. Bitte verwenden Sie nur 0-9, a-z und Punkte";
        }

        // echo preg_match("/^[a-zA-Z0-9]+$/", $username);
    }

    function checkPassword($username) {
        if (!(preg_match("/[a-zA-Z]{1,}+[0-9]{1,}+[\!\$\%\&\(\)\=\?]{1,}/", $username) == 1)) {
            echo "Der Benutzername ist zulässig";
        } else {
            echo "Der Benutzername ist unzulässig. Bitte verwenden Sie nur 0-9, a-z und Punkte";
        }

        // echo preg_match("/^[a-zA-Z0-9]+$/", $username);
    }

	*/
	