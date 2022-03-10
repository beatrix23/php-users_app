<?php
include 'config.php';
function getData($method,$key){
	$value="";
	if(isset($method["$key"]))
		$value=htmlentities($method["$key"]);
	return $value;
}
$username=getData($_GET,"username");
$query="SELECT username FROM utilizatori WHERE username LIKE'$username%'";
$utilizatoriExistenti=array();	
	$result=$conn->query($query);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc())
			array_push($utilizatoriExistenti,$row["username"]);
	}
echo json_encode($utilizatoriExistenti);