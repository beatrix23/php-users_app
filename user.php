<?php
include 'config.php';
function sanitizare($string) {
    $string=trim($string);
    $string=stripslashes($string);
    $string=htmlspecialchars($string);
    return $string;
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $utilizator = htmlentities($_POST["username"]);
    $parola = md5(htmlentities($_POST["passw"]));
    $exista_utilizator = mysqli_query($conn, "SELECT username FROM utilizatori where username = '$utilizator' AND password = '$parola'");
    if (mysqli_num_rows($exista_utilizator) > 0) {
        $user=mysqli_query($conn, "SELECT username, password, sex, starecivila, nume, prenume, email, dataregistrare FROM utilizatori WHERE username = '$utilizator' AND password = '$parola'");
        $row=mysqli_fetch_row($user);
        $u_name = $row[0];
        $passw= $row[1];
        $sex = $row[2];
        $civil = $row[3];
        $first_name = $row[4];
        $last_name = $row[5];
        $e_mail= $row[6];
        $data = $row[7];
        $poza = '<img src="poze/"' . $u_name . '"jpeg"';
        $order = $_POST["order"];
        //echo $poza;
        require_once("classes/Utilizator.php");
        $user_object = new Utilizator($u_name, $passw, $sex, $civil, $first_name, $last_name, $e_mail, $poza, $data);
        session_start();
        $_SESSION["utilizator"] = serialize($user_object);
        $_SESSION["order"] = $order;
        $_SESSION["parola"] = $passw;
        echo ' Log In realizat cu succes!';
        //require_once 'head.php';
        require_once 'index.php';
        echo '<a href="schimbare_date.php">Schimba datele personale</a>';
    }
    if (mysqli_num_rows($exista_utilizator) == 0 && !isset($_POST["email"])) {
        echo " Ati gresit numele de utilizator sau parola! ";
    }
     //daca este completat email => a fost completat formularul de sign up, nu log in
    if (mysqli_num_rows($exista_utilizator) == 0 && isset($_POST["email"])) {
        $utilizator = sanitizare($_POST["username"]);
        $parola = md5(sanitizare($_POST["passw"]));
        $target_dir = "poze/";
        $target_file = $target_dir . $utilizator . ".jpg";
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
        list($width, $height) = getimagesize($target_file);
            $new_width = 270;
            $new_height = 200;
        $thumb =  imagecreatetruecolor($new_width, $new_height);
        $source = imagecreatefromjpeg($target_file);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($thumb, $target_file);
        $sex = sanitizare($_POST["sex"]);
        $civil = sanitizare($_POST["civila"]);
        $nume = sanitizare($_POST["name"]);
        $nume_capital = ucfirst(strtolower($nume));
        $p_nume = sanitizare($_POST["p_nume"]);
        $p_capital = ucfirst( strtolower($p_nume));
        $email = sanitizare($_POST["email"]);
        $data_reg = date("Y-m-d");
        require_once("classes/Utilizator.php");
        // $query="INSERT INTO $tbname (username,password,sex,starecivila,nume,prenume,email,dataregistrare) VALUES ('$utilizator','$parola','$sex','$civil','$nume_capital','$p_capital','$email', '$data_reg')";
        // $result=mysqli_query($conn,$query);
        $prep = $conn->prepare("INSERT INTO $tbname (username,password,sex,starecivila,nume,prenume,email,dataregistrare) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $prep->bind_param("sssssssd",$utilizator, $parola, $sex, $civil, $nume_capital, $p_capital, $email, $data_reg);
        $user_object = new Utilizator($utilizator, $parola, $sex, $civil, $nume_capital, $p_capital, $email, $target_file, $data_reg);
        $prep->execute();
        $prep->close();
        //Insert values into text file
        $filename='utilizatori.txt';
        file_put_contents($filename, $user_object->toCSV(), FILE_APPEND | LOCK_EX);
        //Insert values into xml file
        $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><utilizator></utilizator>");
        $xml->addChild('username', $utilizator);
        $xml->addChild('password', $parola);
        $xml->addChild('sex', $sex);
        $xml->addChild('stare_civila', $civil);
        $xml->addChild('nume', $nume_capital);
        $xml->addChild('prenume', $p_capital);
        $xml->addChild('email', $email);
        $xml->addChild('data_reg', $data_reg);
        $asXml=$xml->asXml();
        $file=fopen("data.xml", "a+");
        fwrite($file,$asXml);
        fclose($file);
        //Insert values into JSON
        $from = file_get_contents('user.json');
        $temp_arr = json_decode($from);
        $arr = array('username'=>$utilizator,'password'=>$parola,'sex'=>$sex,'stare_civila'=>$civil,'nume'=>$nume_capital,'prenume'=>$p_capital,'data'=>$data_reg);
        array_push($temp_arr, $arr);
        $json_data = json_encode($temp_arr);
        file_put_contents('user.json', $json_data);
        //idk maybe not ok to comment this?????
        //session_start();
        $_SESSION["utilizator"] = serialize($user_object);
        $_SESSION["parola"] = $parola;
        unset($_SESSION["order"]);
        echo " Contul tau a fost realizat cu success!";
        require_once 'index.php';
    }
}
?>