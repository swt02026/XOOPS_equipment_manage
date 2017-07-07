<?php
include __DIR__ . '/../../mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'equipment_borrow.tpl';
include XOOPS_ROOT_PATH . '/header.php';

function getQueryDataToJSON($sql)
{
    global $xoopsDB;
    $query      = $xoopsDB->query($sql);
    $query_rows = [];

    if ($xoopsDB->getRowsNum($query) > 0) {
        while ($row = $xoopsDB->fetchArray($query)) {
            $query_rows[] = $row;
        }
    }

    return json_encode($query_rows);
}

$sql = sprintf('SELECT `name`, `owner`, `amount`, `id`, `image_b64`  FROM `%s`', $xoopsDB->prefix('equipment_desc'));

$json_data = getQueryDataToJSON($sql);

$xoopsTpl->assign('json_data', $json_data);

$borrow_sql = sprintf('SELECT `%1$s`.`amount`, `name`, `owner`  
                    FROM `%1$s` 
                    INNER JOIN `%2$s` ON `%1$s`.`id`=`%2$s`.`id` WHERE `%1$s`.`borrower`="%3$s"', $xoopsDB->prefix('equipment_borrow'), $xoopsDB->prefix('equipment_desc'), $xoopsUser->uname());

$borrow_data = getQueryDataToJSON($borrow_sql);

$xoopsTpl->assign('borrow_data', $borrow_data);

include_once XOOPS_ROOT_PATH . '/footer.php';
