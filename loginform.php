<?php

include 'includes/header.php';



// for printing the errors or success message returned from register.php using GET method

if (isset($_GET['error'])) {

  if ($_GET['error'] == 'password_incorrect') {
    ?>
    <h4 style="">Login Failed due to incorrect password</h4>
    <?php
  }
}


 ?>
 <div class="container">
  <div class="col-md-3">
    
  </div>
  <br>

    <div class="col-md-6">
    

<form method="post" action="authentication/login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username or Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="loginname">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
</div>
  <div class="col-md-3">
    
  </div>
</div>
<?php

include 'includes/footer.php';

?>