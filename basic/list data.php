<?php
include 'connect to database.php';
include 'employeeHome.php';
if(isset($_SESSION['userPassword']) && $rows['department']=="HR"||$rows['department']=="ADMIN"){
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List data</title>
</head>
<body>
    <div class="container text center">
        <div class="col col-xl-12 text center">
            <div class="clo-md-6 mt-5">
                <caption ><b><i>List of all departments </i></b></caption>
            </div>
            <table class="table  col col-md-12">
                <thead class="thead-light">
                    <tr>
                    <th >#Department ID</th>
                    <th >department Name</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $read = "SELECT * FROM `department`";
                    $r = mysqli_query($conn , $read);

                    foreach($r as $data){ ?>
                        <tr>
                        <td> <?php echo $data['dep_ID'] ?> </td>
                        <td> <?php echo $data['dep_name'] ?> </td>
                        </tr>
                    <?php }
                ?>
                </tbody>
        </table>
        
        </div>



        <div class="row col col-md-12 text center mb-5">
            <div class="clo-md-6 text-center">
                <caption ><b><i>List of all employee </i></b></caption>
            </div>
            <table class="table mt-5 col col-md-12">
                    <thead class="thead-light">
                        <tr>
                        <th >#Employee ID</th>
                        <th >Employee Name</th>
                        <th >Employee Pass</th>
                        <th >Employee Salary</th>
                        <th >Employee Department</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $read = "SELECT * FROM `employee`";
                        $r = mysqli_query($conn , $read);

                        foreach($r as $data){ ?>
                            <tr>
                            <td> <?php echo $data['id'] ?> </td>
                            <td> <?php echo $data['name'] ?> </td>
                            <td> <?php echo $data['pass'] ?> </td>
                            <td> <?php echo $data['salary'] ?> </td>
                            <td> <?php echo $data['department'] ?> </td>
                            </tr>
                        <?php }
                    ?>
                    </tbody>
            </div>

<!-- ==================================count all employee======================================== -->

            <div class="row col col-md-12 text-center mb-5">
            <div class="clo-md-6  mt-5 text-center">
                <caption ><b><i>List number of all employee at each department </i></b></caption>
            </div>
            <table class="table  col col-md-12">
                    <thead class="thead-light">
                        <tr>
                        <th >Department Name</th>
                        <th >Number Of Employees</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $read = "SELECT dep_name, 
                        COUNT(*) AS 'No of Employees' 
                        FROM department
                        INNER JOIN employee
                        ON employee.department = department.dep_name 
                        GROUP BY dep_name 
                        ORDER BY dep_name;";
                        $r = mysqli_query($conn , $read);

                        foreach($r as $data2){?>
                            <tr>
                                <td> <?php echo $data2['dep_name'] ?>  </td>
                                <td> <?php echo $data2['No of Employees'] ?>  </td>
                                <td> <a href="readmore.php?readmore=<?php echo $data2['dep_name'];?>" target="_blank"  name="readmore" class="btn btn-info">readmore</a> </td>
                        
                        </tr>
                        

                        <?php 
                    } ?>

                    </tbody>
            </div>

<!-- ========================================================================== -->



    </div>
</body>
</html>
<?php
}

?>