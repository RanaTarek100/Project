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
            <div class="form-group">
                <label>Department Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button type="submit" class="btn btn-info" name="send" value="submit">send</button>
        </div>
    </form>

    
</body>

</html>
<?php

if(isset($_POST['send'])){
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $depName=$_POST['name'];
        $depName = preg_replace("/[^a-zA-Z0-9\s]/", "", $depName);
        $depName=strtoupper($depName);
       
    }
else{
alert("Invaled department name");
}         
$query12 = "SELECT * FROM department WHERE dep_name = '$depName'";
$result12 = mysqli_query($conn, $query12);
$row = mysqli_num_rows($result12);
if($row ==1){
alert("Department already exist");
}
else{
    $insert = "INSERT INTO department VALUES(NULL , '$depName' ) ";
    $q = mysqli_query($conn, $insert);
    alert("Department added successfully.");
}
     // if ($q) {
    //     echo "Successffully Inserted";
    // } else {
    //     echo "Failed!" . mysqli_error($conn);
    // }
}
}
else{
    header('location:employeeHome.php');
}

?>