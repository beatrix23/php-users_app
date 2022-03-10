<?php
include 'head.php';
 echo '
 <div>
    <h3> Log In</h3>
    <form name="login" action="user.php" method="POST">
    <div class="form-group">
    <label>Username:</label> 
    <input class="form-control" type="text" name="username">
    </div>
    <div class="form-group"> 
    <label>Password:</label>
    <input class="form-control" type="password" name="passw">
    </div>
    <div> 
    <label>How do you want to display the usernames: </label>
    <input type="radio" name="order" value="0" checked>Ascending
    <input type="radio" name="order" value="1">Descending
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 </div>
 ';
?>