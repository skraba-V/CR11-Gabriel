<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
session_start();
require_once "./components/db_connect.php";

$id = $_SESSION["user"];
$hel = $_GET["id"];
$sql1 = "SELECT * FROM animals WHERE animal_id = $hel";
$sql2 = "INSERT INTO adoption ( fk_animal_id, fk_user_id, adoption_date) VALUES ( $hel, {$id}, CURDATE())";
$sql3 = "UPDATE animals SET available = available - 1 WHERE animal_id = {$hel}";
$res1 = mysqli_query($connect, $sql1);
$res2 = mysqli_query($connect, $sql2);
$res3 = mysqli_query($connect, $sql3);
$data = mysqli_fetch_all($res1, MYSQLI_ASSOC);
$result = mysqli_query($connect, $sql1);



$tbody="";

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){ 
        $tbody .= " 
        
        <div class='row text-center justify-content-center'>
            <div class='nsl'></div>
            <div class='col-12 nsl'>
                <h1 class='dit'>
                
                  ".$row['animal_name']."
                </h1>
                <div class='dimgbox'>
                    <img class='ditimg' src='./pictures/".$row['picture']."'>
      
                </div>
            </div>
            <div class='col-12 nsl'>
              <h1>Breed: ".$row['breed']." </a>
              </h1>
                
            </div>  
            
            
        </div>";
    };
}else {
    $tbody="
       <tr>
         <td> colspan='5' class='text-center'>Not Data </td>
        </tr> 
    ";

}




mysqli_close($connect);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Jungle</title>
</head>
<body class="bbc">
    
  <?php require_once './components/navigation.php' ?>
  
  

    
  <div id="items">

    <div class="row text-center dit justify-content-center">
      <div class="col-12">
        <h3 class="heading text-center">Congratulations, now you own</h3>
      </div>
      
      <div class="col-12 row">
         <?php echo $tbody; ?>
      </div>
      
      

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>