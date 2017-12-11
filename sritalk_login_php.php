<?php
    $con = mysqli_connect("Mysql@localhost:3306", "root", "hello2174*", "userlogin");
    
    $RegisterUserName = $_POST["RegisterUserName"];
    $RegisterPassword = $_POST["RegisterPassword"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM userlogin WHERE RegisterUserName = ? AND RegisterPassword = ?");
    mysqli_stmt_bind_param($statement, "ss", $RegisterUserName, $RegisterPassword);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $RegisterName, $RegisterUserName, $RegisterPassword, $RegisterAge);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["RegisterName"] = $RegisterName;
        $response["RegisterUserName"] = $RegisterUserName;
        $response["RegisterPassword"] = $RegisterPassword;
        $response["RegisterAge"] = $RegisterAge;
    }
    
    echo json_encode($response);
?>
