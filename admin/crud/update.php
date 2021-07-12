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
 * Date: 2016/11/4
 * Time: 下午 04:02
 */
include __DIR__ . '/../../../../mainfile.php';

$update_data = array_map('addslashes', array_map('htmlspecialchars', $_POST));
global $xoopsDB, $xoopsUser;
if (isset($update_data['update_id']) && '' !== $update_data['name'] && '' !== $update_data['amount'] && (int)$update_data['amount'] > 0 && (int)$update_data['amount'] > 0 && (int)$update_data['amount_diff']) {
    $update_name   = $update_data['name'];
    $update_amount = $update_data['amount'];
    $update_id     = $update_data['update_id'];
    $amount_diff   = (int)$update_data['amount_diff'];

    $owner = $xoopsUser->uname();
    $sql   = sprintf("UPDATE `%s` 
            SET `name`='{$update_name}', 
            `total`={$update_amount},
            `amount`=`amount` + {$amount_diff}
            WHERE `id`={$update_id} and `owner`='{$owner}'", $xoopsDB->prefix('equipment_equipment'));
    $xoopsDB->queryF($sql);
    header('location:../equipment_vue.php');
}
