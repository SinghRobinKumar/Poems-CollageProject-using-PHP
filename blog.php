<?php
include_once("connection.php");

// METHOD 1

// $result=mysqli_query($connection,$query);
// if(mysqli_num_rows($result)>0){
//    while($row = mysqli_fetch_assoc($result)){
//    }
// }

//GETING THE ID FROM THE URL
$id = $_GET["id"];

$query = $connection->prepare("select * from Posts where id=?");
$query->bind_param("i", $id);
$query->execute();
$selectQuery = $query->get_result();
$result = $selectQuery->fetch_assoc();

$img = $result["Image"];
$title = $result["Title"];
$des = $result["Description"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $title ?></title>
   <!-- STYLESHEET -->
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/materialize.min.css">
</head>

<body>
   <!-- Section:Blog  -->
   <section class="section section-blog">
      <div class="container">
         <div>
            <h4><?php echo $title ?></h4>
         </div>
         <div>
            <img src="<?php echo $img ?>" alt="" class="responsive-img" />
         </div>
         <div>
            <p>
               <?php echo $des ?>
            </p>
         </div>
      </div>

   </section>
</body>

</html>