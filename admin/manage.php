<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $owner = $xoopsUser->uname();

    $sql = sprintf("SELECT `name`, `owner`, `amount`, `id`, `total`, `image_b64`  FROM `%s`",
        $xoopsDB->prefix('equipment_desc'));

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
    $xoopsTpl->display('db:equipment_manage.html');
    xoops_cp_footer();
?>