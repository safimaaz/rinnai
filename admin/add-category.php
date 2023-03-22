<?php
  include '../connection/connection.php';
  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    // $categories = mysqli_real_escape_string($conn, $_POST['categories']);
    
    // $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    
    // $errors= array();
    //   $file_name = $_FILES['image']['name'];
    //   $file_size =$_FILES['image']['size'];
    //   $file_tmp =$_FILES['image']['tmp_name'];
    //   $file_type=$_FILES['image']['type'];
    //   $text= end(explode('.',$file_name));
    //   $file_ext = strtolower($text);
    //   // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
    //   $extensions= array("jpeg","jpg","png", "webp");
      
    //   if(in_array($file_ext,$extensions)=== false){
    //      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    //   }
      
    //   // if($file_size > 2097152){
    //   //    $errors[]='File size must be excately 2 MB';
    //   // }
      
    //   if(empty($errors)==true){
    //      move_uploaded_file($file_tmp,"uploads/services/".$file_name);
    //      echo "Success";
    //   }else{
    //      print_r($errors);
    //   }

    try {
      $sql = "INSERT INTO `categories`(`categories`) VALUES ('$name')";
      $result= mysqli_query($conn, $sql);
      if($result){
        echo "<script>alert('Category added successfully.');</script>";
      }
      else{
        echo "<script>alert('Error');</script>";
      }
    }
    catch (mysqli_sql_exception $e) { 
      var_dump($e);
      exit; 
   } 

  }  
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
  <?php include 'common/sidebar.php'; ?>
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
        <div class="recent-sales box width-100" style="width: 100% ; min-height: calc(100vh - 130px);">
          <div class="title text-center">ADD CATEGORY</div>
          <div class="form-div">
            <form action="add-category.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" required id="formGroupExampleInput" placeholder="Name">
              </div>
              <!-- <div class="mb-3">
                <label for="formGroupExampleInput1" class="form-label">User Email</label>
                <input type="text" name="categories" class="form-control" required id="formGroupExampleInput1" placeholder="Email">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput1" class="form-label">User Contact</label>
                <input type="text" name="categories" class="form-control" required id="formGroupExampleInput1" placeholder="User Contact">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput1" class="form-label">Password</label>
                <input type="password" name="categories" class="form-control" required id="formGroupExampleInput1" placeholder="Password">
              </div> -->
              <!-- <button class="btn btn-primary">Add Benefit</button> -->
              <!-- <button class="btn btn-primary">Add Risk</button> -->
              <!-- <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Description</label>
                <textarea name="description" class="form-control" required id="" cols="30" rows="6"></textarea>
                <input type="text" name="description" class="form-control" required id="formGroupExampleInput2" placeholder="Description">
              </div> -->
              <!-- <div class="mb-3">
                <label for="formGroupExampleInput3" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" required id="formGroupExampleInput3" placeholder="Select an image">
              </div> -->
              <button class="btn btn-primary" name="submit">Add Category</button>
            </form>
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
