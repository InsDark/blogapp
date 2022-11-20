<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $postTitle = isset($_POST['post-title']);
    $postContent = isset($_POST['post-content']);
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
        
        // $res = $db->query($query);
        
        if($res) {
            move_uploaded_file($postImage, "./../posts/$imgName");
            echo json_encode(['The post was uploaded successfully']);
        } else{
            echo json_encode('Something happend, try again');
        }
    } else {
        echo json_encode(['Data it\'s missing']);
    }

}