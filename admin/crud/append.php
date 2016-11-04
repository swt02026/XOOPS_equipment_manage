<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/1
 * Time: 下午 02:29
 */
    include '../../../../mainfile.php';

    $append_data = array_map("htmlspecialchars" ,array_map("addslashes", $_POST));

    if(strlen( $append_data["name"]) &&
        strlen($append_data["amount"]) &&
        intval($append_data["amount"]) > 0) {

        $post_data_name = $append_data["name"];
        $post_data_amount = intval($append_data["amount"]);
        $owner = $xoopsUser->uname();

        $sql = sprintf("INSERT INTO %s(`name`, `owner`, `amount`) VALUES('{$post_data_name}', '{$owner}', {$post_data_amount});"
            , $xoopsDB->prefix('equipment_desc'));

        $xoopsDB->queryF($sql);
    }


    echo "<script>window.location.href='../manage.php';</script>";

