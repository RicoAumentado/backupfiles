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

    <title>DISPLAY</title>
</head>

<body>

    <div class="container my-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Frameworks</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';
                $sqli = "SELECT * FROM `seriescrud`";
                $result = mysqli_query($conn, $sqli);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $email = $row['email'];
                    $mobileNumber = $row['mobileNumber'];
                    $datas = $row['multipleData'];

                    // Convert stored data into an array for better display formatting
                    $frameworks = explode(", ", $datas);
                    $frameworkList = implode("<br>", $frameworks); // Display each framework on a new line

                    echo "<tr>
                        <td>{$id}</td>
                        <td>{$firstName}</td>
                        <td>{$lastName}</td>
                        <td>{$email}</td>
                        <td>{$mobileNumber}</td>
                        <td>{$frameworkList}</td>
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalTitle">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a id="deleteConfirmBtn" href="#" class="btn btn-danger">Confirm Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap & jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script>
        function confirmDelete(id) {
            // Set the delete button link dynamically
            document.getElementById("deleteConfirmBtn").href = "delete.php?deleteid=" + id;
            // Open the modal
            $('#deleteConfirmModal').modal('show');
        }
    </script>
</body>

</html>
