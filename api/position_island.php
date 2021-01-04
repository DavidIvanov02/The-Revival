<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

$position_x= cleanPost('position_x', false, false);
$position_z= cleanPost('position_z', false, false);
$position_y= cleanPost('position_y', false, false);
$island = cleanPost('island', false, true);


if($position_x != false && $position_z != false && $position_y != false && $island !=false){
    // Imame dannite
    if($logged_user != false){
        $user_id = $logged_user['user_id'];

        $hero = $db->getUserById($user_id);

        if($hero != false){
            $operation = $db->setPosition($user_id, $position_x,$position_z, $position_y, $island);

            if($operation){
                // Succes
                $response['status'] = "success";
            }else{
                $response['status'] = "error";
                $response['error_details'] = "unexpected_error";
            }
        }else{
            $response['status'] = "error";
            $response['error_details'] = "bad_position";
        }
    }else{
        $response['status'] = "error";
        $response['error_details'] = "not_logged";
    }
}else{
    $response['status'] = "error";
    $response['error_details'] = "missing_data";
}

respond($response);
?>