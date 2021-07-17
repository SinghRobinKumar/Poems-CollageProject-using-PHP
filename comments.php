<?php
include_once("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/poems.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
    .media-comment {
        margin-top: 5vh;
        margin-bottom: 5vh;
    }

    body {
        margin-top: 20px;
        background: #eee;
    }

    @media (min-width: 0) {
        .g-mr-15 {
            margin-right: 1.07143rem !important;
        }
    }

    @media (min-width: 0) {
        .g-mt-3 {
            margin-top: 0.21429rem !important;
        }
    }

    .g-height-50 {
        height: 50px;
    }

    .g-width-50 {
        width: 50px !important;
    }

    @media (min-width: 0) {
        .g-pa-30 {
            padding: 2.14286rem !important;
        }
    }

    .g-bg-secondary {
        background-color: #fafafa !important;
    }

    .navbar-brand {
        font-size: 1.8rem;
    }

    .comment {
        margin-top: 15vh;
    }

    .navbar-brand {
        font-size: 1.8rem;
    }

    .team {
        color: gold
    }

    .team:hover {
        background: gold;
        color: white;
    }
    </style>

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-black logo" href="#">Poetry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
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



    <!-- COMMENTS  -->
    <div class="container comment">
        <h1 style="margin-top: 4vh;">
            Comments
        </h1>
    </div>

    <?php
    $queryComment = $connection->prepare("select * from Comments order by ID DESC");
    $queryComment->execute();
    $re = $queryComment->get_result();


    while ($result = $re->fetch_assoc()) {
        $Cname = $result["Name"];
        $comment = $result["Comment"]; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="media g-mb-30 media-comment">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                        src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png"
                        alt="Image Description">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <div class="g-mb-15">
                            <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php echo $Cname ?></h5>
                            <span class="g-color-gray-dark-v4 g-font-size-12">5 days ago</span>
                        </div>

                        <font><?php echo $comment ?></font>

                        <ul class="list-inline d-sm-flex my-0">
                            <li class="list-inline-item ml-auto">
                                <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#Add_comment">
                                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                    Reply
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
    } ?>
    </div>


    <!-- **************** footer starts****************** -->

    <footer class="footersection" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 footer-div" align="center">
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
        <div class="col-lg-12 col-md-12 col-12 footer-div mt-3 " align="center"
            style="background: #0684c2;padding:15px">
            <div class="footer-bottom justify-content-around">
                <p>Copyright &copy; 2020 Poetry.com.</p>
                <p>All rights reserved.</p>
                <p>Designed by<span style="font-weight:700;font-size:20px" class="team"> Golden Project</span>
                </p>
            </div>
            <div class="srcolltop float-right">
                <a href="addBlog.php" id="action-btn"> <i class="fa fa-plus fa-4x" style="color:black" id="myBtn"></i>
                </a>

            </div>
        </div>



    </footer>

    <!-- ****************footer ends****************** -->
</body>

</html>