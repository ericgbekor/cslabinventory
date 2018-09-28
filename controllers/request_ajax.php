<?php
/**
 * Created by PhpStorm.
 * User: Eric Korku Gbekor
 * Date: 7/10/2018
 * Time: 1:21 PM
 */
date_default_timezone_set('Africa/Accra');

session_start();



//check command
	if(!isset($_REQUEST['cmd'])){
        echo "cmd is not provided";
        exit();
    }

	//get command
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
        case 0:
            addComment();		//if cmd=0 call to add category
            break;
        case 1:
            getRequests();
            break;
        case 2:
            deleteItem();		//if cmd=1 the call delete
            break;
        case 3:
            getRequest();	//if cmd=2 the change status
            break;
        case 4:
            editItem();	//if cmd=3 list users
            break;

        case 5:
            getRequestDetail();	//if cmd=3 list users
            break;

        case 6:
            approveRequest();	//if cmd=3 list users
            break;

        case 7:
            declineRequest();	//if cmd=3 list users
            break;

        case 8:
            getApprovedRequests();	//if cmd=3 list users
            break;

        case 10:
            addRequest();	//if cmd=3 list users
            break;

        case 11:
            searchRequest();	//if cmd=3 list users
            break;

        case 12:
            check_in();	//if cmd=3 list users
            break;

        case 13:
            check_out();	//if cmd=3 list users
            break;
        default:
            echo "wrong cmd";	//change to json message
            break;
    }

function addComment(){
//        echo "inside if passed";
        $request_id = $_REQUEST['request_id'];
        $comments = $_REQUEST['comments'];
        $updated_at = date('Y-m-d h:i:s ');

        include_once("../models/request.php");
        $requestObj=new request();
        $r=$requestObj->addComment($request_id,$comments, $updated_at);


        //1) what is the purpose of this if block
        if($r==false){
            echo '{"result":0,"message":"error while adding comment"}';
        }else{
            echo '{"result":1, message":"comment added successfully"}';
        }

}

	function getRequests(){

        include_once("../models/request.php");
        $requestObj=new request();
        $requestObj->getAllRequests();
        $details = $requestObj->fetch();

        if($details==true){
//            echo json_encode($details);
            echo '{"result":1,"requests":[';
            while ($details != false) {
                echo json_encode($details);
                $details = $requestObj->fetch();
                if ($details) {
                    echo ',';
                }
            }
            echo ']}';
        }else{
            echo '{"result":0,"message":"Please Check your records. No Item Categories added Yet"}';
        }
    }

function getApprovedRequests(){

    include_once("../models/request.php");
    $requestObj=new request();
    $requestObj->getApprovedRequest();
    $details = $requestObj->fetch();

    if($details==true){
//            echo json_encode($details);
        echo '{"result":1,"requests":[';
        while ($details != false) {
            echo json_encode($details);
            $details = $requestObj->fetch();
            if ($details) {
                echo ',';
            }
        }
        echo ']}';
    }else{
        echo '{"result":0,"message":"Please Check your records. No Approved Requests Yet"}';
    }
}

    function getRequest()
    {

            $request_id = $_REQUEST['request_id'];

            include_once("../models/request.php");
            $requestObj = new request();
            $requestObj->getRequest($request_id);

            $details = $requestObj->fetch();



            if ($details) {
                echo  json_encode($details);
            } else {
                echo '{"result":0,"message":"Item not found"}';
            }


    }

    function getRequestDetail(){

	    $request_id = $_REQUEST['request_id'];

	    include_once("../models/request.php");
        $requestObj = new request();
        $requestObj->getRequestDetail($request_id);

        $details = $requestObj->fetch();



        if ($details) {
            echo  json_encode($details);
        } else {
            echo '{"result":0,"message":"Item not found"}';
        }

    }

    function approveRequest(){
        $request_id = $_REQUEST['request_id'];

        include_once("../models/request.php");
        include_once ("./mail.php");
        $requestObj = new request();
        $requestObj->getRequestDetail($request_id);
        $details = $requestObj->fetch();

        $email = $details['email'];
        $name = $details['fullname'];

        if ($details['request_status']=='pending'){
            $approveDetails = $requestObj->approveRequest($request_id);


            if ($approveDetails){
                $mail = new mail();
                $mail->approveRequestMail($email,$request_id,$name);
                echo  json_encode($approveDetails);
        } else {
            echo '{"result":0,"message":"Error...appproval unsuccessful"}';
        }

            }
        else {
            echo '{"result":0,"message":"Check the request status. Request not pending"}';

        }

    }

