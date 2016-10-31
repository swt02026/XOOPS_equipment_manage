<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $sql = sprintf("SELECT %1$s.name \
                , %2$s.owner \
                FROM %1$s  \
                INNER JOIN %2$s \ 
                 ON %1$s.id=%2$s.id",
        $xoopsDB->prefix('equipment_desc'), $xoopsDB('equipment_owner'));

    //$query = $xoopsDB->query($sql);
   // print_r($query->fetchArray($query));
    xoops_cp_footer();
?>