<?php
/**
 * Created by PhpStorm.
 * User: Eric Korku Gbekor
 * Date: 7/10/2018
 * Time: 1:21 PM
 */
date_default_timezone_set('Africa/Accra');



//check command
if(!isset($_REQUEST['cmd'])){
    echo "cmd is not provided";
    exit();
}

//get command
$cmd=$_REQUEST['cmd'];
switch($cmd){
    case 1:
        getLogs();
        break;

    default:
        echo "wrong cmd";	//change to json message
        break;
}


function getLogs(){

    include_once("../models/logs.php");
    $logsObj=new logs();
    $logsObj->getAllLogs();
    $details = $logsObj->fetch();

    if($details==true){
//            echo json_encode($details);
        echo '{"result":1,"logs":[';
        while ($details != false) {
            echo json_encode($details);
            $details = $logsObj->fetch();
            if ($details) {
                echo ',';
            }
        }
        echo ']}';
    }else{
        echo '{"result":0,"message":"Please Check your records. No logs added yet"}';
    }
}






?>