<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $datas = $_POST['data'];
    $allData = implode(", ",$datas);
    

    $sql = "insert into `multipledata` (checkBoxData)
    values ('$allData')";
    
    $result = mysqli_query($conn,$sql);

    if($result){
        echo "inserted successfully";
    }else{
        die(mysqli_error($conn));
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

    <title>CheckBox</title>
</head>

<body>
    <div class="container my-3">
        <form method ="post">
            <div class="input-group-text my-3">
                <input type="checkbox" aria-label="Checkbox for following text input" name="data[]"
                value="React">React
            </div>
            <div class="input-group-text my-3">
                <input type="checkbox" aria-label="Checkbox for following text input" name="data[]" 
                value="Hono Framework">Hono Framework
            </div>
            <div class="input-group-text my-3">
                <input type="checkbox" aria-label="Checkbox for following text input" name="data[]"
                value="Laravel">Laravel
            </div>
            <button class="btn btn-dark my-1" name="submit" type="submit">Submit</button>

        </form>
    </div>

</body>

</html>