<?php 
if(!isset($_SESSION)) {
    session_start();
}
function get($params) {
    require './../src/helpers/db.php';
    require './../src/helpers/evokeData.php';
    $params = explode('/', $params);
    $endpoint = $params[0];
    $query;
    if($endpoint == 'categories' && count($params) == 1) {
        $query = "SELECT category_name from $endpoint";
        evokeData($query);
    }  

    else if ($endpoint == 'post' && count($params) == 1) { 
        $query = "SELECT u.user_name, u.user_last_name, e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id INNER JOIN users u on e.entry_maker = u.user_id ORDER BY entry_id DESC LIMIT 5";
        evokeData($query);
    }

    else if ($endpoint == 'post' && !is_integer(intval($params[1])) && $params[1] !== 'user') {
        $category = $params[1];
        if($category == 'Action' || $category == 'Puzzle' ||  $category == 'Sports' || $category == 'RPGs' || $category == 'Simulation' || $category == 'Strategy') {
            $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id WHERE c.category_name = '$category'";
            evokeData($query);
        } else{
            echo json_encode(['The category does not exist']);
        }
    } 
    
    else if($endpoint == 'post' && is_int(intval($params[1])) && intval($params[1]) != 0){
        $postId = intval($params[1]);
        $query = "SELECT u.user_name, u.user_last_name, e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_id, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id INNER JOIN users u ON e.entry_maker = u.user_id WHERE entry_id = $postId ";
        evokeData($query);
    }

    else if($endpoint == 'post' && $params[1] == 'user') {
        $userId;
        if(isset($_SESSION['user-id'])) {
            $userId = $_SESSION["user-id"];
            $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id where entry_maker = $userId ORDER BY entry_id DESC";
            evokeData($query);
        } else {
            echo json_encode(['The user is not logged in']);
        }
    } else if($endpoint == 'posts') {
        $max = intval($params[1]);
        $min = $max - 5;
        $query = "SELECT u.user_name, u.user_last_name, e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id INNER JOIN users u on e.entry_maker = u.user_id WHERE entry_id BETWEEN $min AND $max ORDER BY entry_id desc";
        evokeData($query);
        // echo json_encode([$max]);
    }

    else{
        echo json_encode(['The endpoint does not exist']);
    }
    
}   