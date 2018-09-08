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
class request extends database {

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

//item_code	item_category	item_condition	location	status	comments	created_at	updated_at	deleted_at
    function addComment($request_id,$comments, $updated_at){

        $strQuery="UPDATE process_request SET
					comments = '$comments',
					updated_at = '$updated_at' where request_id='$request_id'";
        return $this->query($strQuery);
    }


    /**
     *gets user records based on the filter
     *@param string mixed condition to filter. If  false, then filter will not be applied
     *@return boolean true if successful, else false
     */
    function getAllRequests($filter=false){
        $strQuery="SELECT a.request_id, b.request_status, a.checked_out_by, a.item_code, a.checked_out_at, a.returned_by, a.returned_at, a.comments, a.created_at, a.updated_at
                  FROM process_request a inner join requests b on a.request_id = b.request_id where a.deleted_at= '0000-00-00 00:00:00' ";

        if($filter){
            $strQuery=$strQuery . " and $filter";
        }
        return $this->query($strQuery);
//        return $this->fetch();
    }

    // finding a specific item_category

    function getRequest($request_id){
        $filter="request_id = '$request_id'";

//        if(!$this->getAllCategories($filter)){
//            return false;
//        }
//
//        return $this->fetch();

        return $this->getAllRequests($filter);
    }

    function getApprovedRequest(){
        $filter="request_status = 'approved'";

        return $this->getAllRequests($filter);
    }

    function getRequestDetail($request_id){

        $strQuery="SELECT request_id, fullname, email, phone, user_category, category_name as item, department, reason, request_status, date_needed, date_to_return
                  FROM requests a inner join items_category b on a.item_borrowed = b.category_id where request_id = '$request_id' ";

        return $this->query($strQuery);

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


    function approveRequest($request_id){
        $strQuery = "UPDATE requests SET
                        request_status = 'approved' where request_id='$request_id'";
        return $this->query($strQuery);

    }

    function declineRequest($request_id){

        $strQuery = "UPDATE requests SET
                        request_status = 'declined' where request_id='$request_id'";
        return $this->query($strQuery);

    }

    function addRequest($requestid,$name,$email,$phone,$usergroup,$department,$item,$reason,$needed,$return,$created_at,
                        $updated_at='none',$deleted_at='none'){

        $strQuery="INSERT INTO requests SET
		request_id 		= '$requestid',
		fullname 		= '$name',
		email 			= '$email',
		phone 			= '$phone',
		user_category 	= '$usergroup',
		item_borrowed 	= '$item',
		department 		= '$department',
		reason 			= '$reason', 
		date_needed 	= '$needed',
		date_to_return 	= '$return',
		request_status  =  'pending',
		created_at 		= '$created_at'";

        if($this->query($strQuery)){
            if($this->addToProRequest($requestid,$created_at)){
                return true;
            }
        }else{
            return false;
        }

    }

    function addToProRequest($requestid,$created_at){

        $strQuery="INSERT INTO process_request SET
		request_id 		= '$requestid',
		created_at 		= '$created_at'";
        // return $this->query($strQuery);

        if($this->query($strQuery)){
            // addToProRequest($requestid,$created_at);
            return true;
        }else{
            return false;
        }
    }

    function searchRequest($requestid){
        $srQuery="SELECT request_status FROM requests where request_id='$requestid'";

        return $this->query($srQuery);
    }

    function checkIn($request_id, $item_code, $checker_name, $check_date, $updated){

        $strQuery = "UPDATE process_request SET
                    returned_by = '$checker_name',
                    returned_at = '$check_date',
                    item_code = '$item_code',
                    updated_at = '$updated' WHERE request_id = '$request_id'";

        return $this->query($strQuery);


    }

    function checkOut($request_id,$item_code,$checker_name, $check_date, $updated){

        $strQuery = "UPDATE process_request SET
                    checked_out_by = '$checker_name',
                    checked_out_at = '$check_date',
                    item_code = '$item_code',
                    updated_at = '$updated' WHERE request_id = '$request_id'";

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