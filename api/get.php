<?php if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require './../src/php/db.php';
    $req = $_GET['req'];
    $query;
    if($req == 'categories'){
        $query = "SELECT category_name from $req";
    } else if ($req = 'post') {
        $query = 'SELECT * from entries';
    }
    $db = connectDB();
    $res = $db->query($query)->fetchAll();
    if(isset($res) && !empty($res)) {
        echo json_encode($res);
    } else{
        echo json_encode(['Shomething went wrong']);
    }
}