<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/7
 * Time: 下午 02:40
 */

    $borrow_data = array_filter(
        array_map("intval", $_POST["borrow_number"]), function ($val){
        return $val > 0;
    });
    if(sizeof($borrow_data) > 0){


    }
    var_dump($borrow_data);