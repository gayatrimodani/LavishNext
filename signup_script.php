<?php
    require "common.php";
    // get details
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    // hash password
    $hashed_password = md5($password);
    $query1 = "SELECT id FROM users WHERE email = '$email' ";
    $query2 = "INSERT INTO users (name, email, password, contact, city, address) VALUES ('$name', '$email', '$hashed_password', '$contact', '$city', '$address')";

    // check if already registered user
    $result = mysqli_query($conn, $query1);
    $num=mysqli_num_rows($result);
    if($num!=0){
        echo "emailid already exists";
    }
    else{
            mysqli_query($conn, $query2);
            $_SESSION["email_id"] = $email;
            $_SESSION["id"] = mysqli_insert_id($conn);
    
            // redirect to products page
            header("location: products.php");
    }

    /*if(!$result){
        if(mysqli_num_rows($result) > 0){
            // email already exists
            echo "Email id already exists. Try another";
        }
        else{
            // perform query operation
            $result1 = mysqli_query($conn, $query2);
            $_SESSION["email_id"] = $email;
            $_SESSION["id"] = mysqli_insert_id($conn);
    
            // redirect to products page
            header("location: products.php");
        }
       
    }*/
   
    
   
?>