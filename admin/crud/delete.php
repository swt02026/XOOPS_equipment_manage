<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/3
 * Time: 上午 08:25
 */
    var_dump($_POST);

    $delete_data = array_map("addslashes",
        array_map("htmlspecialchars", $_POST));

    $delete_id = intval($delete_data['delete_id']);

    if(isset($delete_data["delete_id"]) &&
        $delete_id > 0){

        $db_name = $xoopsDB->prefix('equipment_desc');
        $owner = $xoopsUser->uname();

        $sql = "DELETE FROM `{$db_name}` WHERE `id`={$delete_id} and `owner`='{$owner}';";

        $xoopsDB->queryF($sql);

    }