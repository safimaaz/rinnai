<?php
    session_start();
    require_once '../connection/connection.php';

    $msg = '';
   if(isset($_SESSION['mail'])){
     echo "<script>window.open('./index.php','_self')</script>";
   }
   if(isset($_POST['login'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      
         try{
            $sql_login = "SELECT * FROM `admin_users` WHERE `username`='$email'";
            $login_result = mysqli_query($conn, $sql_login);
            // echo "result ".mysqli_num_rows($login_result);
            // print_r($login_result);
            if($login_result){
                if(mysqli_num_rows($login_result) > 0){
                    // echo "<script>alert('Successfully logged In.');</script>";
                    $userr = mysqli_fetch_assoc($login_result);  
                    if($userr['password'] == $password){
                        $_SESSION['mail']=$userr['username'];
                        // $_SESSION['id']=$userr['id'];
                        // $_SESSION['name']=$userr['name'];
                        echo "<script>window.open('index.php','_self')</script>";
                    } else {
                        $msg = "Invalid email or password";
                    }
                    

                } else {
                    $msg = "User does not exist!!!";
                }
            } else{
            //    echo "<script>alert('Failed to register.');</script>";
               $msg = "Failt to Login!!!";            
            }
         }
         catch (mysqli_sql_exception $e) { 
         var_dump($e);
         exit; 
         }
      
        //  echo "<script>alert('password and confirm password do not match!');</script>";
      
   }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color: #f8f9fa;">
    <!-- <h1>Hello, world!</h1> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-10 offset-lg-4 offset-md-3 offset-1" style="background: #fff; height: 500px; padding: 50px 30px; margin-top: 100px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" >
                <h1 class="pb-4">Admin Login</h1>
                <form action="login.php" method="post" class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12">
                        <label class="" for="inlineFormInputGroupUsername">Email</label>
                        <input type="text" name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Enter your email">
                    </div>
                    
                    <div class="col-12">
                        <label class="" for="inlineFormInputGroupUsername2">Password</label>
                        <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter your password">
                    </div>
                
                    <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                        <label class="form-check-label" for="inlineFormCheck">
                            Remember me
                        </label>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-info px-4">Login</button>
                        <p class="pt-2 text-danger"><?php echo $msg; ?></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>