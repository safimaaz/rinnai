<?php 
   session_start();
   include 'connection/connection.php';
   $msg='';
   $error='';
   if(isset($_POST['message'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
      $detail = mysqli_real_escape_string($conn, $_POST['detail']);
      $msg_sql = "INSERT INTO `contact_us`(`name`, `email`, `mobile`, `comment`) VALUES ('$name', '$email', '$mobile', '$detail')";
      if(mysqli_query($conn, $msg_sql)){
         $msg = 'Message send successfully.';
         echo "<script>alert('Message send successfully.');</script>";
      } else {
         $error = 'Failed to send message!!!';
         echo "<script>alert('Failed to send message!!!');</script>";
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
   <?php require 'common/header-gtag.php' ?>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/logoo.png" type="">
      <title>Contact Us</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
   <?php require 'common/body-gtag.php' ?>
      <div class="hero_area">
         <!-- header section strats -->
         <?php include 'common/navbar.php'; ?>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contact us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="contact.php" method="post">
                        <fieldset>
                           <input type="text" placeholder="Enter your full name" name="name" required />
                           <input type="email" placeholder="Enter your email address" name="email" required />
                           <input type="text" placeholder="Enter your mobile number" name="mobile" required />
                           <textarea placeholder="Enter your message" name="detail"  required></textarea>
                           <input type="submit" value="Submit" name="message" />
                           <p class="text-success"><?php echo $msg; ?></p>
                           <p class="text-danger"><?php echo $error; ?></p>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           #NewArrivals
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                     </p>
                     <a href="">
                     Shop Now
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->
      <!-- footer section -->
      <?php include "common/footer.php"; ?>
      <!-- footer section -->
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>