<?php 
    session_start();
    require_once 'connection/connection.php';

    if(isset($_POST['remove_item'])){
        // echo "item remove";
        $cart__items = $_SESSION['cart'];
        $pname = $_POST['pname'];
        $index = null;
        $num = 0;
        foreach($cart__items as $val){
            if($val[1] === $pname){
                $index = $num;
                // echo "matched at ".$num."<br>";
                // echo "val ".$val[1]." and pname ".$pname."<br>";
            } else{
                // echo "val ".$val[1]." and pname ".$pname."<br>";
            }
            $num++;
        }
        // echo "index = ".$index." <br>";
        // if($index != null){
            // echo "Rrrrr";
            array_splice($cart__items, $index, 1);
            $_SESSION['cart'] = $cart__items;
            echo "<script>alert('Item removed from cart successfully.');</script>";
        // }
    }

    if(isset($_POST['inc'])){
        $quantity = $_POST['quantity'];
        $pid = $_POST['pid'];

        $cart__items = $_SESSION['cart'];
        
        $index = null;
        $num = 0;
        foreach($cart__items as $val){
            if($val[0] === $pid){
                $index = $num;
                // echo "matched at ".$num."<br>";
                // echo "val ".$val[0]." and pid ".$pid."<br>";
            } else{
                // echo "val ".$val[0]." and pid ".$pid."<br>";
            }
            $num++;
        }

        // echo "index = ".$index." <br>";
        $cart__items[$index][4] = $quantity + 1;

        $_SESSION['cart'] = $cart__items;
        // echo "<script>alert('Quantity increased successfully.');</script>";
    }

    if(isset($_POST['dec'])){
        $quantity = $_POST['quantity'];
        $pid = $_POST['pid'];

        $cart__items = $_SESSION['cart'];
        
        $index = null;
        $num = 0;
        foreach($cart__items as $val){
            if($val[0] === $pid){
                $index = $num;
                // echo "matched at ".$num."<br>";
                // echo "val ".$val[0]." and pid ".$pid."<br>";
            } else{
                // echo "val ".$val[0]." and pid ".$pid."<br>";
            }
            $num++;
        }

        // echo "index = ".$index." <br>";
        if($quantity - 1 == 0){
            array_splice($cart__items, $index, 1);
            // $_SESSION['cart'] = $cart__items;
        } else {
            $cart__items[$index][4] = $quantity - 1;
        }

        $_SESSION['cart'] = $cart__items;
        // echo "<script>alert('Quantity decreased successfully.');</script>";
    }

    if(isset($_POST['place_order'])){
        // if(isset($_SESSION['id'])){
            $user_id=0;
            if(isset($_SESSION['id'])){
                $user_id = $_SESSION['id'];
            }
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $total = $_POST['total'];
            $order_sql = "INSERT INTO `orders`(`id`, `name`, `phone`, `price`, `address`) VALUES ('$user_id', '$name', '$phone', '$total', '$address')";
            if(mysqli_query($conn, $order_sql)){
                $getorders_sql = "SELECT * FROM `orders`";
                $getorders_result = mysqli_query($conn, $getorders_sql);
                if($getorders_result){
                    $oid = null;
                    while($roww = mysqli_fetch_assoc($getorders_result)){
                        $oid = $roww['oid'];
                    }

                    $cart = $_SESSION['cart'];
                    foreach($cart as $arr){
                        $proid = $arr[0];
                        $proname = $arr[1];
                        $procat = $arr[2];
                        $proprice = $arr[3];
                        $proqty = $arr[4];
                        $order_products_cart = "INSERT INTO `order_products`(`pid`, `pname`, `pcategory`, `qty`, `price`, `oid`) VALUES ('$proid', '$proname', '$procat', '$proqty', '$proprice', '$oid')";
                        if(mysqli_query($conn, $order_products_cart)){
                            echo "product added";
                        }
                    }
                    unset($_SESSION['cart']);
                    echo "<script>alert('Order placed successfully.');</script>";
                }
            }

        // } else {
        //     echo "<script>alert('Please Login before placing order.');</script>";
        // }
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
      <title>Cart</title>
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
         <!-- end header section -->
         <?php include "common/navbar.php"; ?>
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Cart</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
        <div class="container_fluid ">
            <?php 
                if(!isset($_SESSION['cart'])){
                    ?>
                        <div class="heading_container heading_center">
                            <h2>
                                Your Cart is empty.
                            </h2>
                        </div>
                    <?php
                }
            ?>
            <div class="row px-5">
                <div class="col-9 pl-md-5 pr-md-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_SESSION['cart'])){
                                    $cart_items = $_SESSION['cart'];
                                    $noo = 1;
                                    $total = 0;
                                    foreach ($cart_items as $value) {
                                        // print_r($value);
                                        // echo "$value <br>";
                                        ?>
                                        <form action="cart.php" method="post">
                                            <tr>
                                                <th scope="row"><input type="hidden" value="<?php echo $value[0]; ?>" name="pid" /><?php echo $noo; ?></th>
                                                <td><?php echo $value[1]; ?><input type="hidden" value="<?php echo $value[1]; ?>" name="pname" /> </td>
                                                <td><?php echo $value[2]; ?></td>
                                                <td><?php echo $value[3]; ?> <input type="hidden" value="<?php echo $value[3]; ?>" name="price" /></td>
                                                <td>
                                                    <button type="submit" name="dec" class="btn btn-warning" style="padding-left: 13px; padding-right: 13px;">-</button>
                                                    <b class="px-3"><?php echo $value[4]; ?></b>
                                                    <button type="submit" name="inc" class="btn btn-success">+</button>
                                                    <input type="hidden" value="<?php echo $value[4]; ?>" name="quantity" />
                                                </td>
                                                <td><?php echo $value[3] * $value[4]; ?></td>
                                                <td><button class="btn btn-danger" type="submit" name="remove_item">Remove</button></td>
                                            </tr>
                                            </form>
                                        <?php
                                        $total = $total + $value[3] * $value[4];
                                        $noo++;
                                    }
                                ?>
                                <tr>
                                    <th scope="row">Total</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b><?php echo $total; ?></b></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <form action="cart.php" method="post">
                        <h3 class="headings322">Place Order</h3>
                        <input type="hidden" name="total" value="<?php echo $total; ?>" />
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }?>" id="formGroupExampleInput" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="formGroupExampleInput2" placeholder="e.g 03002010100">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput3" class="form-label">Delivery Address</label>
                            <textarea name="address" name="address" placeholder="Enter delivery address" class="form-control" required id="" cols="30" rows="4"></textarea>
                            <!-- <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Another input placeholder"> -->
                        </div>
                        <button class="btn btn-success" type="submit" name="place_order">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
      </section>
      <!-- end why section -->
      <!-- footer section -->
      <?php include "common/footer.php"; ?>
      <!-- <footer class="footer_section">
         <div class="container">
            <div class="row">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Reach at..
                     </h4>
                     <div class="contact_link_box">
                        <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Location
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Call +01 1234567890
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        demo@gmail.com
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.html" class="footer-logo">
                     Famms
                     </a>
                     <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved By
                     <a href="https://html.design/">Free Html Templates</a><br>
         
                     Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                  </p>
               </div>
            </div>
         </div>
      </footer> -->
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