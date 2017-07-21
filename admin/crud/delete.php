<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/3
 * Time: 上午 08:25
 */
include __DIR__ . '/../../../../mainfile.php';

$delete_data = array_map('addslashes', array_map('htmlspecialchars', $_POST));
global $xoopsDB, $xoopsUser;
if (isset($delete_data['delete_id'])
    && (int)$delete_data['delete_id'] > 0) {
    $delete_id = (int)$delete_data['delete_id'];
    $db_name   = $xoopsDB->prefix('equipment_equipment');
    $owner     = $xoopsUser->uname();

    $sql = "DELETE FROM `{$db_name}` WHERE `id`={$delete_id} and `owner`='{$owner}';";

    $xoopsDB->queryF($sql);

    $borrow_db_name = $xoopsDB->prefix('equipment_rentals');

    $sql_borrow = "DELETE FROM `{$borrow_db_name}` WHERE `id`={$delete_id};";
}
header('location:../equipment_vue.php');
