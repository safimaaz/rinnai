<?php 
   session_start();
   include_once 'connection/connection.php';
   
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
      <title>Products</title>
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
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container_fluid px-md-5 px-3">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row px-md-4">
               <?php 
                  $products_res = mysqli_query($conn, "SELECT * FROM `products`");
                  if($products_res){
                     while($row = mysqli_fetch_assoc($products_res)){
                        ?>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <form method="post" action="addtocart.php">
                                 <div class="box" style="height: 350px; padding-top: 0px;">
                                    <div class="option_container">
                                       <div class="options">
                                          <button class="option1"type="submit" name="add-to-cart">Add to cart </button>
                                          <!-- <a href="" class="option1">
                                          Men's Shirt
                                          </a>
                                          <a href="" class="option2">
                                          Buy Now
                                          </a> -->
                                       </div>
                                    </div>
                                    <div class="img-box">
                                       <!-- <img src="images/p1.png" alt=""> -->
                                       <img src="admin/uploads/products/<?php echo $row['img']; ?>" alt="">
                                    </div>
                                    <div class="detail-box">
                                       <h5>
                                       <?php echo $row['pname']; ?>
                                       </h5>
                                       <!--<h6>-->
                                       <!--   <?php echo $row['price']; ?>-->
                                       <!--</h6>                                    -->
                                    </div>
                                    <div class="detail-box">
                                       <h5>
                                       Price:
                                       </h5>
                                       <h6>
                                          <?php echo $row['price']; ?>
                                       </h6>                                    
                                    </div>
                                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>" />
                                    <input type="hidden" name="pname" value="<?php echo $row['pname']; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>" />
                                    <input type="hidden" name="category" value="<?php echo $row['category']; ?>" />
                                 </div>
                              </form>
                              </div>
                        <?php
                     }
                  }   
               ?>
               <!-- <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Men's Shirt
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p1.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Men's Shirt
                        </h5>
                        <h6>
                           $75
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p2.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Men's Shirt
                        </h5>
                        <h6>
                           $80
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p3.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Women's Dress
                        </h5>
                        <h6>
                           $68
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p4.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Women's Dress
                        </h5>
                        <h6>
                           $70
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p5.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Women's Dress
                        </h5>
                        <h6>
                           $75
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p6.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Women's Dress
                        </h5>
                        <h6>
                           $58
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p7.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Women's Dress
                        </h5>
                        <h6>
                           $80
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p8.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Men's Shirt
                        </h5>
                        <h6>
                           $65
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p9.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Men's Shirt
                        </h5>
                        <h6>
                           $65
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p10.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Men's Shirt
                        </h5>
                        <h6>
                           $65
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p11.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Men's Shirt
                        </h5>
                        <h6>
                           $65
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p12.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           Women's Dress
                        </h5>
                        <h6>
                           $65
                        </h6>
                     </div>
                  </div>
               </div> -->
            </div>
            <div class="btn-box">
               <!-- <a href="">
               View All products
               </a> -->
            </div>
         </div>
      </section>
      <!-- end product section -->
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