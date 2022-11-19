<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = [];

    $userEmail = filter_var( $_POST['user-email'],FILTER_VALIDATE_EMAIL );
    $userPassword =  $_POST['user-password'];

    if($userEmail && $userPassword){
        require './../src/php/db.php';
        $db = connectDB();
        $query = "SELECT user_password, user_name from users where user_email = '$userEmail'";
        $res = $db->query($query)->fetch();
        if($res) {
            $passHash = $res['user_password'];
            $loginState = password_verify($userPassword, $passHash);
            if($loginState) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user-email'] = $userEmail;
                $_SESSION['user-name'] = $res['user_name']; 
                echo json_encode(['Logged']);
            } else{
                $errors['Something went wrong try again'];
                echo json_encode(['xd']);
            }
        } else{
            $errors[] = 'Password or email are not correct';
            echo json_encode(['bra']);
        }
        
    } else {
        echo json_encode(['Values are not correct']);
    }
}