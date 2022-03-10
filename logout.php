<?php
include 'head.php';
session_start();
if(isset($_SESSION["utilizator"])) {
    session_destroy();
echo 'You have been logged out';
echo '<a href="index.php"> Click here to go back to log in </a>';
} else {
    echo 'You are not logged in';
    echo '<a href="index.php"> Click here to go back to log in</a>';
}
?>