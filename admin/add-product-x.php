<?php
  include '../connection/connection.php';
  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);    
    $key1 = mysqli_real_escape_string($conn, $_POST['key1']);
    $key2 = mysqli_real_escape_string($conn, $_POST['key2']);
    $key3 = mysqli_real_escape_string($conn, $_POST['key3']);
    $key4 = mysqli_real_escape_string($conn, $_POST['key4']);
    $key5 = mysqli_real_escape_string($conn, $_POST['key5']);
    $key6 = mysqli_real_escape_string($conn, $_POST['key6']);
    $val1 = mysqli_real_escape_string($conn, $_POST['val1']);
    $val2 = mysqli_real_escape_string($conn, $_POST['val2']);
    $val3 = mysqli_real_escape_string($conn, $_POST['val3']);
    $val4 = mysqli_real_escape_string($conn, $_POST['val4']);
    $val5 = mysqli_real_escape_string($conn, $_POST['val5']);
    $val6 = mysqli_real_escape_string($conn, $_POST['val6']);
    
    
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$file_name)));
      // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png", "webp");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      // if($file_size > 2097152){
      //    $errors[]='File size must be excately 2 MB';
      // }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/products/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }

    try {
      $sql = "INSERT INTO `products`(`name`, `description`, `key1`, `val1`, `key2`, `val2`, `key3`, `val3`, `key4`, `val4`, `key5`, `val5`, `key6`, `val6`, `img`) VALUES ('$name','$description','$key1','$val1','$key2','$val2','$key3','$val3','$key4','$val4','$key5','$val5','$key6','$val6','$file_name')";
      $result= mysqli_query($conn, $sql);
      if($result){
        echo "<script>alert('Product added successfully.');</script>";
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
          <a href="#">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
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
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
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
          <div class="title text-center">ADD PRODUCT</div>
          <div class="form-div">
            <form action="add-product.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Name</label>
                <input type="text" name="name" required class="form-control"  placeholder="Product Name">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Key 1</label>
                    <input type="text" name="key1" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Value 1</label>
                    <input type="text" name="val1" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Key 2</label>
                    <input type="text" name="key2" class="form-control" placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Value 2</label>
                    <input type="text" name="val2" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Key 3</label>
                    <input type="text" name="key3" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Value 3</label>
                    <input type="text" name="val3" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Key 4</label>
                    <input type="text" name="key4" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Value 4</label>
                    <input type="text" name="val4" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Key 5</label>
                    <input type="text" name="key5" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Value 5</label>
                    <input type="text" name="val5" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Key 6</label>
                    <input type="text" name="key6" class="form-control"  placeholder="write text here">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Value 6</label>
                    <input type="text" name="val6" class="form-control"  placeholder="write text here">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput1" class="form-label">Description</label>
                <textarea required name="description" class="form-control" cols="30" placeholder="Description" rows="10"></textarea>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput3" class="form-label">Image</label>
                <input required type="file" class="form-control" name="image" placeholder="Select an image">
              </div>
              <button class="btn btn-primary" name="submit">Submit</button>
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
