<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/7
 * Time: 下午 02:40
 */
    include '../../../../mainfile.php';
    if ($xoopsUser) {
        $borrow_data = array_filter(
            array_map('intval', $_POST['borrow_number']), function ($val) {
                return $val > 0;
            });

        if (sizeof($borrow_data) > 0) {
            $borrower = $xoopsUser->uname();
            foreach ($borrow_data as $id => $amount) {
                $id = intval($id);
                $amount = intval($amount);
                $sql_amount_dec = sprintf("UPDATE `%s` 
                                            SET `amount`=`amount`-{$amount} 
                                            WHERE `id`={$id} and `amount`>={$amount}",
                                        $xoopsDB->prefix('equipment_desc'));

                $xoopsDB->queryF($sql_amount_dec);

                $sql = sprintf("INSERT INTO `%s` (`id`, `amount`, `borrower`) 
                                VALUES ({$id}, {$amount}, '{$borrower}') 
                                ON DUPLICATE KEY UPDATE `amount`=`amount`+{$amount}",
                            $xoopsDB->prefix('equipment_borrow'));

                $xoopsDB->queryF($sql);
            }
        }
    }
    header('location: ../../index.php');
