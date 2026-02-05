<?php 

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
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
    
    <title>Welcome - <?php echo $_SESSION['username'] ?></title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    
      <div class="container">
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username'] ?></h4>
              <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['username'] ?>. 
              Aww yeah, you successfully read this important alert message. This example text is going to run a bit 
              longer so that you can see how spacing within an alert works with this kind of content.</p>
              <hr>
              <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php">using this link.</a></p>
          </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    
  </body>
</html>