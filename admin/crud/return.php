<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/22
 * Time: 上午 08:34
 */
    include '../../../../mainfile.php';

    $return_data = array_map("addslashes",
        array_map("htmlspecialchars", $_POST));

    if(intval($return_data['id']) > 0 &&
        intval($return_data['return_amount']) > 0 &&
        sizeof($return_data['borrower']) > 0
        ){

        $id = intval($return_data['id']);
        $return_amount = intval($return_data['return_amount']);
        $sql_borrow =
    }
