<?php 
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $numExistRows = mysqli_num_rows($result);
    $result = mysqli_query($conn, $existSql);
    if ($numExistRows > 0){
        $showError = "Username already exists";
        }
    
    else{ 

        if($password == $cpassword){
            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else {
            $showError = "Passwords do not match";
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <title>SignUp</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your account is now created and you can login
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '. $showError.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Signup to our Website</h1>
        <form action="/loginsystem/signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
               
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                 <div id="emailHelp" class="form-text">Make sure to type the same password</div>
            </div>
            
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    
  </body>
</html>