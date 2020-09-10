<?php
session_start();
$conn=mysqli_connect('localhost','root','','proj1');
if(!isset($_SESSION['userName'])){
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="index.css">
  </head>

  <body class="bg-dark">
    <div class="container bg-light">
        <div class="form-group">
            <div class="container-fluid" style="max-width:250px;">
              <input class="btn btn-dark btn-md   btn-block invisible" id="hide">
              <a href="admin.php"><input class="btn btn-dark btn-md m-2 btn-block " type="submit" value="Admin Login" name="reg"></a> 
              <input class="btn btn-dark btn-md   btn-block invisible" id="hide">
              <input class="btn btn-dark btn-md   btn-block invisible" id="hide">
              <a href="user.php"><input class="btn btn-dark btn-md m-2 btn-block " type="submit" value="User Login" name="reg"></a>
              <input class="btn btn-dark btn-md   btn-block invisible" id="hide">
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
else{
  header('location:employeeHome.php');
}
?>