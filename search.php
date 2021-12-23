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
        /* justify-content: center; */
        /* margin-left: 0px; */
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
        width: 60%;
        margin-left: 250px;
        height: 150px;
    }

    .jumbotron h3 {
        font-size: 50px;
        margin-top: 30px;

    }
    
    </style>
</head>

<body>
    <?php include '_header.php';?>




    <div class="container text-center">
        <h2 class="py-2 my-4">Searching Results for: <em>"<?php echo $_GET["search"]; ?>"</em></h2>
        <?php
            include '_dbconnect.php';
            $showResult = false;
            $query = $_GET["search"];
            $sql = "SELECT * FROM `threads` WHERE (`thread_title` LIKE '%".$query."%') OR (`thread_desc` LIKE '%".$query."%')";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $thread_title = $row['thread_title'];
                $thread_desc = $row['thread_desc'];
                $thread_id = $row['thread_id'];
                $url = "thread.php?threadid=" . $thread_id;
                $showResult = true;
                echo '<div class="media mb-4">
                        <img class="mr-3" src="user.jpg" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0"><a class="text-dark" href="'.$url.'">'.$thread_title.'</a></h5>
                            '.$thread_desc.'
                        </div>
                    </div>';
            }
            if(!$showResult){
                echo '<div class="jumbotron text-center">
                        <h3 class="display-3">No Results Found... :(</h3>
                    </div>';
        }
        
        ?>
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