<?php
include 'head.php';
include 'config.php';
session_start();
if(isset($_SESSION["parola"]) && isset($_SESSION["utilizator"])) {
    echo '
 <div>
    <h3> Change password</h3>
    <form name="change" method="POST">
    <div class="form-group">
    <label>Old password:</label> 
    <input class="form-control" type="password" name="old_passw">
    </div>
    <div class="form-group"> 
    <label>New password:</label>
    <input class="form-control" type="password" name="new_passw">
    </div>
    <div class="form-group"> 
    <label>New password:</label>
    <input class="form-control" type="password" name="new_passw_two">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>';
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $valid = true;
        if (!empty($_POST["old_passw"]) && !empty($_POST["new_passw"]) && !empty($_POST["new_passw_two"])) {
            $old_passw = md5(htmlentities($_POST["old_passw"]));
            $session_passw = $_SESSION["parola"];
            if ($old_passw != $session_passw) {
                $valid = false;
                echo '<div class="alert alert-danger" role="alert">
                Invalid old password!
            </div>';
            }
            $new_passw = md5(htmlentities($_POST["new_passw"]));
            $new_passw_2 = md5(htmlentities($_POST["new_passw_two"]));
            if ($new_passw != $new_passw_2) {
                $valid = false;
                echo '<div class="alert alert-danger" role="alert">
                The two passwords does not match!
            </div>';
            }
            if ($new_passw == $old_passw || $new_passw_2 == $old_passw) {
                $valid = false;
                echo '<div class="alert alert-danger" role="alert">
                The new password must be different from the old one!
            </div>';
            }
            if ($valid) {
                $user=unserialize($_SESSION["utilizator"]);
	            $user_name = $user->getUserName();
                $update_parola = mysqli_query($conn, "UPDATE utilizatori SET password = '$new_passw' WHERE username = '$user_name' AND password = '$old_passw'");
                if(mysqli_affected_rows($conn) > 0 ) {
                    echo '
                    <div class="alert alert-info" role="alert">
                     Password changed successfully!
                    </div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
            All fields must be filled!
        </div>';
        }
    }
} else {
    echo 'You have to log in in order to change your password';
    echo '<a href="index.php"> Click here to go back to log in</a>';
}
?>