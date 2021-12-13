<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <title>Hello, world!</title>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHPTutorial</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bloglist.php">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ajaxuse.php">Ajax Implement</a>
        </li>
        <?php 
              if (!isset($_SESSION['loginname'])){ ?>
              	<li class="nav-item">
              <a class="nav-link" href="loginform.php">Login</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="registrationform.php">Register</a>
              </li>
              <?php 
              } else { ?>
              	<li class="nav-item">
              <a class="nav-link" href="authentication/logout.php">Logout</a>
              </li>
              <?php
              }

              if (isset($_SESSION['loginname'])){
              	echo "<h1>Hello ".$_SESSION['loginname']. "Welcome to PHP Tutorial . </h1>";
              }

        ?>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  </head>
    <body>
      <div class="container-fluid">
        <?php 

$cookie_name = "username";
$cookie_value = "Anand Sigdel";


setcookie($cookie_name, $cookie_value, time() + (86400 * 30));


// $_SESSION['user_id'] = "sigdelanand@kbc.edu.np";

?>