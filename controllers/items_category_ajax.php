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
            addItemCategory();		//if cmd=0 call to add category
            break;
        case 1:
            getItemCategories();
            break;
        case 2:
            deleteCategory();		//if cmd=1 the call delete
            break;
        case 3:
            getItemCategory();	//if cmd=2 the change status
            break;
        case 4:
            editItemCategory();	//if cmd=3 list users
            break;
        default:
            echo "wrong cmd";	//change to json message
            break;
    }

function addItemCategory(){
//        echo "inside if passed";
        $category_name = $_REQUEST['category'];
        $quantity = $_REQUEST['quantity'];
        $comments = $_REQUEST['comments'];
        $created_at = date('Y-m-d h:i:s ');

        include_once("../models/items_category.php");
        $itemsCatObj=new items_category();
        $r=$itemsCatObj->addCategory($category_name,$quantity,$comments,$created_at,
            $updated_at='none',$deleted_at='none');


        //1) what is the purpose of this if block
        if($r==false){
            echo '{"result":0,"message":"error while adding user"}';
        }else{
            echo '{"result":1, message":"user added successfully"}';
        }

}

	function getItemCategories(){

//        $user = $_SESSION['USER']['firstname'] . " ". $_SESSION['USER']['lastname'];
//        echo $user;


        include_once("../models/items_category.php");
        $itemsCatObj=new items_category();
        $itemsCatObj->getAllCategories();
        $details = $itemsCatObj->fetch();

        if($details==true){
//            echo json_encode($details);
            echo '{"result":1,"categories":[';
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

    function getItemCategory()
    {

            $category_id = $_REQUEST['category'];

            include_once("../models/items_category.php");
            $itemsCatObj = new items_category();
            $itemsCatObj->getCategory($category_id);

            $details = $itemsCatObj->fetch();



            if ($details) {

                echo  json_encode($details);
            } else {
                echo '{"result":0,"message":"Item not found"}';
            }


    }


	function deleteCategory(){
        //check if there is a category id
        if(!isset($_REQUEST['category'])){
            echo '{"result":0,"message":"category id is not given"}';
            exit();
        }

        $category_id=$_REQUEST['category'];
        $deleted_at = date('Y-m-d h:i:s ');


        include("../models/items_category.php");
        $itemsCatObj = new items_category();

        //get details of user being deleted
        $category_detail= $itemsCatObj->getCategory($category_id);
//        $category_detail = $itemsCatObj->fetch();
        //print_r($user_detail);

        //delete the user
        if($itemsCatObj->deleteCategory($category_id,$deleted_at)){
            echo json_encode($category_detail);
        }else{
            echo '{"result":0,"message":"user was not deleted"}';
        }
    }

function editItemCategory(){
    //check if there is a category id
    if(!isset($_REQUEST['category'])){
        echo '{"result":0,"message":"category id is not given"}';
        exit();
    }

    $category_id=$_REQUEST['category'];
    $category_name = $_REQUEST['category_name'];
    $quantity = $_REQUEST['quantity'];
    $comments = $_REQUEST['comments'];

    $updated_at = date('Y-m-d h:i:s ');


    include("../models/items_category.php");
    $itemsCatObj = new items_category();

    //get details of user being deleted
    $category_detail= $itemsCatObj->getCategory($category_id);
//        $category_detail = $itemsCatObj->fetch();
    //print_r($user_detail);

    //delete the user
    if($itemsCatObj->editCategory($category_id,$category_name, $quantity, $comments, $updated_at)){
        echo json_encode($category_detail);
    }else{
        echo '{"result":0,"message":"user was not deleted"}';
    }
}


?>