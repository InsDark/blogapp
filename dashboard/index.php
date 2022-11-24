<?php require'./../src/helpers/loger.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Everywhere - Dashboard</title>
</head>

<?php 
$params = explode('/', $_GET['actions']);
if($_GET['actions'] == ''){
    require './templates/dashboard.php';
} else if ($_GET['actions'] == 'make-post'){
    require './templates/maker.php';
}  else if($_GET['actions'] == 'edit-profile'){
    require './templates/profile.php';
} else if($params[0] == 'edit-post' && count($params) == 2  && $params[1] != '' && intval($params[1]) !== 0)  {
    require './templates/editpost.php';
} else {
    echo json_encode(['404']);
}