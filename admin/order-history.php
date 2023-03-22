<?php
  require_once '../connection/connection.php';
  
  if(isset($_GET['del'])){
    if($_GET['del'] == 'true'){
      $id = $_GET['id'];
      $del_query = "DELETE FROM `products` WHERE `pid`='$id'";
      if(mysqli_query($conn, $del_query)){
        echo "<script>alert('Product deleted successfully');</script>";
        header("Location: http://localhost/famms/admin/products.php");
      } else {
        echo "<script>alert('Failed to deleted product');</script>";        
      }
    }
  }
  
  if(isset($_GET['deliver'])){
    echo "truee";
    $oid = $_GET['oid'];
    // $status = $_GET['status'];
    // $new_status = $_GET['status'];
    
    // if($status == 0){
    //   $new_status = 1;
    // } else {
    //   $new_status = 0;
    // }
    
    $sql_update = "UPDATE `orders` SET `status`='delivered' WHERE `oid`='$oid'";
    if(mysqli_query($conn, $sql_update)){
      echo "<script>alert('Status updated successfully');</script>";

    } else {
      echo "<script>alert('Failed to updated status');</script>";      
    }
    echo "<script>window.open('index.php','_self')</script>";
  }

  $result = mysqli_query($conn, "SELECT * FROM `orders` WHERE `status`='delivered'");
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
<body>
  <?php include 'common/sidebar.php' ?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Prem Shahi</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content width-100" style="width: 100% ;">
      <div class="sales-boxes width-100 " style="width: 100% ;">
        <div class="recent-sales box width-100" style="width: 100% ;">
          <div class="title w-100">Order History </div>
          <div class="sales-details">
            <div class="table-responsive" style="width: 100%;">
              <table class="table" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Order Price</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Edit</th> -->
                    <!-- <th scope="col">Delete</th> -->
                  </tr>
                </thead>
                <tbody>
                  
                  <?php 
                    if($result){
                      if(mysqli_num_rows($result) > 0){
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $oid = $row['oid'];
                            $order_products = mysqli_query($conn, "SELECT * FROM `order_products` WHERE `oid`='$oid'");
                            if($order_products){
                                $count2 = 0;
                                while($rowww = mysqli_fetch_assoc($order_products)){
                                    ?>
                                        <tr>
                                            <th scope="row"><?php if($count2 == 0){ echo $count; }?></th>
                                            <td><?php if($count2 == 0){ echo $row['name']; } ?></td>
                                            <td><?php if($count2 == 0){ echo $row['phone']; } ?></td>
                                            <td><?php if($count2 == 0){ echo $row['price']; } ?></td>
                                            <td><?php  echo $rowww['pname'] ?></td>
                                            <td><?php  echo $rowww['pcategory'] ?></td>
                                            <td><?php echo $rowww['price'] ?></td>
                                            <td><?php echo $rowww['qty'] ?></td>
                                            <td><?php if($count2 == 0){ echo $row['address']; } ?></td>
                                            <!-- <td><?php if($row['status'] == 1){echo "<b style='color: #379a37; background: #a0e7a0; padding: 1px 15px; border-radius: 5px;'>Deliver</b>";} else { echo "<b style='color: #f52a2a; background: #ec8465aa; padding: 1px 5px; border-radius: 5px;'>Unactive</b>";} ?></td> -->
                                            <!-- <td><?php echo $row['img'] ?></td> -->
                                            <!-- <td><img src="uploads/products/<?php echo $row['img']; ?>" height="40px" /> </td> -->
                                            <td><?php if($count2 == 0){ ?><b>Delivered</b><?php } ?></td>
                                            <!-- <td><a href="edit-product.php?id=<?php echo $row['pid'] ?>"><button class="btn btn-info px-3">Edit</button></a></td> -->
                                            <!-- <td><a href="products.php?del=true&id=<?php echo $row['pid'] ?>"><button class="btn btn-danger">Delete</button></a></td> -->
                                        </tr>
                                    <?php
                                    $count2++;
                                }
                            }
                          $count++;
                        }
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="button">
            <a href="#">See All</a>
          </div> -->
        </div>
        
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
