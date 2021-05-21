<?php 

	echo md5("roland");
	echo "<br>";
	echo md5("goldeneRose12345");
	echo "<br>";
	echo md5("hitchcock");
	echo "<br>";
	echo md5("manuel");

   session_start();

	$erfolg=false;

   if (!empty($_POST)) {
    $sql_username = escape($_POST['username']);
    $sql_password = escape($_POST['password']);

	$erfolg = true;
}
	
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   
	

	  ?>
<!DOCTYPE html>
<html>
<head>

	<title>Restaurant Login Kaltenboeck</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

	
	<link href="bootstrap/css/style1.css" rel="stylesheet">
	<link href="bootstrap/css/cookie.css" rel="stylesheet">
	

</head>
<body>
<p id='hinweis' class="hidden">Die Seite funktioniert nur eingeschränkt, denn es wurden keine Marketing Cookies
        erlaubt!</p>

      <div class="innerWrapper_login">
		  
      	<form class="border"
      	      action="php/check-login.php" 
      	      method="post" 
      	      >
      	      <h1 class="text-center p-3">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username"
				   value="<?php if (!empty($_POST['username']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['username']);
                                                                }?>" required>
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password"
				   value="<?php if (!empty($_POST['password']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['password']);
                                                                } ?>" required>
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">User</option>
			  <option value="admin">Admin</option>
		  </select>
		 
		  <button type="submit" 
		          class="btn_log">LOGIN</button>
		</form>
		  
      </div>

        <!-- !!!NEW OPEN HINWEISBOX -->
        <div id="hinweisbox">
            <p>Diese Seite verwendet Cookies. Dürfen wir auch Marketing Cookies setzen?</p>
            <button id="zustimmen" class="btn">Zustimmen</button>
            <button id="ablehnen" class="btn">Ablehnen</button>
        </div>
        <!-- !!!NEW CLOSE HINWEISBOX -->





	<script src="bootstrap/js/.vendor/jquery-3.5.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- cookie script -->
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

	<!-- Cookie integrieren -->
	<script src="bootstrap/js/cookie.js"></script>

</body>
</html>
<?php }else{
	header("Location: home.php");
} ?>

<!--
 -->
