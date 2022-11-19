<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $userEmail = filter_var( trim($_POST['user-email']), FILTER_VALIDATE_EMAIL );
    $userName = filter_var( trim( $_POST['user-name']), FILTER_DEFAULT);
    $userLastName = filter_var( trim($_POST['user-last-name']), FILTER_DEFAULT);
    $userPassword = filter_var( trim($_POST['user-password']), FILTER_DEFAULT);
    $errors = [];

    if(isset($userName) && isset($userLastName) && isset($userPassword) && isset($userEmail)){
        require './../src/php/db.php';
        $userPassHash = password_hash($userPassword, PASSWORD_BCRYPT, ['cost'=> 4]);
        $db = connectDB();
        $query = "INSERT INTO users VALUES(null, '$userName', '$userLastName', '$userEmail', '$userPassHash')";
        $db->query($query);

        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user-email'] = $userEmail;
        $_SESSION['user-name'] = $userName;
        echo json_encode(['Registered']);
    } else{
        $errors[] = 'The credential already exits';
        echo json_encode($errors);
    }
}