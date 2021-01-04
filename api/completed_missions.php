<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

if($logged_user != false)
{
    $user_id = $logged_user["user_id"];

    $missions = $db->missionsCompleted($user_id);

        if($missions != false){
            
            $response['status'] = "success";
            $response['missions'] = $missions;
        }
        
        else
        {
            $response['status'] = "error";
            $response['error_details'] = "no missions completed";
        }
}

else
{
    $response['status'] = "error";
    $response['error_details'] = "not_logged";
}


respond($response);