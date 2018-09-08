<?php
        //check command
        if(!isset($_REQUEST['cmd'])){
        echo "cmd is not provided";
        exit();
        }

        //get command
        $cmd=$_REQUEST['cmd'];
        switch($cmd){
        case 0:
        getNumItems();		//if cmd=0 call to add category
        break;
        case 1:
        getItemsCheckedOut();
        break;
        case 2:
        getItemCategories();		//if cmd=1 the call delete
        break;
        case 3:
            getYearRequests();	//if cmd=2 the change status
        break;
        case 4:
            getYearReqStatus();//if cmd=3 list users
        break;
        case 5:
            getYearReqUserCategory();//if cmd=3 list users
        break;
        case 6:
            getYearReqUserDept();//if cmd=3 list users
        break;
//            case 10:
//                getAllStats();
//                break;
        default:
        echo "wrong cmd";	//change to json message
        break;
        }


        function getNumItems(){

        include_once("../models/dashboard.php");
        $dashObj=new dashboard();
        $dashObj-> getNumItems();
        $details = $dashObj->fetch();

        if($details==true){
                    echo json_encode($details);
        }else{
        echo '{"result":0,"message":"Error retrieving statistics"}';
        }
        }

        function getItemsCheckedOut(){

            include_once("../models/dashboard.php");
            $dashObj=new dashboard();
            $dashObj-> getItemsCheckedOut();
            $details = $dashObj->fetch();

            if($details==true){
                echo json_encode($details);
            }else{
                echo '{"result":0,"message":"Error retrieving statistics"}';
            }
        }

        function getItemCategories(){

            include_once("../models/dashboard.php");
            $dashObj=new dashboard();
            $dashObj-> getItemsCategories();
            $details = $dashObj->fetch();

            if($details==true){
//                echo json_encode($details);
                echo '{"result":1,"itemsCategories":[';
                while ($details != false) {
                    echo json_encode($details);
                    $details = $dashObj->fetch();
                    if ($details) {
                        echo ',';
                    }
                }
                echo ']}';
            }else{
                echo '{"result":0,"message":"Error retrieving statistics"}';
            }
        }

        function getYearRequests(){
            $year = date('Y');
            include_once("../models/dashboard.php");
            $dashObj=new dashboard();
            $dashObj-> getYearRequests($year);
            $details = $dashObj->fetch();

            if($details==true){
                echo json_encode($details);
            }else{
                echo '{"result":0,"message":"Error retrieving statistics"}';
            }
        }

        function getYearReqStatus(){
            $year = date('Y');
            include_once("../models/dashboard.php");
            $dashObj=new dashboard();
            $dashObj-> getYearReqStatus($year);
            $details = $dashObj->fetch();

            if($details==true){
                echo '{"result":1,"itemsCategories":[';
                while ($details != false) {
                    echo json_encode($details);
                    $details = $dashObj->fetch();
                    if ($details) {
                        echo ',';
                    }
                }
                echo ']}';
            }else{
                echo '{"result":0,"message":"Error retrieving statistics"}';
            }
        }

        function getYearReqUserCategory(){
            $year = date('Y');
            include_once("../models/dashboard.php");
            $dashObj=new dashboard();
            $dashObj-> getYearReqUserCategory($year);
            $details = $dashObj->fetch();

            if($details==true){
                echo '{"result":1,"itemsCategories":[';
                while ($details != false) {
                    echo json_encode($details);
                    $details = $dashObj->fetch();
                    if ($details) {
                        echo ',';
                    }
                }
                echo ']}';
            }else{
                echo '{"result":0,"message":"Error retrieving statistics"}';
            }
        }

        function getYearReqUserDept(){
            $year = date('Y');
            include_once("../models/dashboard.php");
            $dashObj=new dashboard();
            $dashObj-> getYearReqUserDept($year);
            $details = $dashObj->fetch();

            if($details==true){
                echo '{"result":1,"itemsCategories":[';
                while ($details != false) {
                    echo json_encode($details);
                    $details = $dashObj->fetch();
                    if ($details) {
                        echo ',';
                    }
                }
                echo ']}';
            }else{
                echo '{"result":0,"message":"Error retrieving statistics"}';
            }
        }


//        function getAllStats(){
////            $allitems = "stats: {". getNumItems().", ".getItemsCheckedOut().", ".getItemCategories().", ".getYearRequests().
////            ", ".getYearReqStatus().", ". getYearReqUserCategory(). ", ".getYearReqUserDept(). " }";
//            $stats = array();
//            array_push($stats,getNumItems(),getItemsCheckedOut(),getItemCategories(),getYearRequests(),getYearReqStatus(),
//                getYearReqUserCategory(),getYearReqUserDept());
//
//            echo json_encode($stats);
//        }

?>