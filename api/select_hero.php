<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

$hero_id = cleanPost('hero_id', false, true);

if($hero_id != false){
    // Imame dannite
    if($logged_user != false){
        $user_id = $logged_user['user_id'];

        $hero = $db->getHero($hero_id);

        if($hero != false){
            $operation = $db->setHero($user_id, $hero_id);

            if($operation){
                // Succes
                $response['status'] = "success";
            }else{
                $response['status'] = "error";
                $response['error_details'] = "unexpected_error";
            }
        }else{
            $response['status'] = "error";
            $response['error_details'] = "bad_hero_id";
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