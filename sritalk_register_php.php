<?php
    $con = mysqli_connect("Mysql@localhost:3306", "root", "hello2174*", "userlogin");
    
    $RegisterName = $_POST["RegisterName"];
    $RegisterUserName = $_POST["RegisterUserName"];
    $RegisterPassword = $_POST["RegisterPassword"];
    $RegisterAge = $_POST["RegisterAge"];
    $statement = mysqli_prepare($con, "INSERT INTO userlogin (RegisterName, RegisterUserName, RegisterPassword, RegisterAge) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $RegisterName, $RegisterUserName, $RegisterPassword, $RegisterAge);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
