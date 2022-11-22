<?php 
function deleter ($endpoint) {
    $params = explode('/', $endpoint);
    if (count($params) ==2 && $params[0] == 'post' && is_int(intval($params[1]))){
        require './../src/helpers/db.php';
        $db = connectDB();
        $id = $params[1];
        $query = "SELECT entry_img from entries where entry_id = $id";
        $imgUrl = $db->query($query)->fetch();
        if($imgUrl) {
            $res = unlink("./../posts/$imgUrl");
            if($res) {
                $query = "DELETE FROM entries where entry_id = $id";
                $db->query($query);
                echo json_encode(['The post has been deleted successfully']);
            } else {
                echo json_encode(['Something went wrong, please try again']);
            }
        } else {
            echo json_encode(['The id is invalid']);
        }
    } else{
        echo json_encode(['The id its missing or you don\'t have permission']);
    }
}