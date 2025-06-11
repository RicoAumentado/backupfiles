<?php

use Dom\Mysql;

include 'connect.php';
$id = $_GET['updateid'];
$sqli = "select * from `seriescrud` where id = $id";
$result = mysqli_query($conn, $sqli);
$row = mysqli_fetch_assoc($result);

$firstName = $row['firstName'];
$lastName = $row['lastName'];
$email = $row['email'];
$datas =  $row['multipleData'];
$mobileNumber = $row['mobileNumber'];
if (isset($_POST['update'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
    $datas = isset($_POST['data']) ? implode(", ", $_POST['data']) : ""; // Ensure checkboxes are stored correctly

    $sql = "UPDATE `seriescrud` SET firstName = '$firstName', 
            lastName = '$lastName', email = '$email', 
            mobileNumber = '$mobileNumber', multipleData = '$datas' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: read.php");
    } else {
        die("Error: " . mysqli_error($conn));
    }
}



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Update</title>
</head>

<body>
    <div class="container my-2">
        <form method="post">

            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" autocomplete="off" name="firstName" value="<?php echo $firstName; ?>">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" autocomplete="off" name="lastName" value="<?php echo $lastName; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" autocomplete="off" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" class="form-control" autocomplete="off" name="mobileNumber" value="<?php echo $mobileNumber; ?>">
            </div>
            <div>
                <input type="checkbox" name="data[]" value="React" <?php echo (strpos($datas, 'React') !== false) ? 'checked' : ''; ?>> React
                <input type="checkbox" name="data[]" value="Hono Framework" <?php echo (strpos($datas, 'Hono Framework') !== false) ? 'checked' : ''; ?>> Hono Framework
                <input type="checkbox" name="data[]" value="Laravel" <?php echo (strpos($datas, 'Laravel') !== false) ? 'checked' : ''; ?>> Laravel
            </div>



            <button type="submit" class="btn btn-dark my-3" name="update">Update</button>


        </form>
    </div>


</body>

</html>