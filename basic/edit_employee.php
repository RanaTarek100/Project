<?php
include 'connect to database.php';
include 'employeeHome.php';

    //insert the department name into the database

if(isset($_SESSION['userPassword']) && $rows['department']=="ADMIN"){
    $query123 = "SELECT * FROM `employee` " ;
    $result123 = mysqli_query($conn, $query123);

?>
<html>

<head>
    <style>
    #myDIV {

        visibility: hidden;
    }
    </style>

</head>

<body>
    <!-- It's just form to take the data of employee -->

    <form method="POST" action="edit_employee.php">
        <div class="container text-center mt-5">
            <label>Select Employee</label>
            <div class="col-lg-12">
            <select name="nameEmp" class="col-lg-12" selected>
            <?php
                while($row = mysqli_fetch_assoc($result123)) {
                    echo "<option value='".$row['id']."'>".$row['id']."-".$row['name']."</option>";
                }
            ?>
               
                </div>
            <div class="form-group">
            </div>
            <input type="submit" class="btn btn-info" name="edit"     value="Update">
            <input type="submit" class="btn btn-danger" name="delete" value="Delete">
            <!-- <input type="submit" class="btn btn-info" name="edit" value="Edit"> -->
            <br><br>

        </div>
    </form>
</body>

</html>
<?php
if(isset($_POST['edit'])){
    $dep_id= $_POST['nameEmp'];
    $_SESSION['asd']=$dep_id;
    echo"<script>location.href = 'updateEmp.php';</script>";
    
}

if(isset($_POST['delete'])){
    $dep_id= $_POST['nameEmp'];
    $query2 = "DELETE FROM `employee` WHERE `id` = '$dep_id'";
    $result2 = mysqli_query($conn, $query2);
if ($result2)
    alert("Deleted");
}
}else{
header('location:employeeHome.php');
}
?>
