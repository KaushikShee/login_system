<?php 
 $showalert = false;

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     include 'part/_dbCon.php';
     $username = $_POST['username'];
     $password = $_POST['password'];
     $cpassword = $_POST['cpassword'];
     $exists = false;
     if ($password == $cpassword && $exists == false) {
         $sql = "INSERT INTO `user`(`username`, `password`, `date`) 
                 VALUES ('$username', '$password', current_timestamp())";
         $res = mysqli_query($connect, $sql);
         
         if ($res) {
             $showalert = true;
         }
     }
 }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sign-Up</title>
  </head>
  <body>
    <?php require 'part/_nav.php' ?>
  <?php
    if($showalert) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your accoucnt is now created.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Warning!</strong> Please check password once again.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    
  ?>
    <div class="container">
        <h1 class="text-center">Please Sign-Up</h1>
    </div>
    <form class="d-flex flex-column align-items-center" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>