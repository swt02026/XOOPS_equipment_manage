<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $sql = sprintf("SELECT owner, name FROM %s",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);


    if($xoopsDB->getRowsNum($query) > 0){

        $query_rows = [];
        while ($row = $xoopsDB->fetchArray($query)){
            $query_rows[] = $row;
        }
        print_r($query_data);
        $xoopsTpl->assign('query_rows', $query_rows);
    }

    $xoopsTpl->display('db:equipment_manage.html');
    xoops_cp_footer();
?>