<?php

session_start();

include("module/connection.php");


if(!isset($_REQUEST['_submit'])){
    if(!isset($_REQUEST['_route'])){
        session_destroy();
        require "frame/login.php";
    }else{

        switch($_REQUEST['_route']){

            case"login";
            
            break;
    
            
    
        }

    }
}else{
    switch($_REQUEST['_submit']){

        case"login";
        
        break;



    }
}
?>