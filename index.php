<?php	
function getData(){
	// Connected database 
$Conectar = mysql_connect('bzmnlqfbzcwpkyatgaqk-mysql.services.clever-cloud.com', 'u0or8jlthvzi1zyf', 'Uuy0SDPx46x1MFXBYIPH');
// Selected database
mysql_select_db('bzmnlqfbzcwpkyatgaqk', $Conectar);
	$query = 'SELECT * FROM  contacts';
	$result = mysql_query($query);
// Response query
	while ($line = mysql_fetch_assoc($result)) {
	    echo "\t<div class='card col' style='width: 16rem;'>
	  				<div class='card-body'>\n";
				        echo "<h5 class='card-title'>"; echo $line['fullname']; echo "</h5>";
	    				echo "<h6 class='card-subtitle mb-2 text-muted'>"; echo $line['phone']; echo "</h6>";
	    				echo "<p class='card-text'>"; echo $line['email']; echo "</p>";
	    				echo "<a href='' class='card-link'>Edit</a>";
	    				echo "<a href='' class='card-link'>Delete</a>\n";
	    echo "\t</div></div>\n";
	}
	// free results of data
	mysql_free_result($result);
	// Close connect
	mysql_close($Conectar);
};
function getIdData(){

};
if($_POST['fullname']){
	addData();
}
function addData(){
	$connect = mysql_connect('bzmnlqfbzcwpkyatgaqk-mysql.services.clever-cloud.com', 'u0or8jlthvzi1zyf', 'Uuy0SDPx46x1MFXBYIPH');
	mysql_select_db('bzmnlqfbzcwpkyatgaqk', $connect);
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sql = "INSERT INTO contacts (fullname, phone, email) VALUES ('$fullname','$phone','$email')";
	$response_post = mysql_query($sql);
	if(!$response_post){
		die('Consulta no válida: ' . mysql_error());
	}
	mysql_close($connect);
};
function updateData(){};
function deleteData(){}; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="./styles.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
	 <div class="container">
	 	<form method="POST" action="index.php">
        <input class="input-form" placeholder="Name" type="text" name="fullname">
        <input class="input-form" placeholder="Age" type="number" name="phone">
        <input class="input-form" placeholder="Email" type="email" name="email">
        <input class="btn-add" type="submit" value="Enviar" id="btn-add">
        </form>
    </div>
    <div class="get-data">
    	<div class="row row-cols-2 row-width">
    		<?php 
    			include_once "index.php";
    			getData(); 
    		?>
    	</div>	
    </div>
</body>
</html>