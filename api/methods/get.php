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
        $query = "SELECT MAX(entry_id) FROM entries";
        $db = connectDB();

        $res = $db->query($query)->fetch();
        $max = $res[0];
        $min = $res[0] - 10;
        $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id WHERE e.entry_id BETWEEN $min AND $max ";
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
        $limit = intval($params[1]);
        var_dump($limit);
        $min = $limit - 10;
        $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id WHERE e.entry_id BETWEEN $min AND $limit ";
        evokeData($query);
    }

    else if($endpoint == 'post' && $params[1] == 'user') {
        $userId;
        if(isset($_SESSION['user-id'])) {
            $userId = $_SESSION["user-id"];
            $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id where entry_maker = $userId";
            evokeData($query);
        } else {
            echo json_encode(['The user is not logged in']);
        }
    } 

    else{
        echo json_encode(['The endpoint does not exist']);
    }
    
}   