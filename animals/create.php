<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm'])) {
    header("Location: ../home.php");
    exit;
}
 
require_once '../components/db_connect.php';

//if (isset($_SESSION['user']) != "") {
//    header("Location: ../home.php");
//    exit;
//}
//
//if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
//    header("Location: ../index.php");
//    exit;
//}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>PHP CRUD | Add Product</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Product</legend>
        <form action="a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Animal Name</th>
                    <td><input class='form-control' type="text" name="animal_name" placeholder="Name" /></td>
                </tr>
                <tr>
                    <th>Come from</th>
                    <td><input class='form-control' type="text" name="come_from" placeholder="Come From" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>
		 	           <select id="inputState" class="form-control" name="size">
		 		        <option value="big">Big</option>
		 		        <option value="medium">Medium</option>
		 		        <option value="small">Small</option> 
		 	           </select>
                    </td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed"  placeholder="Breed" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age"  placeholder="Age" /></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><input class='form-control' type="file" name="picture"  placeholder="Photo" /></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class='form-control' type="text" name="address"  placeholder="Address" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description"  placeholder="Description" /></td>
                </tr>
                <tr>
                    <th>Availabile</th>
                    <td><input class='form-control' type="number" name="available"  placeholder="Available" /></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                    <td><a href="../home.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>


