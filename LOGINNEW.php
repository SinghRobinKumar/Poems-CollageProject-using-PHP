<?php
include_once("connection.php");

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }



    if (empty($username_err) && empty($password_err)) {



        $inputName = trim($_POST["user"]);
        $query = $connection->prepare("select * from Users where Name=?");
        $query->bind_param("s", $inputName);
        $query->execute();
        $preresults = $query->get_result();
        if ($result = $preresults->fetch_assoc()) {
            $name = $result["Name"];
            $pass = $result["Password"];

            echo $name;
            echo $pass;

            // if ($username == $name) {
            //     // if (password_verify($password, $hashed_password)) {
            //     if ($pass == $password) {
            //         session_start();
            //         $_SESSION["loggedin"] = true;
            //         $_SESSION["user"] = $username;
            //         header("location: WELCOME.php");
            //     } else {
            //         $password_err = "Password Incorrect";
            //     }
            // } else {
            //     $username_err = "No Account with this username found";
            // }
        }


        // $pass = $result["password"];

        // if ($inputName != $name) {
        //     $username_err = "Wrong Username";
        // }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="username"><br>
        <label for=""><?php echo $username_err . $name
                            . $pass; ?></label><br>
        <input type="text" name="password" placeholder="password"><br>
        <label for=""><?php echo $password_err ?></label><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>