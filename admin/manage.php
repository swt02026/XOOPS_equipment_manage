<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $sql = sprintf("SELECT owner, name FROM %s;",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);
    var_dump($query->fetchArray($query));
    xoops_cp_footer();
?>