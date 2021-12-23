<?php
// session_start();
include "_dbconnect.php";






echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/Online_Forum/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Online_Forum/About.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql = "SELECT category_name, category_id FROM `category` LIMIT 6";
        $result = mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_assoc($result)){
          echo '<a class="dropdown-item" href="threadslist.php?catid='. $row['category_id'] .'">' . $row['category_name']. '</a>';
        }
          
        echo '</div>
      </li>
      
    </ul>
    <div class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div row mx-2 my-lg-0>
        <form class="d-flex" method="get" action="search.php">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
            <button class="btn btn-outline-success mx-2" type="submit"><a style="text-decoration: none;" href="/Online_Forum/logout.php">Logout</a></button>

        </form>
    </div>';
    }
    else{
    echo '<div row mx-2 my-lg-0>
        <form class="d-flex" method="get" action="search.php">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
            <button class="btn btn-outline-success mx-2" type="submit"><a style="text-decoration: none;" href="/Online_Forum/signup.php">SignUp</a></button>
            <button class="btn btn-outline-success mx-2" type="submit"><a style="text-decoration: none;" href="/Online_Forum/login.php">Login</a></button>

        </form>
    </div>';
    }
  echo '</div>
</div>
</nav>';


?>