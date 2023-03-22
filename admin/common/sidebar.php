<?php 
  session_start();

  if(!isset($_SESSION['mail'])){
    echo "<script>window.open('./login.php','_self')</script>";
  }
?>
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Admin Panel</span>
    </div>
      <ul class="nav-links" style="padding-left: 0;">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Current Orders</span>
          </a>
        </li>
        <li>
          <a href="categories.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Categories</span>
          </a>
        </li>
        <li>
          <a href="products.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Products</span>
          </a>
        </li>
        <li>
          <a href="order-history.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Order History</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li> -->
        <li>
          <a href="users.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Customers</span>
          </a>
        </li>
        <li>
          <a href="messages.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li> -->
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>