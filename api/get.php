<?php 
if(!isset($_SESSION)) {
    session_start();
}
function get($params) {

    require './../src/php/db.php';
    $params = explode('/', $params);
    $endpoint = $params[0];
    $query;
    if($endpoint == 'categories' && count($params) == 1) {
        $query = "SELECT category_name from $endpoint";
        evokeData($query);
    }  
    if($endpoint == 'post') {
        $userId;
        isset($params[1]) ?  $userId = $params[1] : $userId = $_SESSION['user-id'];
        $query = "SELECT e.entry_title, e.entry_img, e.entry_content, e.entry_date, c.category_name, e.entry_id from entries e INNER JOIN categories c ON e.entry_category = c.category_id where entry_maker = $userId ";
        evokeData($query);
    }
    
}   


function evokeData ($query) {
    $db = connectDB();
    $res = $db->query($query)->fetchAll();
    
    if(isset($res) && !empty($res)) {
        echo json_encode($res);
    } else{
        echo json_encode(['No data']);
    }
}