<?php
    include '../../../mainfile.php';
    include '../../../include/cp_header.php';
    xoops_cp_header();

    $sql = sprintf("SELECT owner, name FROM %s",
        $xoopsDB->prefix('equipment_desc'));

    $query = $xoopsDB->query($sql);

    if($xoopsDB->getFieldNum($query) > 0){

        while ($row = $xoopsDB->fetchArray($query)){

        }
    }
    else{
        echo "nothing";
    }

    xoops_cp_footer();
?>