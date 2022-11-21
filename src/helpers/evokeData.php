<?php
function evokeData ($query) {
    $db = connectDB();
    $res = $db->query($query)->fetchAll();
    
    if(isset($res) && !empty($res)) {
        echo json_encode($res);
    } else{
        echo json_encode(['No data']);
    }
}