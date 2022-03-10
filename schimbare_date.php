<?php
include 'config.php';
include 'head.php';
session_start();
if(isset($_SESSION["utilizator"])) {
    require_once 'classes/Utilizator.php';
    $user=unserialize($_SESSION["utilizator"]);
    $user_name = $user->getUserName();
    $user_sql=mysqli_query($conn, "SELECT sex, starecivila, nume, prenume, email FROM utilizatori WHERE username = '$user_name'");
    $row=mysqli_fetch_row($user_sql);
    $sex = $row[0];
    $civil = $row[1];
    $nume = $row[2];
    $p_nume = $row[3];
    $email = $row[4];
    echo '<h4>Modificati datele persoanele: </h4>';
    echo '<form id="change" action="user.php" name="signup" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <div> 
    <label>Sex: </label>';
    if($sex == 1) {
        echo '<input type="radio" name="sex" value="1" checked>Masculin 
        <input type="radio" name="sex" value="2">Feminin 
        <input type="radio" name="sex" value="3">Altele';
    } else if ($sex == 2) {
        echo '<input type="radio" name="sex" value="1" >Masculin 
        <input type="radio" name="sex" value="2" checked>Feminin 
        <input type="radio" name="sex" value="3">Altele';
    } else {
    echo '<input type="radio" name="sex" value="1">Masculin 
    <input type="radio" name="sex" value="2">Feminin 
    <input type="radio" name="sex" value="3" checked>Altele';
    }
    echo'
    </div>';
    echo '
    <div> 
    <label>Starea civila: </label> ';
    if($civil == 2) {
        echo '<input type="radio" name="civila" value="1">Necasatorit/a
        <input type="radio" name="civila" value="2" checked>Casatorit/a
        <input type="radio" name="civila" value="3">Divortat/a
        <input type="radio" name="civila" value="4">Vaduv/a';
    } else if ($civil == 3) {
        echo '<input type="radio" name="civila" value="1">Necasatorit/a
        <input type="radio" name="civila" value="2">Casatorit/a
        <input type="radio" name="civila" value="3" checked>Divortat/a
        <input type="radio" name="civila" value="4">Vaduv/a';
    } else if ($civil == 4) {
        echo '<input type="radio" name="civila" value="1">Necasatorit/a
        <input type="radio" name="civila" value="2">Casatorit/a
        <input type="radio" name="civila" value="3">Divortat/a
        <input type="radio" name="civila" value="4" checked>Vaduv/a';
    }else {
    echo '<input type="radio" name="civila" value="1" checked>Necasatorit/a
    <input type="radio" name="civila" value="2">Casatorit/a
    <input type="radio" name="civila" value="3">Divortat/a
    <input type="radio" name="civila" value="4">Vaduv/a';
    }
    echo '
    </div>
    <div class="form-group">
    <label>Nume: </label> 
    <input class="form-control" type="text" id="nume" name="name" value='; echo $nume; echo' required>
    </div>
    <div class="form-group">
    <label>Prenume: </label> 
    <input class="form-control" type="text" id="prenume" name="p_nume" value='; echo $p_nume; echo' required>
    </div>
    <div class="form-group">
    <label>Email: </label> 
    <input class="form-control" type="email" id="email" name="email" value='; echo $email; echo' required>
    </div>
    <div class="form-group">
    <label for="avatar">Choose a profile picture:</label>
    <input type="file"
       id="avatar" name="avatar"
       accept="image/png, image/jpeg, image/avif, image/apng, image/gif, image/svg+xml, image/webp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>';
    //TODO: update table in database
}
?>