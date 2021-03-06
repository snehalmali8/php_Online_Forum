<?php

session_start();
    // if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != false){
    //     header("location: Login.php");
    //     exit;
    // }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss</title>
  </head>
  <body>
    
    <?php include '_header.php';?>
    <?php include '_dbconnect.php';?>

    <!-- slider -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/2400x850/?coding,apple" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x850/?coding,python" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x850/?nature,water" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Category container starts here -->
    <div class="container my-3">
      <h2 class="text-center my-3">iDiscuss - Browse Categories</h2>
    
      <div class="row mb-4">
        <!-- fetch all categories -->
        <?php
  
        $sql = "SELECT * FROM `category` ";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            // $catid = $row['category_id'];
            $id = $row['category_id'];
            $cat_name = $row['category_name'];
            $cat_desc = $row['category_discription'];
            echo '<!-- use a for loop to iterate trough ategories -->
            <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/400x300/?'. $id .'coding,python" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="mt-0">'. $cat_name .'</h5>

                      <p class="card-text">'. substr($cat_desc,0,90) .'...</p>
                      <a class="btn btn-primary" href="threadsList.php?catid='. $id .'">View Threads</a>
                    </div>
                </div>
            </div>';

        }
        ?>
        
        
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>