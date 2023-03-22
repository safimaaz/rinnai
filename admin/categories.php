<?php
  require_once '../connection/connection.php';
  
  if(isset($_GET['del'])){
    if($_GET['del'] == 'true'){
      $id = $_GET['id'];
      $del_query = "DELETE FROM `categories` WHERE `id`='$id'";
      if(mysqli_query($conn, $del_query)){
        echo "<script>alert('Category deleted successfully');</script>";
        header("Location: https://www.rinnai.com.pk/admin/categories.php");
      } else {
        echo "<script>alert('Failed to deleted category');</script>";        
      }
    }
  }
  
  if(isset($_GET['status'])){
    echo "truee";
    $id = $_GET['id'];
    $status = $_GET['status'];
    $new_status = $_GET['status'];
    
    if($status == 0){
      $new_status = 1;
    } else {
      $new_status = 0;
    }
    
    $sql_update = "UPDATE `categories` SET `status`='$new_status' WHERE `id`='$id'";
    if(mysqli_query($conn, $sql_update)){
      echo "<script>alert('Status updated successfully');</script>";
    } else {
      echo "<script>alert('Failed to updated status');</script>";      
    }
  }

  $result = mysqli_query($conn, "SELECT * FROM `categories`");
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
          <div class="title">Categories <a href="add-category.php"><button class="btn btn-success float-end">ADD CATEGORY</button></a></div>
          <div class="sales-details">
            <div class="table-responsive" style="width: 100%;">
              <table class="table" style="width: 100%;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Contact</th> -->
                    <!-- <th scope="col">Image</th> -->
                    <th scope="col">Change Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php 
                    if($result){
                      if(mysqli_num_rows($result) > 0){
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <!-- <td><?php echo $row['title'] ?></td> -->
                            <td><?php echo $row['categories'] ?></td>
                            <td><?php if($row['status'] == 1){echo "<b style='color: #379a37; background: #a0e7a0; padding: 1px 15px; border-radius: 5px;'>Active</b>";} else { echo "<b style='color: #f52a2a; background: #ec8465aa; padding: 1px 5px; border-radius: 5px;'>Unactive</b>";} ?></td>
                            <!-- <td><?php echo $row['img'] ?></td> -->
                            <td><a href="categories.php?status=<?php echo $row['status'] ?>&id=<?php echo $row['id'] ?>"><button class="btn btn-info px-3">Change Status</button></a></td>
                            <td><a href="categories.php?del=true&id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
                          </tr>
                          <?php
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
