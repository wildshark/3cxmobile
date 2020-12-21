<?php

function total_user($conn){

    $sql ="SELECT COUNT(user_id) as total from get_user_account";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i",$r[0]);

     $stmt->execute();
     
     $result = $stmt->get_result();
     if($result->num_rows == 0){
        return 0;
     } else{
        $r = $result->fetch_assoc();
        return $r['total'] - 1;
    }
}

function total_active_user($conn){
    
    $sql ="SELECT COUNT(user_id) as total FROM get_user_account WHERE active=1";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i",$r[0]);

     $stmt->execute();
     
     $result = $stmt->get_result();
     if($result->num_rows == 0){
        return 0;
     } else{
        $r = $result->fetch_assoc();
        return $r['total'] - 1;
    }
}

function total_passive_user($conn){
    
    $sql ="SELECT COUNT(user_id) as total FROM get_user_account WHERE active <> 1";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i",$r[0]);

     $stmt->execute();
     
     $result = $stmt->get_result();
     if($result->num_rows == 0){
        return 0;
     } else{
        $r = $result->fetch_assoc();
        return $r['total'];
    }
}


?>