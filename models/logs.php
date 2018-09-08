<?php

/**
 */
include_once("database.php");

/**
 *Users  class
 */
class logs extends database {

    /**
     *constructor
     */
    function __construct(){
    }


//log_id	log_date_time	item_category	item_code	activity	user	created_at	updated_at	deleted_at

    function logActivity($log_date, $item_code, $activity, $user){
        $strQuery = "INSERT INTO logging SET
                      log_date_time = '$log_date',
                      item_code = '$item_code',
                      activity = '$activity',
                      fullname = '$user'";

        return $this->query($strQuery);

    }

    /**
     *gets user records based on the filter
     *@param string mixed condition to filter. If  false, then filter will not be applied
     *@return boolean true if successful, else false
     */
    function getAllLogs(){
        $strQuery="SELECT log_id, log_date_time, item_code, activity, fullname
					FROM logging";


        return $this->query($strQuery);
    }
}
?>