function declineRequest(){
    $request_id = $_REQUEST['request_id'];

    include_once("../models/request.php");
    include_once ("./mail.php");
    $requestObj = new request();
    $requestObj->getRequestDetail($request_id);
    $details = $requestObj->fetch();

    $email = $details['email'];
    $name = $details['fullname'];

    if ($details['request_status']=='pending'){
        $declineDetails = $requestObj->declineRequest($request_id);


        if ($declineDetails){
            $mail = new mail();
            $mail->declineRequestMail($email,$request_id,$name);
            echo  json_encode($declineDetails);
        } else {
            echo '{"result":0,"message":"Error...decline unsuccessful"}';
        }

    }
    else {
        echo '{"result":0,"message":"Check the request status. Request not pending"}';

    }

}


function addRequest(){

    $requestid = getToken(5);


    $name  = $_REQUEST['name'];
    $email  = $_REQUEST['email'];
    $phone  = $_REQUEST['phone'];
    $usergroup = $_REQUEST['usergroup'];
    $department  = $_REQUEST['department'];
    $item  = $_REQUEST['item_needed'];
    $reason = $_REQUEST['reason'];
    $needed = $_REQUEST['needed'];
    $return = $_REQUEST['returned'];

    $created_at = date('Y-m-d h:i:s');

    include_once("../models/request.php");
    include_once ('./mail.php');
    $requestObj=new request();
    $r=$requestObj->addRequest($requestid,$name,$email,$phone,$usergroup,$department,$item,$reason,$needed,$return,$created_at);

    if($r==false){
        echo '{"result":0,"message":"error while adding user"}';
    }else{
        $mail = new mail();
        $mail->requestConfirmation($email,$requestid,$name);

        echo '{"result":1, "message":"Request has been forwarded. Please use this request ID: '.$requestid.' to track your request on the system."}';
    }

}

function getToken($length){
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }

    return $token;
}

function searchRequest(){
    if(!isset($_REQUEST['search'])){
        echo '{"result":0,"message":"search item is not given"}';
        exit();
    }

    $search=$_REQUEST['search'];
//    $deleted_at = date('Y-m-d h:i:s ');


    include_once("../models/request.php");
    $reqObj = new request();

    //get details of user being deleted
    $reqObj->searchRequest($search);
    $req_detail= $reqObj->fetch();

    //delete the user
    if($req_detail){
        echo json_encode($req_detail);
    }else{
        echo '{"result":0,"message":"search result not gotten"}';
    }


}

function check_in(){
    $user = $_SESSION['USER']['firstname'] . " ". $_SESSION['USER']['lastname'];
    if(!isset($_REQUEST['returned'])){
        echo '{"result":0,"message":"name of receiver is not given"}';
        exit();
    }

    $returned_by = $_REQUEST['returned'];
    $item_code = $_REQUEST['itemcode'];
    $request_id = $_REQUEST['request_id'];
    $returned_at = date('Y-m-d h:i:s ');
    $updated_at = date('Y-m-d h:i:s ');
    $activity = $user.' checked in item '.$item_code;


    include_once("../models/request.php");
    $reqObj = new request();
    include_once("../models/logs.php");
    $userLog = new logs();


        //get details of user being deleted
        $req_detail = $reqObj->checkIn($request_id,$item_code,$returned_by, $returned_at, $updated_at);

        $userLog -> logActivity($returned_at, $item_code, $activity, $user);

        //delete the user
        if($req_detail){
            echo json_encode($req_detail);
        }else{
            echo '{"result":0,"message":"check in unsuccessful"}';
        }



}


function check_out(){
    $user = $_SESSION['USER']['firstname'] . " ". $_SESSION['USER']['lastname'];

    if(!isset($_REQUEST['received'])){
        echo '{"result":0,"message":"name of receiver is not given"}';
        exit();
    }

    $checked_by = $_REQUEST['received'];
    $item_code = $_REQUEST['itemcode'];
    $request_id = $_REQUEST['request_id'];
    $checked_at = date('Y-m-d h:i:s ');
    $updated_at = date('Y-m-d h:i:s ');
    $activity = $user. ' checked out item '.$item_code;


    include_once("../models/request.php");
    include_once("../models/checkedout.php");
    include_once("../models/logs.php");

    $userLog = new logs();
    $reqObj = new request();
    $reqObj->getRequestDetail($request_id);
    $details = $reqObj->fetch();
    print_r($details['request_status']);

    if ($details['request_status']=='approved') {

        //get details of user being deleted
        $req_detail = $reqObj->checkOut($request_id, $item_code, $checked_by, $checked_at, $updated_at);
        $userLog -> logActivity($checked_at, $item_code, $activity, $user);


        //delete the user
        if ($req_detail) {
            echo json_encode($req_detail);
        } else {
            echo '{"result":0,"message":" checkout unsuccessful"}';
        }
    }
    else{
        echo '{"result":0,"message":"check out unsuccessful...request not approved"}';

    }

}

?>