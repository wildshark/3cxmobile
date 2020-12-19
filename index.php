<?php

session_start();

include("control/global.php");
include("module/connection.php");
include("module/element.php");
$conn = connection($config);

if(!isset($_REQUEST['_submit'])){
    if(!isset($_REQUEST['_p'])){
        session_destroy();
        require "frame/login.php";
    }else{
        if((!isset($_COOKIE['token'])) || (!isset($_SESSION['token']))){
            $url["user"] = "log";
            $url['log'] = "off";
            header("location: ?".http_build_query($url));
        }else{
            switch($_REQUEST['_p']){

                case"dashboard";
                    $context = "view/file.main.php";
                    require("frame/table.php");
                break;

                case"upload";
                    $context = "view/upload.php";
                    require("frame/form.php");
                break;

                case"file";
                    $file = hex2bin($_GET['file']);
                    $file = explode("/",$file);
                    $id = $file[0];
                    $file_name= $file[1];
                    $date = $file[2];
                    $context = "view/file.details.php";
                    require("frame/table.php");
                break;
            }
        }   
    }
}else{
    switch($_REQUEST['_submit']){

        case"login";
            $token = uniqid(); // liecnse($config);
            $_SESSION['token'] = $token['data'];
            if($token == false){
                echo "license error";
            }else{
                $q[] = $_REQUEST['username'];
                $q[] = $_REQUEST['password'];
                $sql ="SELECT * FROM `get_user_account` WHERE `username`=? AND `password`=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss",$q[0],$q[1]);
        
                $stmt->execute();
                
                $result = $stmt->get_result();
                if($result->num_rows == 0){
                    session_destroy();
                    require "frame/login.php";
                } else{
                    $r = $result->fetch_assoc();
                    $_SESSION['user_id'] = $r['user_token'];
                    setcookie("token", $token['data'], time()+3600);
                    setcookie("username", $_REQUEST['username']);
                    setcookie("user_id", $r['user_id']);
                    $url['_p'] = "dashboard";
                    $url['token'] = $_SESSION['token'];
                    $url['e']=200;
                }
            }        
        break;

        case"upload";
        echo $q[] = $_COOKIE['user_id'];
        exit();
        
        $q[] = $_REQUEST['file-name'];
        $q[] = $_FILES["file"]["tmp_name"];
        $q[] = date("Y-m-d H:i:s");
        $sql="INSERT INTO `mobile_file`(`user_id`, `file`) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$q[0],$q[1]);
        
        if(false == $stmt->execute()){
            $url['_p'] = "upload";
            $url['token'] = $_SESSION['token'];
            $url['e']=400;
        }else{
            $file_id = $conn->insert_id;
            $user_id = $_SESSION['user_id'];
            $filename=$_FILES["file"]["tmp_name"];    
            if($_FILES["file"]["size"] > 0){
                $result = import_cvs_to_msysql($conn,$filename,$file_id,$user_id);

                if(true !== $result){
                    $url['_p'] = "dashboard";
                    $url['token'] = $_SESSION['token'];
                    $url['e']=400;
                   // echo "<script type=\"text/javascript\">
                    //    alert(\"Invalid File:Please Upload CSV File.\");
                    //    window.location = \"index.php\"
                    //    </script>"; 

                }else {
                    $url['_p'] = "upload";
                    $url['file'] = $_REQUEST['file-name'];
                    $url['id'] = $file_id;
                    $url['token'] = $_SESSION['token'];
                    $url['e']=200;
                   // echo "<script type=\"text/javascript\">
                  //  alert(\"CSV File has been successfully Imported.\");
                   // window.location = \"index.php\"
              //  </script>";
                }

                fclose($file);  
            }
        }
        break;

        case"delete-file";
            $id = $_REQUEST['id'];
            $sql = "DELETE FROM `mobile_file` WHERE `file_id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$id);
    
            $file = $stmt->execute();

            $sql = "DELETE FROM `mobile` WHERE `id` =?";
            $stmt = $conn->prepare($sql);
            $mobile = $stmt->bind_param("i",$id);
    
            if((false == $file) && (false == $mobile)){
                $url['_p'] = "dashboard";
                $url['token'] = $_SESSION['token'];
                $url['e']=400;
            }else{
                $url['_p'] = "dashboard";
                $url['token'] = $_SESSION['token'];
                $url['e']=200;
            } 
        break;

        case"delete-mobile";
            $id = $_REQUEST['id'];
            $sql = "DELETE FROM `mobile` WHERE `id` =?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$id);

            if(false == $stmt->execute()){
                $url['_p'] = "dashboard";
                $url['token'] = $_SESSION['token'];
                $url['e']=400;
            }else{
                $url['_p'] = "file";
                $url['file'] = $_REQUEST['file'];
                $url['token'] = $_SESSION['token'];
                $url['e']=200;
            } 
        break;

        case"delete-upload";
        $id = $_REQUEST['mobile'];
        $sql = "DELETE FROM `mobile` WHERE `id` =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$id);

        if(false == $stmt->execute()){
            $url['_p'] = "dashboard";
            $url['token'] = $_SESSION['token'];
            $url['e']=400;
        }else{
            $url['_p'] = "upload";
            $url['file'] = $_SESSION['file'];
            $url['id'] = $_SESSION['id'];
            $ur['mobile'] = $_REQUEST['mobile'];
            $url['token'] = $_SESSION['token'];
            $url['e']=200;
        } 
    break;
    }
    header("location: ?".http_build_query($url));
}
CloseConn($conn);
?>