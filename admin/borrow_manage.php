<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $owner = $xoopsUser->uname();

    $sql = sprintf("SELECT `borrower`, `%1$s`.`amount`, `id`, `name` FROM `%1$s` INNER JOIN `%2$s` ON `id`",
        $xoopsDB->prefix('equipment_borrow'), $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);

    $query_rows = [];
    if($xoopsDB->getRowsNum($query) > 0){

        while ($row = $xoopsDB->fetchArray($query)){
            $query_rows[] = $row;
        }
    }

    $json_data = json_encode($query_rows);
    $xoopsTpl->assign('json_data', $json_data);
    $xoopsTpl->display('db:equipment_borrow_list.html');
    xoops_cp_footer();
?>