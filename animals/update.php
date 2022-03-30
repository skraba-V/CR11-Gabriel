<?php
session_start();
if (!isset($_SESSION['adm'])) {
    header("Location: ../home.php");
    exit;
}
 
require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE animal_id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $aname = $data['animal_name'];
        $from = $data['come_from'];
        $photo = $data['picture'];
        $size = $data['size'];
        $breed = $data['breed'];
        $age = $data['age'];
        $address = $data['address'];
        $description = $data['description'];
        $available = $data['available'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
   header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title> 
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     
        
    </head>
    <body class="bbc">
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
                <a class="nav-link" href="../logout.php?logout">Sign Out</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
        <div class="container dit">
            <div class="row text-center justify-content-center">
                <div class="nsl"></div>
                <div class="col-12 nsl">
                    <h3 class="dit">Update request</h3>
                </div>
                <div class="col-6 nsl">
                    <div class="dimgbox">
                        <img class="dimg" src='../pictures/<?php echo $photo ?>' alt="<?php echo $photo ?>">
                    </div>
                </div>

            </div>
        
        


        <fieldset>
            <form action="a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table text-light">
                    <tr>
                        <th>Animal Name</th>
                        <td><input class='form-control' type="text" name="animal_name" placeholder="Name" value="<?php echo $aname ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Come from</th>
                        <td><input class='form-control' type="text" name="come_from" placeholder="Come From" value="<?php echo $from ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><input class='form-control' type="text" name="size"  placeholder="Size" value="<?php echo $size ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name="breed"  placeholder="Breed" value="<?php echo $breed ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="number" name="age"  placeholder="Age" value="<?php echo $age ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><input class='form-control' type="file" name="picture"  placeholder="Photo" /></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class='form-control' type="text" name="address"  placeholder="Address" value="<?php echo $address ?>"  /></td>
                    </tr>
                    <tr>  
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="description"  placeholder="Description" value="<?php echo $description ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Available</th>
                        <td><input class='form-control' type="int" name="available"  placeholder="Available" value="<?php echo $available ?>"  /></td>
                    </tr>
                           
                            
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['animal_id'] ?>" /> <!-- ovo je iz sql-->
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "admin_home.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>



