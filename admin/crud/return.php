<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/22
 * Time: 上午 08:34
 */
    include '../../../../mainfile.php';

    function getChangeAmountSQL($table_name, $return_amount, $id, $borrower){
        return ;
    }

    $return_data = array_map("addslashes",
        array_map("htmlspecialchars", $_POST));

    if(intval($return_data['id']) > 0 &&
        intval($return_data['return_amount']) > 0 &&
        sizeof($return_data['borrower']) > 0
        ){

        $id = intval($return_data['id']);
        $return_amount = intval($return_data['return_amount']);
        $borrower = $return_data['borrower'];

        $sql_borrow_update = sprintf("UPDATE `%s` 
                              SET `amount`=`amount`-{$return_amount} 
                              WHERE `id`={$id} AND `borrower`='{$borrower}'",
                            $xoopsDB->prefix('equipment_borrow')
                        );
        $xoopsDB->queryF($sql_borrow);

        $sql_borrow_update = sprintf("DELETE FROM `%s` 
                                      WHERE `id`={$id} AND `borrower`='{$borrower}' AND `amount`=0",
                            $xoopsDB->prefix('equipment_borrow')
                        );
        $xoopsDB->queryF($sql_borrow);

        $sql_desc_update = sprintf("UPDATE `%s` 
                                    SET `amount`=`amount` + {$return_amount} 
                                     WHERE `id`={$id}",
                                    $xoopsDB->prefix('equipment_desc')
                                );
        $xoopsDB->queryF($sql_desc_update);

    }
