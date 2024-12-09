<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    //database connnection
    $conn = new mysqli('localhost','root','','resume');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
    $stmt = $conn->prepare("insert into reg(id, firstName ,lastName, gender, email, password, number)
        values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi",$id, $firstName, $lastName, $gender, $email, $password, $number);
    $stmt->execute();
    echo "<script> alert('Register Successfully');
    document.location.href = 'loginform.html';
    </script>";
    $stmt->close();
    $conn->close();
    }
?>