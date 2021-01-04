<?php

function Base_url(){
    return 'https://revival.noit.eu/';
}

function cleanPost($key, $default, $expecting_number=false){
    if(isset($_POST[$key])){
        $in = $_POST[$key];

        if($expecting_number){
            if(is_numeric($in)){
                return (int) $in;
            }
        }else{
            return $_POST[$key];
        }
    }
    return $default;
}

function respond($response){
    header("Content-type: application/json");
    echo json_encode($response);
}

?>