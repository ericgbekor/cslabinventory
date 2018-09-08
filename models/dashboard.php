<?php

include_once ("database.php");

/**
 * login class
 */
class dashboard extends database {

    /**
     * constructor
     */
    function __construct() {

    }


    function getNumItems() {
        $str_query = "select count(*) as items from items_category where deleted_at = '0000-00-00 00:00:00'";

        return $this->query($str_query);
    }

    function getItemsCheckedOut() {
        $str_query = "select count(*) as items from process_request where returned_at = '0000-00-00 00:00:00'
              and not checked_out_at = '0000-00-00 00:00:00'";

        return $this->query($str_query);
    }

    function getItemsCategories() {
        $str_query = "select category_name, count(item_code) as items from items_category a, items b 
                where a.category_id = b.item_category group by a.category_name";

        return $this->query($str_query);
    }

    function getYearRequests($year) {
        $str_query = "select count(*) as requests from requests where created_at BETWEEN  
          '{$year}-01-01 00:00:00' AND '{$year}-12-31 23:59:59'";

        return $this->query($str_query);
    }

    function getYearReqStatus($year) {
        $str_query = "select request_status, count(*) as requests from requests where created_at BETWEEN
                        '{$year}-01-01 00:00:00' AND '{$year}-12-31 23:59:59' group by request_status";

        return $this->query($str_query);
    }

    function getYearReqUserCategory($year) {
        $str_query = "select user_category, count(*) as requests from requests where created_at BETWEEN 
                    '{$year}-01-01 00:00:00' AND '{$year}-12-31 23:59:59' group by user_category";

        return $this->query($str_query);
    }

    function getYearReqUserDept($year) {
        $str_query = "select department, count(*) as requests from requests where created_at BETWEEN
                  '{$year}-01-01 00:00:00' AND '{$year}-12-31 23:59:59' group by department";

        return $this->query($str_query);
    }


}

?>