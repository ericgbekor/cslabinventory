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
class items extends database {

    /**
     *constructor
     */
    function __construct(){
    }


    /**
     *Adds a new item
     *@param string item_code item code
     *@param string category category of item
     *@param string password login password
     *@param string email login email
     *@param string status status of the user account
     *@param datetime created_at datetime of user creation
     *@param datetime updated_at datetime of user update
     *@param datetime deleted_at datetime of user delete
     *@return boolean returns true if successful or false
     */
    function addItem($item_code,$category,$condition,$location, $status, $comments, $created_at,
                     $updated_at='none',$deleted_at='none'){

        $strQuery="INSERT INTO items SET
					item_code = '$item_code',
					item_category = '$category',
					item_condition = '$condition',
					location = '$location',
					status = '$status',
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
    function getAllItems($filter=false){
        $strQuery="SELECT a.item_code, a.item_category, b.category_name,a.item_condition,a.location,a.status,a.comments,a.created_at,a.updated_at, a.deleted_at
                  FROM items a inner join items_category b on a.item_category = b.category_id where a.deleted_at = '0000-00-00 00:00:00'";

        if($filter){
            $strQuery=$strQuery . " and $filter";
        }
        return $this->query($strQuery);
//        return $this->fetch();
    }

    // finding a specific item_category

    function getItem($item_code){
        $filter="item_code = '$item_code'";

//        if(!$this->getAllCategories($filter)){
//            return false;
//        }
//
//        return $this->fetch();

        return $this->getAllItems($filter);
    }


    /**
     *delete user
     *@param int usercode the user code to be deleted
     *returns true if the user is deleted, else false
     */
    function deleteItem($item_code, $date){
//        $strQuery = "DELETE FROM items_category WHERE category_id = '$category_id' ";

        // soft delete
        $strQuery = "UPDATE items SET deleted_at = '$date'
                      WHERE item_code='$item_code' ";

        return $this->query($strQuery);
    }


    /**
     *edit user
     *@param int category_id the user code to be updated
     *returns true if the category is updated, else false
     */
    function editItem($item_code,$category,$condition,$location, $status, $comments,$updated_at){
        $strQuery = "UPDATE items SET
						item_code = '$item_code',
						item_category = '$category',
						item_condition = '$condition',
						location = '$location',
					    status = '$status',
					    comments = '$comments',
						updated_at = '$updated_at'
						WHERE item_code = '$item_code'";

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