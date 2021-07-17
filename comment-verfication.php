<?php
include_once("connection.php");
session_start();
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$comment = $_POST["comment"];

echo $name;
echo $email;
echo $comment;


$query = $connection->prepare("insert into Comments(Name,Email,Comment,DateTime) VALUES (?,?,?,NOW())");
$query->bind_param("sss", $name, $email, $comment);
if ($query->execute()) {
    header("Location:index.php");
} else {
    echo "Data Input Error";
}