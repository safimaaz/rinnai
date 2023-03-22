<footer>
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img height="200px" src="images/logoo.png" alt="#" /></a>
                      </div>
                      <!-- <div class="information_f">
                        <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                      </div> -->
                   </div>
               </div>

               <div class="col-md-6">
                  <div class="widget_menu">
                     <h4 style="font-weight: 700;">Contact</h4>
                     <div class="information_f">
                        <p><strong>ADDRESS:</strong></p>
                        <p>Allahabad Road, Westridge-III, Rawalpindi, Pakistan.</p>
                        <p><strong>TELEPHONE:</strong></p>
                        <p class="mb-0">+923325655785</p>
                        <p>+923169672959</p>
                        <p><strong>EMAIL:</strong></p>
                        <p>info@rinnai.com.pk</p>
                      </div>
                     <!-- <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Testimonial</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                     </ul> -->
                  </div>                  
               </div>

               <div class="col-md-3">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-12">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="index.php">Home</a></li>
                           <li><a href="product.php">Products</a></li>
                           <li><a href="contact.php">Contact</a></li>
                           <?php 
                              if(isset($_SESSION['id'])){
                                ?>
                                    <li><a href="cart.php">Cart</a></li>
                                <?php
                              } else {
                                    ?>
                                  <li><a href="signup.php">Sign Up</a></li>
                                  <li><a href="login.php">Login</a></li>
                                <?php
                              }
                           ?>
                        </ul>
                     </div>
                  </div>
                  <!-- <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
                           <li><a href="#">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div> -->
                  </div>
                  </div>     
                  <!-- <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div> -->
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="">Rinnai.com</a><br></p>
      </div>