<?php
include 'connect to database.php';
include 'employeeHome.php';
if(isset($_SESSION['userPassword']) && $rows['department']=="HR"||$rows['department']=="ADMIN"){
if(isset($_GET['readmore'])){
    $_SESSION['eslam']=$_GET['readmore'];
    $v=$_SESSION['eslam'];
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>readmore</title>
</head>
<body>
    <!-- ============================================================ -->

<div class="container text center">
        <div class="row col col-md-12 text center mb-5">
            <table class="table mt-5 col col-md-12">
                    <thead class="thead-light">
                        <tr>
                        <th >#Employee ID</th>
                        <th >Employee Name</th>
                        <th >Employee Pass</th>
                        <th >Employee Phone</th>
                        <th >Employee Salary</th>
                        <th >Employee email</th>
                        <th >Employee age</th>
                        <th >Employee Department</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        
                        $read = "SELECT * FROM `employee` WHERE department='$v'";
                        $r = mysqli_query($conn , $read);
                        foreach($r as $data){ ?>
                            <tr>
                            <td> <?php echo $data['id'] ?> </td>
                            <td> <?php echo $data['name'] ?> </td>
                            <td> <?php echo $data['pass'] ?> </td>
                            <td> <?php echo $data['phone'] ?> </td>
                            <td> <?php echo $data['salary'] ?> </td>
                            <td> <?php echo $data['email'] ?> </td>
                            <td> <?php echo $data['age'] ?> </td>
                            <td> <?php echo $data['department'] ?> </td>
                            </tr>

                        <?php
                        
                        }
                    ?>
                    </tbody>
            </div>

    </div>
<!-- ============================================================ -->
</body>
</html>
<?php
}
?>