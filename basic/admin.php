<?php
session_start();
$conn=mysqli_connect('localhost','root','','proj1');
if(!isset($_SESSION['userName']))
{
?>

<!doctype html>
<html lang="en">

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body class="bg-dark">
    <form action="admin.php" method="post">
        <div class="container">
            <nav class="navbar mb-5 navbar text-light bg-dark d-flex justify-content-center">
                <p class="display-4  ">Admin</p>
              </nav>
            <div class="form-group">
                <label for="exampleFormControlInput1">Admin Name</label>
                <input type="text" aria-label="userName" name="userName" id="exampleFormControlInput1"
                    class="form-control mb-4  " placeholder="Please enter your name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text text-light bg-dark" id="basic-addon1">ID</span>
                </div>
                <input type="number" class="form-control  " aria-label="ID" aria-describedby="basic-addon1" name="userID"
                    placeholder="Please enter your ID" required>
            </div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                    <span class="input-group-text text-light bg-dark" id="basic-addon1">Password</span>
                </div>
                <input type="password" class="form-control  " aria-label="ID" aria-describedby="basic-addon1" name="userPassword"
                    placeholder="Please enter your Password" required>
            </div>
            <input class="btn btn-dark btn-md mt-4 btn-block " name="reg" type="submit" value="Log In"
                name="reg">
            <input class="btn btn-dark btn-md   btn-block invisible" id="hide">
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

if(isset($_POST['reg'])){
  if(isset($_POST['userName']) && !empty($_POST['userName'])){
$userName=$_POST['userName'];
$userName = preg_replace("/[^a-zA-Z0-9\s]/", "", $userName);

}else{
  
  alert("please enter your Name");  
  
}
if(isset($_POST['userPassword']) && !empty($_POST['userPassword'])){
  $userPassword=$_POST['userPassword'];
}else{
  
  alert("please enter your Password");  
  
}
if(isset($_POST['userID']) && !empty($_POST['userID'])){
  $userID=$_POST['userID'];
}else{
  
  alert("please enter your id");  
}
$query = "SELECT* FROM `employee` WHERE `name` = '$userName' and `pass` = '$userPassword' and `id`='$userID' ";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);
if($row == 1){
  $_SESSION['userName'] =$userName;
  $_SESSION['userPassword']=$userPassword;
  $_SESSION['userID'] =$userID;      
  header('location:employeeHome.php');
      
}else{
  alert("Wrong Username or Password");
}


}
}
else{
  header('location:employeeHome.php');
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>