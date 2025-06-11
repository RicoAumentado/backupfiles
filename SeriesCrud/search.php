<?php

use Dom\Mysql;

include 'connect.php';

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SEARCH</title>
</head>

<body>

    <div class="container my-5">
        <div class="text-right mb-3">
        <!-- Search Form -->
            <form class="form-inline" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                // Get search term
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                // Query to search across multiple columns
                $sqli = "SELECT * FROM `seriescrud` WHERE 
                        firstName LIKE '%$searchTerm%' OR 
                        lastName LIKE '%$searchTerm%' OR 
                        email LIKE '%$searchTerm%' OR 
                        mobileNumber LIKE '%$searchTerm%' OR 
                        multipleData LIKE '%$searchTerm%'";

                $result = mysqli_query($conn, $sqli);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $email = $row['email'];
                    $mobileNumber = $row['mobileNumber'];
                    $datas = $row['multipleData'];
                    
                    echo "<tr>
                        <td>{$id}</td>
                        <td>{$firstName}</td>
                        <td>{$lastName}</td>
                        <td>{$email}</td>
                        <td>{$mobileNumber}</td>
                        <td>{$datas}</td>
                        <td>
                            <a href='update.php?updateid=$id' class='btn btn-primary'>Edit</a>
                            <a href='delete.php?deleteid=$id' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
