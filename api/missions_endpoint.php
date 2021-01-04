<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

$mission_id = cleanPost('mission_id', false, true);

if($mission_id != false){

    if($logged_user != false){
        $user_id = $logged_user['user_id'];

        $mission = $db->getMission($mission_id);

        if($mission != false){
            $operation = $db->insertMissionByUser($mission_id, $user_id);

            if($operation){
                $response['status'] = "success";
            }else{
                $response['status'] = "error";
                $response['error_details'] = "unexpected_error";
            }
        }else{
            $response['status'] = "error";
            $response['error_details'] = "bad_mission_id";
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