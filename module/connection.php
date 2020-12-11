<?php

if(!file_exists("config.json")){
    echo"Missing configuration file";
}else{
    $config = json_decode(file_get_contents("config.json"),true);
}

function liecnse($config){

    $postdata = array(
        "q"=>"check-license",
        "token"=> $config['cerificate']['token'],
        "license"=> $config['cerificate']['license'],
        "serverip"=> md5($_SERVER['SERVER_ADDR'])
    );

    $url =array(
        'stage'=>"http://localhost/church2/api/?",
        'producation'=>"http://mdata37.herokuapp.com/api/?",
        'live' =>"https://bankio.ml/app_license/?"
    );

    $ssl = array(//ssl 
        "verify_peer" => false,
        "allow_self_signed" => true,
    );

    $http = array(
        'method'=>"POST",
        'header'=>
        "Accept-language: en\r\n".
        "Content-type: application/x-www-form-urlencoded\r\n",
        'content'=>http_build_query($postdata));

    $options = array(
        'ssl' => $ssl,
        'http'=>$http
    );
      
    $context = stream_context_create($options);
      
    $request = fopen($url['live'],'rb',false,$context);
    $response = stream_get_contents($request);
    $result = json_decode($response,true);

    return $result;

}

function connection($config){
    $db = $config['db_connection'];

    $servername = $db['host'];
    $username = $db['username'];
    $password = $db['password'];
    $database = $db['database'];
    $port = $db['port'];
// Create connection
    $conn = new mysqli($servername, $username, $password, $database,$port);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        return $conn;
    }
}

function CloseConn($conn){

    return $conn->close(); 
}

?>