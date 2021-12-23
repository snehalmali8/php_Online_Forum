<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss</title>
    <style>
        .media {
            display: flex;
            font-size: 16px;
        }

        .media img {
            width: 64px;
            height: 64px;
        }

        .media h5 {
            font-size: 1rem;
        }

        .jumbotron {
            background: rgb(183, 240, 221);
            padding: 10px;
            border-radius: 6px;
        }

        .jumbotron h3 {
            font-size: 50px;
        }

        .jumbotron p {
            font-size: 15px;
        }

        .jumbotron .lead a {
            font-size: 18px;
        }
    </style>
</head>

<body>

    <?php include '_header.php'; ?>
    <?php include '_dbconnect.php';


    $sql = "SELECT * FROM `category` ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['category_id'];
        $cat_name = $row['category_name'];
        $cat_desc = $row['category_discription'];
    }
    ?>
    <?php

    $showAlert = false;
    $method = $_SERVER["REQUEST_METHOD"];
    // echo var_dump($method);
    if ($method == "POST") {
        // $thread_id = $_POST['thread_id'];
        $thread_title = $_POST['thread_title'];
        $thread_desc = $_POST['thread_desc'];
        // $id = $_POST['thread_cat_id'];
        $sql = "INSERT INTO `idiscuss` . `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `date`) VALUES ('$thread_title', '$thread_desc', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        } else {
            $shoError = "Ooops! Something Went's Wrong :(";
        }
    }
    ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Query Submitted Succssfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>


    <div class="container my-4" style="width: 60%;">
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `category` WHERE `category_id`='$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cat_name = $row['category_name'];
            $cat_desc = $row['category_discription'];
        }
        ?>
        <div class="jumbotron">
            <h3 class="display-4">Welcome to <?php echo $cat_name; ?> Forum</h3>
            <p class="lead"><?php echo $cat_desc; ?>.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
            <p style="font-weight: bold;">Posted by : Harry</p>
            </p>
        </div>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<div class="container my-3">
            <h3>Start a Discussion :</h3>
            <form action="/Online_Forum/threadsList.php" method="post">
                <div class="form-group">
                    <label for="thread_title">Problem Title</label>
                    <input type="text" class="form-control" id="thread_title" name="thread_title"
                        aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                        possible</small>
                </div>
                
                <div class="form-group">
                    <label for="thread_desc">Ellaborate Your Concern</label>
                    <textarea class="form-control" id="thread_desc" name="thread_desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success my-2">Submit</button>
            </form>

        </div>';
        } else {
            echo '<div class="container">
            <h1 class="py-2">Start a Discussion</h1> 
            <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
            </div>';
        }
        ?>


        <h2 class="py-2 my-4">Browse Quetions:</h2>
        <?php
        $sql = "SELECT * FROM `threads`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            // echo $row['category_id'];
            // echo $row['category_name'];

            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_title'];
            $thread_desc = $row['thread_desc'];
            $url = "thread.php?threadid=" . $thread_id;
            echo '<div class="media mb-4">
                    <img class="mr-3" src="user.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0"><a class="text-dark" href="' . $url . '">' . $thread_title . '</a></h5>
                            ' . $thread_desc . '
                    </div>
                </div>';
        }
        ?>











    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>