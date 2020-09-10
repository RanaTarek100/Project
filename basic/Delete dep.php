<?php
include 'connect to database.php';
include 'employeeHome.php';

    //insert the department name into the database
if(isset($_SESSION['userPassword']) && $rows['department']=="ADMIN"){

?>
<html>

<head>
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
                                <option name = "DepID" value="<?php echo $data['dep_ID']?>">
                                    <?php echo $data['dep_ID'].'-' ;echo $data['dep_name']?></option>
                                <?php } ?>
                                </select>
                                <br>
                                <br>
                                <br>

            <input type="submit" class="btn btn-danger" name="delete" value="Delete">
        </div>
    </form>

    
</body>

</html>
<?php

if(isset($_POST['delete'])){
        $dep_id= $_POST['departname'];
        //$query = "DELETE FROM department WHERE dep_ID = $dep_id";
        $query2 = "DELETE FROM department WHERE dep_ID = '$dep_id'";
        $result2 = mysqli_query($conn, $query2);
    if ($result2)
        alert("Deleted");
    }
}

?>