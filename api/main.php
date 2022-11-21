<?php 
$endPoint = ($_GET['endPoint']);
$endPointParts = explode('/', $endPoint);
if(count($endPointParts) > 2){
    echo json_encode(['Too much argument']); 
} else{

    $req = $_SERVER["REQUEST_METHOD"];

    if($req == 'GET') {
        require './get.php';
        get($endPoint);
        // get($res);
    } else if($req == 'POST'){

    } else if($req == 'PUT'){

    } else {

    }
}
