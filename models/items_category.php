<?php
/**
 * Created by PhpStorm.
 * User: Eric Korku Gbekor
 * Date: 7/10/2018
 * Time: 11:52 AM
 */


/**
 */
include_once("database.php");

/**
 *Users  class
 */
class items_category extends database {

    /**
     *constructor
     */
    function __construct(){
    }

    /**
     *Adds a new user
     *@param string username login name
     *@param string password login password
     *@param string firstname first name
     *@param string lastname last name
     *@param int usergroup group id
     *@param string status status of the user account
     *@param string permission permission as an int
     *@return boolean returns true if successful or false
     */
    function addCategory($category_name,$quantity,$comments='none',$created_at,
                     $updated_at='none',$deleted_at='none'){

        $strQuery="INSERT INTO items_category SET
					category_name = '$category_name',
					quantity_available = '$quantity',
					comments = '$comments',
					created_at = '$created_at',
					updated_at = '$updated_at', 
					deleted_at = '$deleted_at'";
        return $this->query($strQuery);
    }

    /**
     *gets user records based on the filter
     *@param string mixed condition to filter. If  false, then filter will not be applied
     *@return boolean true if successful, else false
     */
    function getAllCategories($filter=false){
        $strQuery="SELECT category_id, category_name, quantity_available, comments, created_at, updated_at, deleted_at
					FROM items_category where deleted_at = '0000-00-00 00:00:00' ";

        if($filter){
            $strQuery=$strQuery . " and $filter";
        }
        return $this->query($strQuery);
//        return $this->fetch();
    }

    // finding a specific item_category

    function getCategory($category_id){
        $filter="category_id = $category_id";

//        if(!$this->getAllCategories($filter)){
//            return false;
//        }
//
//        return $this->fetch();

        return $this->getAllCategories($filter);
    }


    /**
     *delete user
     *@param int usercode the user code to be deleted
     *returns true if the user is deleted, else false
     */
    function deleteCategory($category_id, $date){
//        $strQuery = "DELETE FROM items_category WHERE category_id = '$category_id' ";

        // soft delete
        $strQuery = "UPDATE items_category SET deleted_at = '$date'
                      WHERE category_id='$category_id' ";

        return $this->query($strQuery);
    }


    /**
     *edit user
     *@param int category_id the user code to be updated
     *returns true if the category is updated, else false
     */
    function editCategory($category_id,$category_name,$quantity,$comments='none',$updated_at){
        $strQuery = "UPDATE items_category SET
						category_name = '$category_name',
						quantity_available = $quantity,
						comments = '$comments',
						updated_at = '$updated_at'
						WHERE category_id = '$category_id' ";

        return $this->query($strQuery);
    }


    /**
     *Searches for user by username, fristname, lastname
     *@param string text search text
     *@return boolean true if successful, else false
     */
//    function searchUsers($text=false, $groupID=false){
//        $filter=false;
//
//        if($text){
//            $filter = " username like '%$text%' or firstname like '%$text%' or lastname like '%$text%' ";
//        }
//
//        if($groupID){
//            $filter = " usergroup = $groupID";
//        }
//
//        if($text && $groupID){
//            $filter = " (username like '%$text%' or firstname like '%$text%' or lastname like '%$text%') and (usergroup = '$groupID')";
//        }
//
//        return $this->getUsers($filter);
//    }



    /**
     *edit user
     *@param int usercode the user code to be updated
     *returns true if the user is updated, else false
     */
//    function editUser($usercode,$username,$firstname,$lastname,$password,$usergroup,$permission,$status){
//        $strQuery = "UPDATE sweb_user SET
//						username = '$username',
//						password = MD5('$password'),
//						firstname = '$firstname',
//						lastname = '$lastname',
//						usergroup = '$usergroup',
//						status = '$status',
//						permission = '$permission'
//						WHERE user_id = '$usercode' ";
//
//        return $this->query($strQuery);
//    }


    /**
     *change a user status
     *@param int usercode the user  to change  status
     *@param string status the status to be changed
     *returns true if the user status is changed, else false
     */
//    function changeUserStatus($usercode,$status){
//        $strQuery = "UPDATE sweb_user SET status = '$status'
//				    WHERE user_id = '$usercode' ";
//
//        return $this->query($strQuery);
//    }

}
?>