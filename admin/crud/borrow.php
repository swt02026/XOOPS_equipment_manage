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
 * Date: 2016/11/7
 * Time: 下午 02:40
 */
include __DIR__ . '/../../../../mainfile.php';
global $xoopsDB, $xoopsUser;
if ($xoopsUser) {
    $borrow_data = array_filter(array_map('intval', $_POST['borrow_number']), function ($val) {
        return $val > 0;
    });

    if (count($borrow_data) > 0) {
        $borrower = $xoopsUser->uname();
        foreach ($borrow_data as $id => $amount) {
            $id             = (int)$id;
            $amount         = (int)$amount;
            $sql_amount_dec = sprintf("UPDATE `%s` 
                                            SET `amount`=`amount`-{$amount} 
                                            WHERE `id`={$id} and `amount`>={$amount}", $xoopsDB->prefix('equipment_equipment'));

            $xoopsDB->queryF($sql_amount_dec);

            $sql = sprintf("INSERT INTO `%s` (`id`, `amount`, `borrower`) 
                                VALUES ({$id}, {$amount}, '{$borrower}') 
                                ON DUPLICATE KEY UPDATE `amount`=`amount`+{$amount}", $xoopsDB->prefix('equipment_rentals'));

            $xoopsDB->queryF($sql);
        }
    }
}
header('location: ../../index.php');
