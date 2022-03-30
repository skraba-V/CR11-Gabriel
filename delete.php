<?php 
require_once './components/db_connect.php';
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
session_start();

require_once './components/db_connect.php';

if (!isset($_SESSION['adm'])) {
    header("Location: home.php");
    exit;
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE animal_id = {$id}" ;
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $aname = $data['animal_name'];
        $from = $data['come_from'];
        $photo = $data['picture'];
        $size = $data['size'];
        $breed = $data['breed'];
        $age = $data['age'];
        $address = $data['address'];
        $description = $data['description'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Product</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    </head>
    <body>
    
        <fieldset>
            <div class="row text-center justify-content-center">
                <div class="nsl"></div>
                <div class="col-12 nsl">
                    <h3>Delete request</h3>
                </div>
                <div class="col-6 nsl">
                    <div class="dimgbox">
                        <img class="dimg" src='./pictures/<?php echo $photo ?>' alt="<?php echo $aname ?>">
                    </div>
                </div>
                <h4 class="text-danger nsl"><?php echo $aname?></h4>
                <h6>Do you really want to delete this product?</h6>
                <div class="col-12">
                    <form action ="./a_delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <input type="hidden" name="picture" value="<?php echo $photo ?>" />
                        <button class="button button2" type="submit">Yes, delete it!</button>
                        <a href="home.php"><button class="button" type="button">No, go back!</button></a>
                    </form>

                </div>
            </div>

        </fieldset>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>
