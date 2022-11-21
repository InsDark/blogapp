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
        $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id LIMIT 1";
            evokeData($query);
    }

    else if ($endpoint == 'post' && $params[1] !== '' && $params[1] !== 'user') {
        $category = $params[1];
        if($category == 'Action' || $category == 'puzzle' ||  $category == 'Sports' || $category == 'RPGs' || $category == 'Simulation' || $category == 'Strategy') {
            $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id WHERE c.category_name = '$category'";
            evokeData($query);
        } else{
            echo json_encode(['The category does not exist']);
        }
    }

    else if($endpoint == 'post' && $params[1] =='user') {
        $userId;
        if(isset($_SESSION['user-id'])) {
            $userId = $_SESSION["user-id"];
            $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id where entry_maker = $userId LIMIT 4 ";
            evokeData($query);
        } else {
            echo json_encode(['The user is not logged in']);
        }
    } 
    else{
        echo json_encode(['The endpoint does not exist']);
    }
    
}   