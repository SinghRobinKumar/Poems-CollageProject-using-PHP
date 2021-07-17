<?php
   $serverName="localhost";
   $dbuser="root";
   $dbpass="toor";
   $dbname="test";
   $connection = new mysqli($serverName,$dbuser,$dbpass,$dbname);
   // $connection=mysqli_connect($serverName,$dbuser,$dbpass,$dbname);
   // if(mysqli_connect_error()){
   //    die("Could not connect to the server: ".mysqli_connect_error());
   // }
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }