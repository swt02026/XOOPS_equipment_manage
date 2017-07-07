<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/3
 * Time: 上午 08:25
 */
    include '../../../../mainfile.php';

    $delete_data = array_map('addslashes',
                             array_map('htmlspecialchars', $_POST));



    if(isset($delete_data['delete_id']) &&
        intval($delete_data['delete_id']) > 0){
        $delete_id = intval($delete_data['delete_id']);
        $db_name = $xoopsDB->prefix('equipment_desc');
        $owner = $xoopsUser->uname();

        $sql = "DELETE FROM `{$db_name}` WHERE `id`={$delete_id} and `owner`='{$owner}';";

        $xoopsDB->queryF($sql);

        $borrow_db_name = $xoopsDB->prefix('equipment_borrow');

        $sql_borrow = "DELETE FROM `{$borrow_db_name}` WHERE `id`={$delete_id};";

    }
    header('location:../manage.php');
