<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm'])) {
    header("Location: ../home.php");
    exit;
}

//if (isset($_SESSION['user']) != "") {
//    header("Location: ../home.php");
//    exit;
//}
//
//if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
//    header("Location: ../index.php");
//    exit;
//}

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='../pictures/".$row['picture']."'</td>
            <td>" .$row['animal_name']."</td>
            <td>" .$row['breed']."</td>
            <td>" .$row['come_from']."</td>
            <td>" .$row['available']."</td>
            <td><a href='update.php?id=" . $row['animal_id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='../delete.php?id=" . $row['animal_id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="../css/style.css">
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light lit" style="padding-inline:4rem;">
      <div class="container-fluid">
          <a class="navbar-brand" href="../home.php">
            <img src="https://i0.wp.com/ebsalter.com/wp-content/uploads/revslider/slide-3/lion.png?ssl=1" alt="" width="40" height="40" class="d-inline-block align-text-top">
          
          </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">hf</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout">Sign Out</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <a href="create.php"><button class='btn btn-primary' type="button">Add product</button></a>
            <a href="../dashboard.php"><button class='btn btn-success' type="button">Dashboard</button></a>
        </div>
      
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>From</th>
                    <th>Availabile</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>
</html>