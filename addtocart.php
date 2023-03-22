<?php 
    session_start();
    require_once 'connection/connection.php';

    if(isset($_POST['add-to-cart'])){
        // if(isset($_SESSION['id'])){
            $pid = mysqli_real_escape_string($conn, $_POST['pid']);
            $pname = mysqli_real_escape_string($conn, $_POST['pname']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $category = mysqli_real_escape_string($conn, $_POST['category']);
            // echo "cat : ".$category.", p name :".$pname.", Price : ".$price;
            $cart = array();
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                
                $flag = 0;
                
                foreach($cart as $val){
                    if($val[0] === $pid){
                        $flag = 1;
                    } 
                }
                if($flag == 0){
                    $product = array($pid, $pname, $category, $price, 1);
            
                    array_push($cart, $product);
            
                    $_SESSION['cart'] = $cart;
                    echo "<script>alert('Prodcut addedd to cart successfully');</script>";
                    echo "<script>window.open('product.php','_self')</script>";
                } else {
                    echo "<script>alert('Prodcut is already in cart.');</script>";
                    echo "<script>window.open('product.php','_self')</script>";
                }
            } else {
                $product = array($pid, $pname, $category, $price, 1);
        
                array_push($cart, $product);
        
                $_SESSION['cart'] = $cart;
                echo "<script>alert('Prodcut addedd to cart successfully');</script>";
                echo "<script>window.open('product.php','_self')</script>";
            }

        // }
        // else {
        //     echo "<script>alert('Please Login before adding product to cart');</script>";
        //     echo "<script>window.open('product.php','_self')</script>";
        // }

    }
    // echo "<pre>";
    //     print_r($_SESSION['cart']);
    // echo "</pre>";
?>