<?php require'./../src/helpers/loger.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../src/css/style.css">
    <link rel="stylesheet" href="./../src/css/dashboard.css">
    <title>Games Everywhere - Dashboard</title>
</head>

<?php if($_GET['actions'] == ''){
    require './templates/dashboard.php';
} else if ($_GET['actions'] == 'make-post'){
    require './templates/maker.php';
}  else if($_GET['actions'] == 'edit-profile'){
    require './templates/profile.php';
}
else {
    echo "The url doens't exist try again";
}