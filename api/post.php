<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $userEmail = filter_var( trim($_POST['user-email']), FILTER_VALIDATE_EMAIL );
    $userName = filter_var( trim( $_POST['user-name']), FILTER_DEFAULT);
    $userLastName = filter_var( trim($_POST['user-last-name']), FILTER_DEFAULT);
    $userPassword = filter_var( trim($_POST['user-password']), FILTER_DEFAULT);
    $errors = [];
    $msg = [];
    if(isset($userName) && isset($userLastName) && isset($userPassword) && isset($userEmail)){
        $userPassHash = password_hash($userPassword, PASSWORD_BCRYPT, ['cost'=> 4]);
        require './../src/php/db.php';
        $db = connectDB();
        $query = "INSERT INTO users VALUES(null, '$userName', '$userLastName', '$userEmail', '$userPassHash')";
        $db->query($query);
        $msg[] = 'You have successfully registered';
        echo json_encode($msg);
    } else{
        $errors[] = 'Invalid username or password';
        echo json_encode($errors);
    }

}