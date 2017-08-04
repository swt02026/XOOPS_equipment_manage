<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * Module: Equipment
 *
 * @category        Module
 * @package         equipment
 * @author          swt02026 (https://github.com/swt02026/)
 * @author          XOOPS Development Team <http://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

include __DIR__ . '/../../../mainfile.php';
include __DIR__ . '/../../../include/cp_header.php';
xoops_cp_header();
global $xoopsDB, $xoopsUser;
$owner = $xoopsUser->uname();

//$sql = sprintf('SELECT `name`, `owner`, `amount`, `id`, `total`, `image`  FROM `%s`', $xoopsDB->prefix('equipment_equipment'));

$sql = sprintf('SELECT `equipmentid`, `%1$s`.`quantity`, `%1$s`.`id`, `name`, `owner`  
                    FROM `%1$s` 
                    INNER JOIN `%2$s` ON `%1$s`.`equipmentid`=`%2$s`.`id`', $xoopsDB->prefix('equipment_rentals'), $xoopsDB->prefix('equipment_equipment'));

$query = $xoopsDB->query($sql);

$query_rows = [];
if ($xoopsDB->getRowsNum($query) > 0) {
    while ($row = $xoopsDB->fetchArray($query)) {
        $row['permission'] = ($row['owner'] == $owner);
        $query_rows[]      = $row;
    }
}

$json_data = json_encode($query_rows);
$xoopsTpl->assign('json_data', $json_data);

$borrow_sql = 'SELECT r.quantity, e.name,  e.owner, c.first, c.last FROM ' . $xoopsDB->prefix('equipment_equipment') . ' AS e, ' . $xoopsDB->prefix('equipment_customer') . ' AS c, ' . $xoopsDB->prefix('equipment_rentals') . ' AS r WHERE e.id = r.equipmentid AND c.id = r.customerid';

$query1 = $xoopsDB->query($borrow_sql);

$query_rows1 = [];
if ($xoopsDB->getRowsNum($query1) > 0) {
    while ($row = $xoopsDB->fetchArray($query1)) {
        $row['permission'] = ($row['owner'] == $owner);
        $query_rows1[]     = $row;
    }
}

$json_data1 = json_encode($query_rows1);
$xoopsTpl->assign('json_data', $json_data1);

$xoopsTpl->display('db:admin/equipment_admin_rentals_vue.tpl');
xoops_cp_footer();
