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
            addItem();		//if cmd=0 call to add category
            break;
        case 1:
            getItems();
            break;
        case 2:
            deleteItem();		//if cmd=1 the call delete
            break;
        case 3:
            getItem();	//if cmd=2 the change status
            break;
        case 4:
            editItem();	//if cmd=3 list users
            break;
        default:
            echo "wrong cmd";	//change to json message
            break;
    }

function addItem(){
//        echo "inside if passed";
        $item_code = $_REQUEST['code'];
        $category = $_REQUEST['category'];
        $condition = $_REQUEST['item_condition'];
        $location = $_REQUEST['item_location'];
        $status = $_REQUEST['status'];
        $comments = $_REQUEST['comments'];
        $created_at = date('Y-m-d h:i:s ');

        include_once("../models/items.php");
        $itemsCatObj=new items();
        $r=$itemsCatObj->addItem($item_code,$category,$condition,$location, $status, $comments, $created_at);


        //1) what is the purpose of this if block
        if($r==false){
            echo '{"result":0,"message":"error while adding user"}';
        }else{
            echo '{"result":1, message":"user added successfully"}';
        }

}

	function getItems(){

        include_once("../models/items.php");
        $itemsCatObj=new items();
        $itemsCatObj->getAllItems();
        $details = $itemsCatObj->fetch();

        if($details==true){
//            echo json_encode($details);
            echo '{"result":1,"items":[';
            while ($details != false) {
                echo json_encode($details);
                $details = $itemsCatObj->fetch();
                if ($details) {
                    echo ',';
                }
            }
            echo ']}';
        }else{
            echo '{"result":0,"message":"Please Check your records. No Item Categories added Yet"}';
        }
    }

    function getItem()
    {

            $item_code = $_REQUEST['item'];

            include_once("../models/items.php");
            $itemsCatObj = new items();
            $itemsCatObj->getItem($item_code);

            $details = $itemsCatObj->fetch();



            if ($details) {
                echo  json_encode($details);
            } else {
                echo '{"result":0,"message":"Item not found"}';
            }


    }


	function deleteItem(){
        //check if there is a category id
        if(!isset($_REQUEST['item'])){
            echo '{"result":0,"message":"item id is not given"}';
            exit();
        }

        $item_code=$_REQUEST['item'];
        $deleted_at = date('Y-m-d h:i:s ');


        include("../models/items.php");
        $itemsObj = new items();

        //get details of user being deleted
        $item_detail= $itemsObj->getItem($item_code);
//        $category_detail = $itemsCatObj->fetch();
        //print_r($user_detail);

        //delete the user
        if($itemsObj->deleteItem($item_code,$deleted_at)){
            echo json_encode($item_detail);
        }else{
            echo '{"result":0,"message":"user was not deleted"}';
        }
    }

function editItem(){
    //check if there is a category id
    if(!isset($_REQUEST['code'])){
        echo '{"result":0,"message":"item code is not given"}';
        exit();
    }

    $item_code = $_REQUEST['code'];
    $category = $_REQUEST['category'];
    $condition = $_REQUEST['item_condition'];
    $location = $_REQUEST['item_location'];
    $status = $_REQUEST['status'];
    $comments = $_REQUEST['comments'];

    $updated_at = date('Y-m-d h:i:s ');


    include("../models/items.php");
    $itemsObj = new items();

    //get details of user being deleted
    $item_detail= $itemsObj->getItem($item_code);
//        $category_detail = $itemsCatObj->fetch();
    //print_r($user_detail);

    //delete the user
    if($itemsObj->editItem($item_code, $category, $condition, $location, $status, $comments, $updated_at)){
        echo json_encode($item_detail);
    }else{
        echo '{"result":0,"message":"item was not updated"}';
    }
}

?>