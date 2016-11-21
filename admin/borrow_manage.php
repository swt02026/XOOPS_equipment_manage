<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $owner = $xoopsUser->uname();

    $sql = sprintf('SELECT `borrower`, `%1$s`.`amount`, `%1$s`.`id`, `name`, `owner` 
                    FROM `%1$s` 
                    INNER JOIN `%2$s` ON `%1$s`.`id`=`%2$s`.`id`',
        $xoopsDB->prefix('equipment_borrow'), $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);

    $query_rows = [];
    if($xoopsDB->getRowsNum($query) > 0){

        while ($row = $xoopsDB->fetchArray($query)){
            $row['permission'] = ($row['owner'] == $owner);
            $query_rows[] = $row;
        }
    }

    $json_data = json_encode($query_rows);
    $xoopsTpl->assign('json_data', $json_data);
    $xoopsTpl->display('db:equipment_borrow_list.html');
    xoops_cp_footer();
?>