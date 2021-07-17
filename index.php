<?php
include_once("connection.php");
$query = $connection->prepare("select * from Posts order by Views DESC limit 6");
$query->execute();
$getResults = $query->get_result();

session_start()
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poems</title>
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



</head>


<!-- STYLE  -->
<style>
.navbar-brand {
    font-size: 1.8rem;
}

.active {
    color: white !important;
}
</style>

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




    <section class="section-background">
        <header class="page-header">
            <div class="container pt-3">
                <div class="row align-items-center justify-content-center" align="center">
                    <div class="col-md-7 align-middle">
                        <h1 class="font-weight-bold">Poetry</h1>
                        <p>Poetry is a literature that evokes a concentrated imaginative awareness of experience or a
                            specific emotional response through language chosen and arranged for its meaning, sound, and
                            rhythm..</p>
                        <style>
                        .team {
                            color: gold
                        }

                        .team:hover {
                            background: gold;
                            color: white;
                        }
                        </style>
                        <p>- By <span style="font-weight:700" class="team">Golden Project</span> </p>

                        <br>
                        <a href="https://poetryarchive.org" class="btn btn-primary btn-lg active" role="button"
                            aria-pressed="true">Learn
                            More</a>
                        <br>
                    </div>
                </div>
            </div>
        </header>
    </section>

    <!-- STYLE -->
    <style>
    .card-title {
        font-size: 1rem;
    }

    .Poems h1 {
        margin-top: 5vh;
        margin-bottom: 5vh;
    }
    </style>

    <!-- SECTION: NEW POEMS  -->
    <section class="Poems mt-5" id="Poems">
        <div class="container headings text-center">
            <h1 class="text-center font-weight-bold">Trending Poems</h1>

            <div class="row">


                <?php
                while ($result = $getResults->fetch_assoc()) {
                    $id = $result["ID"];
                    $img = $result["Image"];
                    $title = $result["Title"];
                    $des = $result["Description"];
                    $author = $result["Author"];
                    $date = $result["Date"];
                    $time = $result["Time"]; ?>

                <div class="col-lg-4 col-md-6 col-12">
                    <a href="index.php" style="color: white;text-decoration:none">
                        <div class="box" style="margin-bottom:20px;">

                            <a href="Poem.php?id=<?php echo $id; ?>" class="color: white;text-decoration:none"><img
                                    src="<?php echo $img ?>" class="img-fluidi img-thumbnail" alt=""></a>

                            <a href="Poem.php?id=<?php echo $id; ?>" style="color: white;text-decoration:none">
                                <p class=" m-4">
                                    <?php
                                        echo $title; ?>
                                </p>
                            </a>
                            <a href="Poem.php?id=<?php echo $id; ?>" style="color: white;text-decoration:none">
                                <div class="card-body">
                                    <h5 class="card-title">By:
                                        <?php echo $author
                                            ?></h5>
                                    <h5 class="card-title">Posted On:
                                        <?php echo $date; ?></h5>
                                </div>
                            </a>
                        </div>
                    </a>
                </div>



                <?php
                }
                $query->close();
                ?>
            </div>
    </section><br>


    <!-- STYLE  -->
    <style>
    .Add_comment h1 {
        margin-bottom: 5vh;
    }

    form div {
        margin-bottom: 2vh;
        margin-top: 2vh;
        padding: 5px;
    }
    </style>

    <section class="Add_comment" id="Add_comment">

        <div class="container headings text-center">
            <h1 class="text-center font-weight-bold">Add Comment</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 offset-1">
                    <form action="comment-verfication.php" method="POST">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" id="username"
                                name="username" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="4" id="comment" name="comment"
                                placeholder="Enter your comment"></textarea>
                        </div>

                        <div class="d-flex justify-content-center form-button">
                            <button type="submit" class="btn btn-primary">Post comment</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>





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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    </script>

</body>

</html>