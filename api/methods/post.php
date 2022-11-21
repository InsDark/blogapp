<?php 
if(!isset($_SESSION)) {
    session_start();
}
function post($params) {
    require './../src/php/db.php';

    $params = explode('/', $params);
    $endpoint = $params[0];
    $query;

    if($endpoint == 'user' && count($params ) == 1) {
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
    
            $_SESSION['login'] = true;
            $_SESSION['user-email'] = $userEmail;
            $_SESSION['user-name'] = $userName;
            echo json_encode(['Registered']);
        } else{
            $errors[] = 'The credential already exits';
            echo json_encode($errors);
        }
    } else if($endpoint == 'post' && count($params ) == 1){
        $postTitle = $_POST['post-title'];
        $postContent = $_POST['post-content'];
        $postImage = $_FILES['post-image']['tmp_name'];
        $postCategory = $_POST['post-category'];
        if(isset($postCategory) && isset($postTitle) && isset($postContent) && isset($postImage)){

            require './../src/php/loger.php';
            require './../src/php/db.php';
            $db = connectDB();

            $date = date('Y-m-d');
            $userId = $_SESSION['user-id'];
            $imgName = md5(password_hash($_FILES['post-image']['name'], PASSWORD_BCRYPT)). '.jpg';

            $query = "INSERT INTO entries VALUES(null, '$userId', '$postCategory', '$date', '$postTitle', '$postContent', '$imgName')";

            $stm = $db->prepare($query);
            $res = $stm->execute();

            if($res) {
                move_uploaded_file($postImage, "./../posts/$imgName");
                echo json_encode(['The post was uploaded successfully']);
            } else{
                echo json_encode('Something happend, try again');
            }
        } else {
            echo json_encode(['Data it\'s missing']);
        }
    } else{
        echo json_encode(['The endpoint does not exist']);
    }
}