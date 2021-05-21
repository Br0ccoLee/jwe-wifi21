<?php 
	

   session_start();
   include "db_conn.php";



   if (isset($_SESSION['name']) && isset($_SESSION['id'])) {  
	   
	 
?>


	

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

	<link href="bootstrap/css/style1.css" rel="stylesheet">
</head>
<body>
    <div class="innerWrapper">
      	<?php if ($_SESSION['role'] == 'admin') {?>
      		<!-- Adminbereich -->
      		<div class="card_img">
			  <img src="img/admin-default.png" 
			       class="card-img-top" 
			       alt="admin image">
			  <div class="card-body">
			    <h5 class="card-title">
			    	<?=$_SESSION['username']?>
			    </h5>
			    
			  </div>
			</div>
			<div class="p-3">
				<?php include 'php/members.php'; 
                 {?>
                  
				<h1 class="display-4 fs-1">Members</h1>
				<table class="table" 
				       style="width: 32rem;">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
				      <th scope="col">Restaurant</th>  
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	{?>
				    <tr>
						<?php 
					echo "<td>$_SESSION[username]</td>";
					echo "<td>$_SESSION[name]</td>";?>
				      
				    </tr>
				    <?php }?>
				  </tbody>
				</table>
				
				<?php }?>
			</div>
      	<?php }else { ?>
      		<!-- Gästebereich -->
              
				<?php include 'kopf.php' ?>
                <?php include 'besuch_dokumentieren.php' ?>
				
				 
				
				
			   
				
            
      	<?php } ?>
    </div>



</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>

<?php include 'fuss.php' ?>