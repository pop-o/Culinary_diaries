<?php
    $FirstName = $_POST['FirstName'];     
    $LastName = $_POST['LastName'];
    $email= $_POST['email'];
    $password = $_POST['password'];

    // database connection 
    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into details(FirstName,LastName,email,password)
        values(?,?,?,?)");
        $stmt->bind_param("ssss",$FirstName,$LastName,$email,$password);
        $stmt->execute();
        echo "Registration successful.";
        $stmt->close();
        $conn->close();
    }
?>