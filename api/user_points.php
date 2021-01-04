<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

$user_points = cleanPost('user_points', false, true);

if($user_points != false){
    if($logged_user != false){
        $user_id = $logged_user['user_id'];

        $points = $db->getUserById($user_id);

        if($points != false){
            $operation = $db->setPoints($user_id, $user_points);

            if($operation){
                $response['status'] = "success";
            }else{
                $response['status'] = "error";
                $response['error_details'] = "unexpected_error";
            }
        }else{
            $response['status'] = "error";
            $response['error_details'] = "bad_user_points";
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