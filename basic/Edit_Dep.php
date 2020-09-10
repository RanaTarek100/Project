<?php
include 'connect to database.php';
include 'employeeHome.php';

    //insert the department name into the database
if(isset($_SESSION['userPassword']) && $rows['department']=="ADMIN"){

?>
<html>

<head>
<style> 
#myDIV {

  visibility : hidden;
}
</style>
    
</head>
<body>
    <!-- It's just form to take the data of employee -->
    
    <form method="POST">
        <div class="container text-center mt-5">
        <label>Select Department</label>
        <div class="col-lg-12">
                        <?php
                        
                        $select="SELECT * from `department` ";
                        $sele=mysqli_query($conn , $select);

                        $select2 ='SELECT departname from `employee`' ;
                        $sele2=mysqli_query($conn,$select2);?>

                        <select name="departname" class="col-lg-12" selected>
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
            </div>
            <input name=  "Update"   class="btn btn-info"  readonly    onclick="myFunction()"   id = "UpdateButton" value="Update" > 
            <input type =  "submit"   class="btn btn-danger"       name="delete"            value="Delete">
            <br><br>
            <div id="myDIV">
            <input type="text"   class="form-control"    name="name" id="hide"><br>
            <input type="submit" class="btn btn-success" name="Save" value="Save">      <br><br><br>
            </div>
        </div>
    </form>
    <script>
        function myFunction(){
       
            var x = document.getElementById('myDIV');
  if (x.style.visibility === 'visible') {
    x.style.visibility = 'hidden';
  } else {
    x.style.visibility = 'visible';
  }
        }
</script>
</body>

</html>
<?php



if(isset($_POST['Save'])){
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


if(isset($_POST['delete'])){
    $dep_id= $_POST['departname'];
    $query2 = "DELETE FROM department WHERE dep_ID = '$dep_id'";
    $result2 = mysqli_query($conn, $query2);
if ($result2)
    alert("Deleted");
}

}else{
    header('location:employeeHome.php');
}


?>