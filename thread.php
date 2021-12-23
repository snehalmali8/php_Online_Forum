<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    <?php include '_header.php';?>
    <?php include '_dbconnect.php';
    $sql = "SELECT * FROM `threads` ";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['thread_id'];
        $thread_title = $row['thread_title'];
        $thread_desc = $row['thread_desc'];
    }
    ?>





    <?php
        $showAlert = false;
        $showError = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
            // include 'partials/_dbconnect.php';
            $comment_cont = $_POST['comment_cont'];
            // $id1 = $_POST['thread_id'];
            $sql = "INSERT INTO `comment` (`comment_cont`, `thread_id`, `comment_time`) VALUES ('$comment_cont', '$id', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showAlert = true;
            }
            $showError = "Oops something wents wrong :(";
        }
        ?>






    <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Comment was Submitted Succssfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>



    <div class="container my-4" style="width: 60%;">
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_id`='$id'";
        $result = mysqli_query($conn,$sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            // echo $row['category_id'];
            // echo $row['category_name'];

            // $cat_id = $row['category_id'];
            $thread_title = $row['thread_title'];
            $thread_desc = $row['thread_desc'];
            

        
        }
        ?>



        <div class="jumbotron">
            <h3 class="display-3"><?php echo $thread_title; ?>.</h3>
            <p class="lead"><?php echo $thread_desc; ?>.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
            <p style="font-weight: bold;">Posted by : Harry</p>
            </p>
        </div>


        <div class="container my-3">
            <form action="/Online_Forum/thread.php" method="post">
                <h4>Post a Comment :</h4>

                <!-- <input type="hidden" name="sno" value="'. $_SESSION['sno']. '"> -->
                <div class="form-group">
                    <label for="comment_cont">Type Your Comment</label>
                    <textarea class="form-control" id="comment_cont" name="comment_cont" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-success my-2">Post Comment</button>
            </form>

            <h2 class="py-2">Discussions:</h2>
            <?php
            $sql = "SELECT * FROM `comment`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){


                $comment_id = $row['comment_id'];
                $comment_cont = $row['comment_cont'];
                // $thread_id = $row['thread_id'];
                echo '<div class="media mb-4" style="margin-left: 2px;">
                        <img class="mr-3" src="user.jpg" alt="Generic placeholder image">
                        <div class="media-body">
                                '.$comment_cont.'
                        </div>
                    </div>';
                    

            
            }
            ?>

























































            <!-- <?php
        $sql = "SELECT * FROM `threads`";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            // echo $row['category_id'];
            // echo $row['category_name'];

            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_title'];
            $thread_desc = $row['thread_desc'];
            echo '<div class="media mb-4">
                    <img class="mr-3" src="img/user.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='. $thread_id .'">'. $thread_title .'</a></h5>
                            '.$thread_desc.'
                    </div>
                  </div>';

        
        }
        ?> -->












        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>