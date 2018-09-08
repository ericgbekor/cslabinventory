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
        case 0:
            addUser();		//if cmd=0 call to add category
            break;
        case 1:
            getUsers();
            break;
        case 2:
            deleteUser();		//if cmd=1 the call delete
            break;
        case 3:
            getUser();	//if cmd=2 the change status
            break;
        case 4:
            editUser();	//if cmd=3 list users
            break;
        case 5:
            changeUserStatus();	//if cmd=3 list users
            break;
        default:
            echo "wrong cmd";	//change to json message
            break;
    }

function addUser() {
//        echo "inside if passed";
//        $user_id = $_REQUEST['user_id'];
        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $status = 'enabled';
        $created_at = date('Y-m-d h:i:s ');

        include_once("../models/users.php");
        $userObj=new users();
        $r=$userObj->addUser($firstname,$lastname,$email,$password, $status, $created_at,$updated_at='none',$deleted_at='none');


        //1) what is the purpose of this if block
        if($r==false){
            echo '{"result":0,"message":"error while adding user"}';
        }else{
            echo '{"result":1, message":"user added successfully"}';
        }

}

	function getUsers(){

        include_once("../models/users.php");
        $itemsCatObj=new users();
        $itemsCatObj->getAllUsers();
        $details = $itemsCatObj->fetch();

        if($details==true){
//            echo json_encode($details);
            echo '{"result":1,"users":[';
            while ($details != false) {
                echo json_encode($details);
                $details = $itemsCatObj->fetch();
                if ($details) {
                    echo ',';
                }
            }
            echo ']}';
        }else{
            echo '{"result":0,"message":"Please Check your records. No users added yet"}';
        }
    }

    function getUser()
    {

            $user_id = $_REQUEST['user_id'];

            include_once("../models/users.php");
            $itemsCatObj = new users();
            $itemsCatObj->getUser($user_id);

            $details = $itemsCatObj->fetch();

            if ($details) {
                echo  json_encode($details);
            } else {
                echo '{"result":0,"message":"Item not found"}';
            }


    }


	function deleteUser(){
        //check if there is a category id
        if(!isset($_REQUEST['user_id'])){
            echo '{"result":0,"message":"item id is not given"}';
            exit();
        }

        $user_id=$_REQUEST['user_id'];
        $deleted_at = date('Y-m-d h:i:s ');


        include("../models/users.php");
        $itemsObj = new users();

        //get details of user being deleted
        $user_detail= $itemsObj->getUser($user_id);
//        $category_detail = $itemsCatObj->fetch();
        //print_r($user_detail);

        //delete the user
        if($itemsObj->deleteUser($user_id,$deleted_at)){
            echo json_encode($user_detail);
        }else{
            echo '{"result":0,"message":"user was not deleted"}';
        }
    }

function editUser(){
    //check if there is a category id
    if(!isset($_REQUEST['user_id'])){
        echo '{"result":0,"message":"item code is not given"}';
        exit();
    }

    $user_id = $_REQUEST['user_id'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];

    $updated_at = date('Y-m-d h:i:s ');


    include("../models/users.php");
    $itemsObj = new users();

    //get details of user being deleted
    $user_detail= $itemsObj->getUser($user_id);
//        $category_detail = $itemsCatObj->fetch();
    //print_r($user_detail);

    //delete the user
    if($itemsObj->editUser($user_id, $firstname, $lastname, $email, $updated_at)){
        echo json_encode($user_detail);
    }else{
        echo '{"result":0,"message":"item was not updated"}';
    }
}


	function changeUserStatus(){
        include_once("../models/users.php");
        if(!isset($_REQUEST["user_id"])){
            echo '{"result":0,"message":"user code is not correct"}';
            //echo "0";
            return;
        }
        $usercode=$_REQUEST["user_id"];
        //create an object of users
        $obj=new users();
        // call change status method of user class
        $obj->getUser($usercode);
        $row = $obj->fetch();
//        print_r($row);
        if($row==false){
            echo "0";
            return;
        }
        //if current status is 2 then change it to 1
        if($row["status"]=="enabled"){
            $result=$obj->changeUserStatus($usercode,"disabled");
        }else{
            //esle change status to 2
            $result=$obj->changeUserStatus($usercode,"enabled");
        }

        if($result==false){
            echo "0";
            return false;
        }
        else{
            //return json message
            echo '{"result":1,"message":"status changed"}';

        }

    }


?>