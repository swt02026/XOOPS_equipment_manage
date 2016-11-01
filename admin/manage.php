<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $sql = sprintf("SELECT owner, name FROM %s",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);
    $query_data = [];
    if($xoopsDB->getRowsNum($query) > 0){
        while ($row = $xoopsDB->fetchArray($query)){
            var_dump($row);
        }
    }
    else{

    }
    $xoopsTpl->display('db:equipment_manage.html');
    xoops_cp_footer();
?>