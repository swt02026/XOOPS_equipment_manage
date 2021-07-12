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
 * Date: 2016/11/22
 * Time: 上午 08:34
 */
include __DIR__ . '/../../../../mainfile.php';
global $xoopsDB;
$return_data = array_map('addslashes', array_map('htmlspecialchars', $_POST));

if ((int)$return_data['id'] > 0
    && (int)$return_data['return_amount'] > 0
    && count($return_data['customerid']) > 0) {
    $id            = (int)$return_data['id'];
    $return_amount = (int)$return_data['return_amount'];
    $borrower      = $return_data['customerid'];

    $sql_borrow_update = sprintf("UPDATE `%s` 
                              SET `amount`=`amount`-{$return_amount} 
                              WHERE `id`={$id} AND `customerid`='{$borrower}'", $xoopsDB->prefix('equipment_rentals'));
    $xoopsDB->queryF($sql_borrow_update);

    $sql_borrow_delete = sprintf("DELETE FROM `%s` 
                                      WHERE `id`={$id} AND `customerid`='{$borrower}' AND `amount`=0", $xoopsDB->prefix('equipment_rentals'));
    $xoopsDB->queryF($sql_borrow_delete);

    $sql_desc_update = sprintf("UPDATE `%s` 
                                    SET `amount`=`amount` + {$return_amount} 
                                     WHERE `id`={$id}", $xoopsDB->prefix('equipment_equipment'));
    $xoopsDB->queryF($sql_desc_update);
}
header('location:../rentals_vue.php');
