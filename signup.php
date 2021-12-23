<?php
$showAlert = false;
$showError = false;
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST"){
    include "partials/_dbconnect.php";
    $mail = $_POST["mail"]; 
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];
    $existsSql = "SELECT * FROM `iusers` WHERE `user_mail` = '$mail'";
    $result = mysqli_query($conn,$existsSql);
    $numExistsRows = mysqli_num_rows($result);
    if($numExistsRows > 0){
      // $exists = true;
      $showError = "Email already exists.";
    }
    else{
      // $exists = false;
        if(($pass == $cpass)){
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `iusers` (`user_mail`, `user_password`, `date`) VALUES ('$mail', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result){
              $showAlert = true;
            }
        }
        else{
            $showError = "password do not match";
            header("location: /Online_Forum/login.php");
            exit();
          }
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SignUp to iDiscuss</title>
    <style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

    }
    </style>
</head>

<body>

    <?php include '_header.php'?>
    <?php
    if($showAlert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong>Your account is now created and you can login.Login by using this link: <a href='/Online_Forum/login.php'>Login here.</a>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>;</span>
      </button>
    </div>";
    }
    if($showError){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong>Password do not match.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>;</span>
        </button>
      </div>";
      }
    ?>

    <div class="container my-4">
        <h2>SignUp to iDiscuss</h2>
        <form action="/Online_Forum/signup.php" method="post">
            <div class="mb-3 my-3">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label"> Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <div id="passwordHelp" class="form-text">Make sure to type the same password.</div>

            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
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