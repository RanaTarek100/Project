<?php
include 'connect to database.php';
include 'employeeHome.php';


//insert the department name into the database

if(isset($_SESSION['userPassword']) && $rows['department']=="ADMIN"){
$hoho=$_SESSION['asd'];
$query123 = "SELECT * FROM `employee` WHERE `id`='$hoho'" ;
$result123 = mysqli_query($conn, $query123);
$rowOld =mysqli_fetch_array($result123);
$image12=$rowOld['image'];

?>



<html>
<form action="updateEmp.php" method="POST" >
<div class="container text-center mt-5">
    <div class="form-group">
        <label>Employee Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo$rowOld['name']; ?>" required>
    </div>
    <div class="form-group">
        <label>Employee Phone</label>
        <input type="tel" class="form-control" name="phone" value="<?php echo$rowOld['phone']; ?>" minlength="10" required>
    </div>
    <div class="form-group">
        <label>Employee's Age</label>
        <input type="number" class="form-control" name="age" value="<?php echo$rowOld['age']; ?>" required>
    </div>

    <div class="form-group">
        <label>Employee's Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo$rowOld['email']; ?>" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" id="Pass" name="pass" value="<?php echo$rowOld['pass']; ?>" required>
    </div>

    <div class="form-group">
        <label>salary</label>
        <input type="number" class="form-control" id="salary" name="salary" value="<?php echo$rowOld['salary']; ?>"
            required>
    </div>

        <div class="form-group">
            <label>Department[<?php echo $rowOld['department'];?>]</label>
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
                    <option value="<?php echo $data['dep_name']?>">
                        <?php echo $data['dep_ID'].'-' ;echo $data['dep_name']?></option>
                    <?php } ?>
                </select>

                <!-- ==================== -->

            </div>
        </div>



        <input type="submit" class="btn btn-info" name="update" value="submit">
    </div>
</div>
</div>
</form>
</html>
<?php


if(isset($_POST['update'])){
   
        $newEmp=$_POST['name'];
        $newEmp = preg_replace("/[^a-zA-Z0-9\s]/", "", $newEmp);
        $newEmp=strtoupper($newEmp);
        $Pass = $_POST['pass'];
        $Phone=$_POST['phone'];
        $Salary = $_POST['salary'];
        $eMail =$_POST['email'];
        $Age=$_POST['age'];
        $dep = $_POST['departname'];
            $qu13 = "UPDATE `employee` SET `name`='$newEmp' WHERE `id` ='$hoho'";
            $qu14 = "UPDATE `employee` SET `age`='$Age' WHERE `id` ='$hoho'";
            $qu15 = "UPDATE `employee` SET `phone`='$Phone' WHERE `id` ='$hoho'";
            $qu16 = "UPDATE `employee` SET `pass`='$Pass' WHERE `id` ='$hoho'";
            $qu17 = "UPDATE `employee` SET `salary`='$Salary' WHERE `id` ='$hoho'";
            $qu18 = "UPDATE `employee` SET `email`='$eMail' WHERE `id` ='$hoho'";
            $qu18 = "UPDATE `employee` SET `department`='$dep' WHERE `id` ='$hoho'";
            $result13 = mysqli_query($conn, $qu13);
            $result14 = mysqli_query($conn, $qu14);
            $result15 = mysqli_query($conn, $qu15);
            $result16 = mysqli_query($conn, $qu16);
            $result17 = mysqli_query($conn, $qu17);
            $result18 = mysqli_query($conn, $qu18);
            $result18 = mysqli_query($conn, $qu19);
            if($result13 || $result14 || $result15 || $result16 || $result17 || $result18 || $result19 ){
        
            alert("Employee updated successfully  ");
            
        }
        else
        {
            alert("error");
        }            
        



    
        }


}else{
    header('location:employeeHome.php');
}

// "<?php echo$old; 
?>
