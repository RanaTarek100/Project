<?php
include 'connect to database.php';
include 'employeeHome.php';

    //insert the department name into the database
if(isset($_SESSION['userPassword']) && $rows['department']=="ADMIN"){

?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</head>


<body>
    <!-- It's just form to take the data of employee -->

    <form method="POST">
        <div class="container text-center mt-5">
            <label>Select Department</label>
            <div class="col-lg-12">
                <!-- ==================== -->
                <?php
                        $select="SELECT * from `department` ";
                        $sele=mysqli_query($conn , $select);

                        $select2 ='SELECT departname from `employee`' ;
                        $sele2=mysqli_query($conn,$select2);?>

                <select name="departname" class="col-lg-12">
                    <?php
                        $select="SELECT * from department ";
                        $sele=mysqli_query($conn , $select);

                        $select2 ='SELECT departname from employee' ;
                        $sele2=mysqli_query($conn,$select2);?>

                    <?php foreach($sele as $data){?>
                    <option value="<?php echo $data['dep_ID']?>">
                        <?php echo $data['dep_ID'].'-' ;echo $data['dep_name']?></option>
                    <?php } ?>
                </select>

                <div class="form-group">
                    <label>Update Department Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <input type="submit" class="btn btn-info" name="update" value="Update">
            </div>
    </form>


</body>

</html>
<?php

if(isset($_POST['update'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $newDep=$_POST['name'];
        $newDep = preg_replace("/[^a-zA-Z0-9\s]/", "", $newDep);
        $newDep=strtoupper($newDep);
        $shit = $_POST['departname'];
  
        
    }
else{
alert("Invaled department name");
}  
$query123 = "SELECT * FROM department WHERE `dep_ID`='$shit'" ;

$result123 = mysqli_query($conn, $query123);

$row123 =mysqli_fetch_array($result123);

$old=$row123['dep_name'];

echo$old;

$query12 = "SELECT * FROM department ";       
$result12 = mysqli_query($conn, $query12);
$row = mysqli_num_rows($result12);
if($row ==1){
alert("Department already exists");
}
else{
    $qu13 = "UPDATE `department` SET `dep_name`='$newDep' WHERE `dep_ID` ='$shit'";
    $qu15 = "UPDATE `employee` SET `department`='$newDep' WHERE `department`='$old'";
    $result13 = mysqli_query($conn, $qu13);
    $result15 = mysqli_query($conn, $qu15);
    if($result13 ){

    alert("Department updated successfully  13");
    
}
else
{
    alert("error13");
}
 if($result15){
    alert("Department updated successfully  15");
}
else{
    alert("error15");
}

}
    
}
}
else{
    header('location:employeeHome.php');
}

?>