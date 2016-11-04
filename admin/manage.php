<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $sql = sprintf("SELECT  name, owner, amount, id  FROM %s",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);


    if($xoopsDB->getRowsNum($query) > 0){

        $query_rows = [];
        while ($row = $xoopsDB->fetchArray($query)){
            $query_rows[] = $row;
        }
        $xoopsTpl->assign('json_data', json_encode($query_rows));
        $xoopsTpl->assign('query_rows', $query_rows);
    }

    $xoopsTpl->display('db:equipment_manage.html');
    xoops_cp_footer();
?>