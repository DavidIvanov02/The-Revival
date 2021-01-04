<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

if($logged_user != false)
{
    $user_id = $logged_user["user_id"];

    $items = $db->getUserPurchase($user_id);

        if($items != false){
            
            $response['status'] = "success";
            $response['items'] = $items;
        }
        
        else
        {
            $response['status'] = "error";
            $response['error_details'] = "no purchase item";
        }
}

else
{
    $response['status'] = "error";
    $response['error_details'] = "not_logged";
}


respond($response);