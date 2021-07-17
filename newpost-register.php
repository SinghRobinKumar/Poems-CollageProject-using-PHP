<?php
include_once("connection.php");

$title = $des = $img = $author = $facebookAC = $twitterAC = $linkedInAC = "";
$author = $_POST["author"];
$title = $_POST["title"];
$des = $_POST["description"];
$facebookAC = $_POST["facebook"];
$twitterAC = $_POST["twitter"];
$linkedInAC = $_POST["linkedin"];


$target_dir = "Images/";
$basename = basename($_FILES["image"]["name"]);
$file_type = strtolower(pathinfo($basename, PATHINFO_EXTENSION));
$image = uniqid($prefix = "IMG_");
$img = $target_dir . $image . "." . $file_type;
if (!move_uploaded_file(($_FILES["image"]["tmp_name"]), $img)) {
    $img = "";
}

if ($title == "" || $des == "" || $img == "" || $author == "" || $facebookAC == "" || $twitterAC == "" || $linkedInAC == "") {
    echo "Data not inputed.";
}


$query = $connection->prepare("INSERT INTO `Posts`(`Image`, `Author`, `Title`, `Description`, `FacebookAC`, `TwitterAC`, `LinkedInAC`,`Date`,`Time`) VALUES (?,?,?,?,?,?,?,NOW(),NOW())");
$query->bind_param("sssssss", $img, $author, $title, $des, $facebookAC, $twitterAC, $linkedInAC,);

// $query->execute();
if ($query->execute()) {
    header("Location: index.php");
}
$query->close();
$connection->close();