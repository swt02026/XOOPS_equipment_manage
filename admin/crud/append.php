<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/1
 * Time: 下午 02:29
 */
    include '../../../../mainfile.php';

    list($post_data_name, $post_data_amount) = array_map("addslashes", $_POST);


    $owner = $xoopsUser->uname();
    $sql = sprintf("INSERT INTO %s VALUES(NULL, '{$post_data_name}', '{$owner}', '{$post_data_amount}')"
        , $xoopsDB->prefix('equipment_manage'));

    echo $sql;


