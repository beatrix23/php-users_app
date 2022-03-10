<?php
include 'head.php';
include 'config.php';
session_start();
if(isset($_SESSION["utilizator"])) {
    $link = ($_GET['link']);
    //get the first word from link
    $utilizator = strtok($link, " ");
    $user=mysqli_query($conn, "SELECT username, sex, starecivila, nume, prenume, email, dataregistrare FROM utilizatori WHERE username = '$utilizator'");
    $row=mysqli_fetch_row($user);
    $u_name = $row[0];
    $sex = $row[1];
    $stare_civila = $row[2];
    $first_name = $row[3];
    $last_name = $row[4];
    $e_mail= $row[5];
    $data = $row[6];
    echo '<div class="alert alert-info" role="alert">
    Here is more info about: ' . $first_name . " " . $last_name .
  '</div>' ;
  echo '
  <div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light">';
      $target = "poze/" . $utilizator . ".jpg";
      if(file_exists($target))  {
      	echo "<img width='100' src='$target'>";
          echo '</div>';
      } else {
      echo "There is no photo uploaded!";
      } echo '</div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">
';
    echo "<div>". "Nume utilizator: " . $utilizator . "</div>";
	echo "<div>" . "Nume si prenume: " .  $first_name . " ". $last_name . "</div>";
    if ($sex == "1") {
        $sex_conv = "Masculin";
    } else if ($sex == "2") {
        $sex_conv = "Feminin";
    } else if ($sex == "3") {
        $sex_conv = "Altele";
    }
    echo "<div>" . "Sexul: " . $sex_conv . "</div>";
    if ($stare_civila == "1") {
        $civil = "Necasatorit/a";
    } else if ($stare_civila == "2") {
        $civil = "Casatorit/a";
    } else if ($stare_civila == "3") {
        $civil = "Divortat/a";
    } else if ($stare_civila == "4") {
        $civil = "Vaduv/a";
    }
    echo "<div>" . "Stare civila: " . $civil . "</div>";
    echo "<div>" . "Email: " . $e_mail . "</div>";
    echo "<div>" . "Data inregistrarii: " . $data . "</div>";
    echo '</div>
    </div>
  </div>';
  echo '<a href="index.php" class="link-dark">Go back</a>
</div> ';
    
} else {
    echo '<div class="alert alert-warning" role="alert">
    You need to be logged in in order to see info about users!
  </div>';
    echo '<a href="login.php"> Log In</a>
    </br>
    <a href="inscriere.php"> Sign up</a>';
}
?>