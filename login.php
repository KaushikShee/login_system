<?php 
 $login = 2;

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     include 'part/_dbCon.php';
     $username = $_POST['username'];
     $password = $_POST['password'];
     $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
     $res = mysqli_query($connect, $sql);
     $num = mysqli_num_rows($res);
     if ($num == 1) {
       $login = 1;
       session_start();
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $username;
       header("location: welcome.php");
     }
     else {
       $login = 0;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Log-In</title>
</head>

<body>
    <?php require 'part/_nav.php' ?>
    <?php
    if($login == 1) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You are logged in.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    else if ($login == 0) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Login Failed!</strong> Invalid credential.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    
  ?>
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

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>