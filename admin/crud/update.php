<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/4
 * Time: 下午 04:02
 */
    include '../../../../mainfile.php';

    $update_data = array_map('addslashes',
                             array_map('htmlspecialchars', $_POST));

    if(isset($update_data['update_id']) &&
        strlen($update_data['name']) &&
       strlen($update_data['amount']) &&
       intval($update_data['amount']) > 0 &&
       intval($update_data['amount']) > 0 &&
       intval($update_data['amount_diff'])
    ){

        $update_name = $update_data['name'];
        $update_amount = $update_data['amount'];
        $update_id = $update_data['update_id'];
        $amount_diff = intval($update_data['amount_diff']);

        $owner = $xoopsUser->uname();
        $sql = sprintf("UPDATE `%s` 
            SET `name`='{$update_name}', 
            `total`={$update_amount},
            `amount`=`amount` + {$amount_diff}
            WHERE `id`={$update_id} and `owner`='{$owner}'" ,
            $xoopsDB->prefix('equipment_desc')
        );
        $xoopsDB->queryF($sql);
        header('location:../manage.php');
    }
