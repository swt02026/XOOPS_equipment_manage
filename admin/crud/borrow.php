<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/7
 * Time: 下午 02:40
 */

    $borrow_data = array_map("intval", $_POST["borrow_number"]);
    var_dump($borrow_data);