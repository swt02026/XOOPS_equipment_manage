<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/1
 * Time: 下午 02:29
 */
    include '../../../../mainfile.php';

    $post_data = array_map("htmlspecialchars" ,array_map("addslashes", $_POST));

    if(strlen( $post_data["name"]) &&
        strlen($post_data["amount"]) &&
        intval($post_data["amount"]) > 0) {

        $post_data_name = $post_data["name"];
        $post_data_amount = intval($post_data["amount"]);
        $owner = $xoopsUser->uname();

        $sql = sprintf("INSERT INTO %s VALUES(NULL, '{$post_data_name}', '{$owner}', {$post_data_amount});"
            , $xoopsDB->prefix('equipment_manage'));

        echo $sql;
        $xoopsDB->queryF($sql);
    }


    //echo "<script>window.location.href='../manage.php';</script>";

