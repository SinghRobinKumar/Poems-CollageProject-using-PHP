<?php session_start() ?>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CKEDITOR  -->
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

    <style>
    .navbar-brand {
        font-size: 1.8rem;
    }

    .blog {
        margin-top: 5vh !important;

    }
    </style>

</head>

<body>
    <!-- NAVIGATION -->
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


    <!-- SECTION : ADD BLOG  -->
    <section class="addBlog Add_comment" id="addBlog">
        <div class="blog">
            <div class="container headings text-center">
                <h1 class="text-center font-weight-bold">Add Poem</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 offset-1">
                        <form action="newpost-register.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="image">Thumbnail</label>
                                <br>
                                <input type="file" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" id="author" class="form-control" placeholder="Author">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="ckeditor" cols="80" id="description" name="description"
                                    rows="10"></textarea>
                            </div>
                            <br>


                            <label style="text-decoration: underline;">Social Media Accounts</label>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control"
                                    placeholder="Enter LinkedIn ID">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Twitter</label>
                                <input type="text" name="twitter" id="twitter" class="form-control"
                                    placeholder="Enter Twitter ID">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control"
                                    placeholder="Enter Facebook ID">
                            </div>
                            <div class="form-group d-flex justify-content-center form-button">
                                <button type="submit" class="btn " style="background:white">Post Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    // CK EDITOR
    CKEDITOR.replace('description');
    </script>

</body>

</html>