<?php
include_once("connection.php");
$id = $_GET["id"];

$query = $connection->prepare("select * from Posts where id=?");
$query->bind_param("i", $id);
$query->execute();

$selectQuery = $query->get_result();
$result = $selectQuery->fetch_assoc();
$id = $result["ID"];
$img = $result["Image"];
$title = $result["Title"];
$des = $result["Description"];
$author = $result["Author"];
$date = $result["Date"];
$time = $result["Time"];
$views = $result["Views"];

$d = explode("-", $date);
echo $d[0] . $d[1], $d[2];

//Views
$views = $views + 1;
$query1 = $connection->prepare("UPDATE `Posts` SET `Views`=? WHERE ID=?;");
$query1->bind_param("ii", $views, $id);
$query1->execute();
$query1->close();



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/poems.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <li class="nav-item">
        <a class="nav-link" href="login.html">Login</a>
    </li>
    <!-- FONTS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Yanone+Kaffeesatz:wght@600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

    <style>
    .navbar-brand {
        font-size: 1.8rem;
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-black logo" href="#">Poetry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link active" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="poems.php">Poems</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addBlog.php">Add Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comments.php">Comments</a>
                    </li>
                    <?php
                    if (!$_SESSION["loggedin"] == true) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php }
                    ?>


                    <li class="nav-item">
                        <?php
                        if ($_SESSION["loggedin"] == true) {

                        ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["email"]; ?>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="session_destroy.php">Logout</a>
                            </div>
                            <?php }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <style>
    .poem h5 {
        color: white;
    }

    .poem .description p {

        font-size: 1.2rem;
        font-family: "Arial";
        color: red;
        border-color: red 10px solid;

    }

    body {
        background: #4F5052;
        color: white !important;

    }

    .description {
        margin-top: 10vh;
        margin-bottom: 10vh;

        color: black;
    }

    h5 {
        font-size: 1rem;
    }
    </style>



    <!-- SECTION:POEM  -->
    <section class="poem" style="margin-top: 15vh;">
        <div class="container">
            <h1 class="text-center">
                <?php echo $title; ?>
            </h1>
            <h5 class="text-center">Posted by: <?php echo $author; ?></h5>
            <h5 class="text-center" style="margin-bottom: 10vh;">Posted On:
                <?php echo $d[2] . "-" . $d[1] . "-" . $d[0] ?></h5>
            <img src="<?php echo $img ?>" class="img-fluid rounded mx-auto d-block" alt="">

            <div class="description text-center">
                <font color=red>

                    <?php echo $des ?>

                </font>



            </div>
    </section>


    <style>
    .team {
        color: gold
    }

    .team:hover {
        background: gold;
        color: white;
    }
    </style>

    <!-- **************** footer starts****************** -->

    <footer class="footersection" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 footer-div" align="center">
                    <div>
                        <div>
                            <h3>NAVIGATION LINKS</h3>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="poems.php">Poems</a>
                            </li>
                            <li>
                                <a href="login.php">Login</a>
                            </li>
                            <li>
                                <a href="register.php">Signup</a>
                            </li>
                            <li>
                                <a href="comments.php">Comments</a>
                            </li>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12 footer-div mt-3 " align="center"
            style="background: #0684c2;padding:15px">
            <div class="footer-bottom justify-content-around">
                <p>Copyright &copy; 2020 Poetry.com.</p>
                <p>All rights reserved.</p>
                <p>Designed by<span style="font-weight:700;font-size:20px" class="team"> Golden Project</span>
            </div>
            <div class="srcolltop float-right">
                <a href="addBlog.php" id="action-btn"> <i class="fa fa-plus fa-4x" style="color:black" id="myBtn"></i>
                </a>

            </div>
        </div>



    </footer>

    <!-- ****************footer ends****************** -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    </script>

</body>


</html>