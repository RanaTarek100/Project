<?php
include 'connect to database.php';
include 'employeeHome.php';

if(isset($_SESSION['userPassword'])&& $rows['department']=="ADMIN"){
    

?>

<html>

<head>
   
</head>


<body>
    <!-- It's just form to take the data of employee -->

    <div class="container col col-md-6 text center">
        <form method="POST" action="insert emp.php" enctype='multipart/form-data' >
            <div class="container text-center mt-5">
                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label>Employee Phone</label>
                    <input type="tel" class="form-control" name="phone" minlength="10" required minlength="10">
                </div>
                <div class="form-group">
                    <label>Employee's Age</label>
                    <input type="number" class="form-control" name="age" required>
                </div>
               
                <div class="form-group">
                    <label>Employee's Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="Pass" name="pass" required>
                </div>

                <div class="form-group">
                    <label>salary</label>
                    <input type="number" class="form-control" id="salary" name="salary" required>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="file" accept="image/*" class="form-control" id="image">
                </div>


                <div class="form-group">
                    <label>Department</label>
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



                <button type="submit" class="btn btn-info" name="send" value="submit">send</button>
            </div>
        </form>
    </div>





    <?php

    //insert the data of the employees to the database
    if (isset($_POST['send'])) {
        
        $Name = $_POST['name'];
        $Pass = $_POST['pass'];
        $Phone=$_POST['phone'];
        $Salary = $_POST['salary'];
        $eMail =$_POST['email'];
        $Age=$_POST['age'];
        $dep = $_POST['departname'];
        
  $fileName = $_FILES['file']['name'];
  $target_dir = "C:/xampp/htdocs/project/basic/local/";
  $target_file = $target_dir .'/'. basename($_FILES['file']['name']);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  }
  
        
         $query12 = "SELECT * FROM employee WHERE phone = '$Phone'";
$result12 = mysqli_query($conn, $query12);
$row = mysqli_num_rows($result12);
if($row ==1){
alert("Employee already exist");
}else{
        $qry = "SELECT * FROM department";
         if ($qry) {
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$fileName)){
            $Insert = "INSERT INTO employee VALUES (NULL,'$Name','$Pass','$Phone','".$fileName."','$Salary','$eMail','$Age' ,'$dep','".$image."')";
            }
            $Q = mysqli_query($conn, $Insert);
            if ($Q) {
                alert( "New record created successfully !");
            } else {
                alert( "Error" ) . mysqli_error($conn);
            }
            mysqli_close($conn);
       } else {
        echo " NOOO";
       }
      }  
    }
}else{
    header('location:employeeHome.php');
}
    ?>

</body>

</html>