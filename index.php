<?php
    include '../../mainfile.php';
    $xoopsOption['template_main'] = "equipment_borrow.html";
    include XOOPS_ROOT_PATH."/header.php";

    $sql = sprintf("SELECT name, owner, amount, id  FROM %s",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);
    $query_rows = [];

    if($xoopsDB->getRowsNum($query) > 0){

        while ($row = $xoopsDB->fetchArray($query)){

            $query_rows[] = $row;
        }
    }

    $json_data = json_encode($query_rows);
    $xoopsTpl->assign('json_data', $json_data);
    include_once XOOPS_ROOT_PATH."/footer.php";
?>