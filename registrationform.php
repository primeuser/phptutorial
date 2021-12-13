<?php

include 'includes/header.php';

?>

<h3>Registration Form</h3>
<br/>

<?php

// for printing the errors or success message returned from register.php using GET method

if (isset($_GET['error'])) {

  if ($_GET['error'] == 'fields_are_empty') {
    ?>
    <h4 style="">Complete all the fields to register the user</h4>
    <?php
  }
}


if (isset($_GET['error'])) {

  if ($_GET['error'] == 'password_did_not_match') {
    ?>
    <h4 style="">Your password and reentered password did not match</h4>
    <?php
  }
}

 ?>





<div class="container">
  <div class="col-md-3">
    
  </div>
  <br>
  
    <div class="col-md-6">
    

<form method="post" action="authentication/register.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter unique username" name="username">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Re-Enter Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="repassword">
  </div>
  <br>
  <button type="submit" name="register" class="btn btn-primary">Register Student</button>
</form>
</div>
  <div class="col-md-3">
    
  </div>
</div>

<?php

include 'includes/footer.php';

?>
