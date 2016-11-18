<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/7
 * Time: 下午 02:40
 */
    include '../../../../mainfile.php';
    $borrow_data = array_filter(
        array_map("intval", $_POST["borrow_number"]), function ($val){
        return $val > 0;
    });

    if(sizeof($borrow_data) > 0){

        $borrower = $xoopsUser->uname();
        foreach ($borrow_data as $id => $amount){
            $sql = sprintf("INSERT INTO `%s` (`id`, `amount`, `owner`) 
                            VALUES ({$id}, {$amount}, '{$owner}') 
                            ON DUPLICATE KEY UPDATE `amount`=`amount`+{$amount}", $xoopsDB->prefix('equipment_borrow'));
            echo $sql;

        }
    }
