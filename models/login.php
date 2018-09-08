<?php

include_once ("database.php");

/**
 * login class
 */
class login extends database {

    /**
     * constructor
     */
    function __construct() {
        
    }

    /**
     * function authenticates user and gets user details
     * @param string username user name
     * @param string password user password
     */
    function userLogin($username, $password) {
        $str_query = "select user_id,email,password,firstname,lastname,status from users
				WHERE email='$username' and password=MD5('$password')";

        return $this->query($str_query);
    }

}

?>