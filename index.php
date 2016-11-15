<?php
    include '../../mainfile.php';
    $xoopsOption['template_main'] = "equipment_borrow2.html";
    include XOOPS_ROOT_PATH."/header.php";

    $sql = sprintf("SELECT name, owner, amount, id  FROM %s",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);

    if($xoopsDB->getRowsNum($query) > 0){

        $query_rows = [];
        while ($row = $xoopsDB->fetchArray($query)){

            $query_rows[] = $row;
        }
        //$xoopsTpl->assign('query_rows', $query_rows);
    }

    include_once XOOPS_ROOT_PATH."/footer.php";
?>