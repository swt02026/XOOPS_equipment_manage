<?php
include '../../../mainfile.php';
include '../../../include/cp_header.php';
xoops_cp_header();

$owner = $xoopsUser->uname();

$sql = sprintf("SELECT `borrower`, `amount`, `id`  FROM `%s`",
    $xoopsDB->prefix('equipment_borrow'));

$query = $xoopsDB->query($sql);

$query_rows = [];
if($xoopsDB->getRowsNum($query) > 0){

    while ($row = $xoopsDB->fetchArray($query)){
        $query_rows[] = $row;
    }
}

echo $json_data = json_encode($query_rows);
/*$xoopsTpl->assign('json_data', $json_data);
$xoopsTpl->display('db:equipment_manage.html');*/
xoops_cp_footer();
?>