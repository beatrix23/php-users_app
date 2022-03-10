<?php
include 'head.php';
?>
<head>
<script type="text/javascript" src="verify.js"></script>
<script type="text/javascript" src="validareJQ.js"></script>

</head>
<div>
<h3>Sign Up</h3>
<div id="info"></div>
    <form id="signup" action="user.php" name="signup" method="POST" enctype="multipart/form-data" onSubmit="return validareFormular(this);">
    <div class="form-group">
    <label>Username:</label> 
    <input class="form-control" type="text" id="username" name="username" required>
    </div>
    <div class="form-group"> 
    <label>Password:</label>
    <input class="form-control" type="password" id="passw" name="passw" required>
    </div>
    <div> 
    <label>Sex: </label>
    <input type="radio" name="sex" value="1">Masculin 
    <input type="radio" name="sex" value="2">Feminin 
    <input type="radio" name="sex" value="3" checked>Altele
    </div>
    <div> 
    <label>Starea civila: </label>
    <input type="radio" name="civila" value="1" checked>Necasatorit/a
    <input type="radio" name="civila" value="2">Casatorit/a
    <input type="radio" name="civila" value="3">Divortat/a
    <input type="radio" name="civila" value="4">Vaduv/a
    </div>
    <div class="form-group">
    <label>Nume: </label> 
    <input class="form-control" type="text" id="nume" name="name" required>
    </div>
    <div class="form-group">
    <label>Prenume: </label> 
    <input class="form-control" type="text" id="prenume" name="p_nume" required>
    </div>
    <div class="form-group">
    <label>Email: </label> 
    <input class="form-control" type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
    <label for="avatar">Choose a profile picture:</label>
    <input type="file"
       id="avatar" name="avatar"
       accept="image/png, image/jpeg, image/avif, image/apng, image/gif, image/svg+xml, image/webp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
