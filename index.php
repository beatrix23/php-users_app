<?php
include 'head.php';
include 'config.php';
session_start();
if(isset($_SESSION["order"])) {
    $array = array();
    $users = mysqli_query($conn, "SELECT * FROM utilizatori");
    while ($row = mysqli_fetch_row($users)) {
        $poza = "poze/" . $row[0]. ".jpg";
        $user = $row[0];
        $array[$user] = array();
        $array[$user]["user_name"]=$row[1];
        $array[$user]["passw"]=$row[2];
        $array[$user]["sex"]=$row[3];
        $array[$user]["civil"]=$row[4];
        $array[$user]["nume"]=$row[5];
        $array[$user]["p_nume"]=$row[6];
        $array[$user]["email"]=$row[7];
        $array[$user]["data"]=$row[8];
        $array[$user]["poza"]=$poza;
    } 
    $order = $_SESSION["order"];
    if ($order == 0) {
        ksort($array);
    } else {
        krsort($array);
    }
    echo '<ul class="list-group">';
    foreach($array as $k => $v){
	echo '<li class="list-group-item">';
	if(isset($_SESSION["utilizator"])){
		echo '<div class="d-flex justify-content-center align-items-center">';
		echo '<div class="d-flex flex-column align-items-center">';
		echo "<div>".$v["user_name"]."</div>";
		echo "<div>".$v["nume"]." ".$v["p_nume"]."</div>";
		//echo "<div>".$v["email"]."</div>";
        //echo "<div>".$v["data"]."</div>";
        echo '<a href="user_info.php?link=' . $v["user_name"].' class="link-info">More about this user</a>';
		echo '</div>';
        // $target = "poze/" . $v["user_name"] . ".jpg";
		// if(file_exists($target))  {
		// 	echo "<img width='100' src='$target'>";
		//     echo '</div>';
	    // } else {
		// echo $k;
        // }
	}
	echo '</li>';
}
echo "</ul>";
//daca a creat contul trebuie sa treaca prin log in pt a vedea utilizatorii
} else if(isset($_SESSION["utilizator"])) {
    echo '<a href="login.php"> Faceti Log In pentru a intra in contul creat </a>
    </br>';
} else {
    echo '<a href="login.php"> Log In</a>
    </br>
    <a href="inscriere.php"> Sign up</a>';
}
?>