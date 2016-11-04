<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/4
 * Time: 下午 04:02
 */
    include '../../../../mainfile.php';

    $update_data = array_map("addslashes",
        array_map("htmlspecialchars", $_POST));

    if(isset($update_data['update_id']) &&
        strlen( $update_data["name"]) &&
        strlen($update_data["amount"])
    ){
        var_dump($update_data);
    }