<?php

if(!file_exists("config.json")){
    echo"Missing configuration file";
}else{
    $config = json_decode(file_get_contents("config.json"),true);
}

function liecnse($config){

}

function connection($config){

}
?>