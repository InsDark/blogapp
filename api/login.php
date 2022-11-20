<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userEmail = filter_var( $_POST['user-email'],FILTER_VALIDATE_EMAIL );
    $userPassword =  $_POST['user-password'];

    if($userEmail && $userPassword){
        require './../src/php/db.php';
        $db = connectDB();
        $query = "SELECT user_id, user_password, user_name from users where user_email = '$userEmail'";
        $res = $db->query($query)->fetch();
        if($res) {
            $passHash = $res['user_password'];
            $loginState = password_verify($userPassword, $passHash);
            if($loginState) {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user-email'] = $userEmail;
                $_SESSION['user-name'] = $res['user_name']; 
                $_SESSION['user-id'] = $res['user_id'];
                echo json_encode(['Logged']);
            } else{
                echo json_encode(['Password or email are incorrect']);
            }
        } else{
            echo json_encode(['The email address is invalid']);
        }
        
    } else {
        echo json_encode(trigger_error('Invalid session'));
    }
}