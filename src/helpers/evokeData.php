<?php
function evokeData ($query) {
    $db = connectDB();
    $stm = $db->query($query);
    $res = [];
    while ($row = $stm->fetch(\PDO::FETCH_ASSOC)){
        $res[] = $row;
    }

    if(isset($res) && !empty($res)) {
        echo json_encode($res);
    } else{
        echo json_encode(['No data']);
    }
}