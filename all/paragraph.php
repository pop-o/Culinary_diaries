<?php
    $comment = $_POST['comment'];     
    

    // database connection 
    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into paragraph(comment) values(?)");
        $stmt->bind_param("s",$comment);
        $stmt->execute();
        
        $stmt->close();
        $conn->close();
    }
    header("Location:commentbox.html")
?>