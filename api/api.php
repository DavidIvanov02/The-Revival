<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../core/init.php';

$response = [];

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(empty($email) && empty($password))
    {
        $response['status'] = "error";
        $response['error_details'] = "missing_details";
    }
    
    if(!isset($response['status'])){
        $password = hash('sha256',$password);
    	$user = $db->getUser($email, $password);
    	
    	if($user != false)
    	{

    	    unset($user['password']);

    	    $response['status'] = "success";
    	    $response['user'] = $user;
    	    
    	}
    	
    	else
    	{
    	    $response['status'] = "error";
    	    $response['error_details'] = "failed_login";
    	}
    	
    }

}

else
{ 
    $response['status'] = 'error';
    $response['error_details'] = 'missing_data';
}

header('Content-Type: application/json');
echo json_encode($response);
?>