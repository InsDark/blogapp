<?php 
$endPoint = ($_GET['endPoint']);
$endPointParts = explode('/', $endPoint);
if(count($endPointParts) > 2){
    echo json_encode(['Too much argument']); 
} else{

    $req = $_SERVER["REQUEST_METHOD"];

    if($req == 'GET') {
        require './methods/get.php';
        get($endPoint);
    } else if($req == 'POST'){
        require './methods/post.php';
        post($endPoint);
    } else if($req == 'PATCH'){

    } else {

    }
}
