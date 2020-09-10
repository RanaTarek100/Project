<?php
include 'connect to database.php';
session_start();
$conn=mysqli_connect('localhost','root','','proj1');


$uID=$_SESSION['userID'];
$uName=$_SESSION['userName'];
if(isset($uName)){
$query0 = "SELECT * FROM `employee` WHERE id = $uID";
$res=mysqli_query($conn,$query0);
$rows =mysqli_fetch_array($res);
$image = $rows['imageName'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script type="text/javascript"
        src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=3mDCi6HWVnHE0RQMsvGodehbMx5hNOGNRDE2x7dNzy173YItbfkG0TsstbcY8Y_PucprQ2smIW9yzwzldm3-xg7U4xtIinn63xV7Gc8W4KUl3MWgYLCcQyKefej-xuLajskQcnE28kMbFcF7ekyB9A"
        charset="UTF-8"></script>
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav">
            <?php
if(isset($_SESSION['userPassword'])){ 
if($rows['department']=="ADMIN"){
 
  ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Department
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Insert dep.php">Add Department</a>
                    <a class="dropdown-item" href="Edit_Dep.php">Edit Department</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Employee
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Insert emp.php">Add Employee</a>
                    <a class="dropdown-item" href="Edit_employee.php">Edit Employee</a>
            </li>

            <?php
}
}
if(isset($_SESSION['userPassword'])){ 
if($rows['department']=="HR"||$rows['department']=="ADMIN"){
            ?>
            <a class="nav-link" href="list data.php">List All data</a>
            <li class="nav-item ">
                <?php
}
}
            ?>
                <a class="nav-link" href="signout.php">Signout</a>
            </li>
        </ul>
    </nav>

    <div class="card mb-3 mt-5" style=" width: 70rem;">
        <div class="row no-gutters">
            <div class="col-md-4 ">
                <img src="<?php
            echo$image;
            ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <b>ID :</b>
                        <?php 
                  echo$uID;
                  ?>
                    </h5>
                    <p class="card-text"><b>Full Name:</b> <?php
              echo$uName;
              ?>
                    </p>
                    <p class="card-text"><b>Age: </b>
                        <?php
                    echo$rows['age'];
                    ?></p>
                    <p class="card-text"><b>Salary: </b>
                        <?php
              echo $rows['salary'];
              ?>
                    </p>

                    <p class="card-text"><b>Email: </b>
                        <?php
                    echo$rows['email'];
                    ?>
                    </p>
                    <p class="card-text"><b>Phone Number: </b>
                        <?php
                    echo$rows['phone'];
                    ?>
                    </p>
                    <p class="card-text"><b>Department: </b>
                        <?php
              echo$rows['department'];
              ?>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php

}
else{
  header('location:index.php');
}
  
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>