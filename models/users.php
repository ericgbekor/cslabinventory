<?php

/**
*/
include_once("database.php");

/**
*Users  class
*/
class users extends database {

	/**
	*constructor
	*/
	function __construct(){
	}
	
	/**
	*Adds a new user
	*@param string firstname first name
    *@param string lastname last name
	*@param string password login password
	*@param string email login email
	*@param string status status of the user account
	*@param datetime created_at datetime of user creation
    *@param datetime updated_at datetime of user update
    *@param datetime deleted_at datetime of user delete
	*@return boolean returns true if successful or false 
	*/
	function addUser($firstname,$lastname,$email,$password, $status, $created_at,$updated_at='none',$deleted_at='none'){
		
		$strQuery="INSERT INTO users SET
					email = '$email',
					password = MD5('$password'),
					firstname = '$firstname',
					lastname = '$lastname', 
					status = '$status',
					created_at='$created_at',
					updated_at = '$updated_at',
					deleted_at = '$deleted_at'";
		return $this->query($strQuery);				
	}
	
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getAllUsers($filter=false){
		$strQuery="SELECT user_id, email, firstname, lastname, status, created_at, updated_at
					FROM users WHERE deleted_at = '0000-00-00 00:00:00'";
		
		if($filter){
			$strQuery=$strQuery . " and $filter";
		}
		return $this->query($strQuery);
	}

	/**
	 * gets record of a specific user
     * @param int user_id id of user
	*/

	function getUser($user_id){
		$filter="user_id = '$user_id'";
		
		if(!$this->getAllUsers($filter)){
			return false;
		}
		
		return $this->getAllUsers($filter);
	}


	/**
	*delete user
	*@param int usercode the user code to be deleted
    *@param datetime date datetime of user delete
	*returns true if the user is deleted, else false
	*/
	function deleteUser($usercode, $date){
        $strQuery = "UPDATE users SET deleted_at = '$date'
                      WHERE user_id='$usercode' ";
		
		return $this->query($strQuery);
	}
	
	/**
	*edit user
	*@param int user_id the user code to be updated
    *@param string firstname first name of user
    *@param string lastname last name of user
    *@email string email login email of user
    *@param datetime updated_at datetime of user update
	*returns true if the user is updated, else false
	*/
	function editUser($user_id, $firstname, $lastname, $email, $updated_at){
		$strQuery = "UPDATE users SET
						email = '$email',
						firstname = '$firstname',
						lastname = '$lastname',
						updated_at = '$updated_at' 
						WHERE user_id = '$user_id' ";
		
		return $this->query($strQuery);
	}
	
	/**
	*change a user status
	*@param int usercode the user  to change  status
	*@param string status the status to be changed
	*@return bool true if the user status is changed, else false
	*/
	function changeUserStatus($usercode,$status){
		$strQuery = "UPDATE users SET status = '$status'
				    WHERE user_id = '$usercode' ";
		
		return $this->query($strQuery);
	}


    /**
     * @param datetime log_date date time of log
     * @param int item_code code of item
     * @param string activity action logged
     * @param string user name of user
     * @return bool
     */
    function logActivity($log_date, $item_code, $activity, $user){
        $strQuery = "INSERT INTO logging SET
                      log_date_time = '$log_date',
                      item_code = '$item_code',
                      activity = '$activity',
                      fullname = '$user'";

        return $this->query($strQuery);
    }

}
?>