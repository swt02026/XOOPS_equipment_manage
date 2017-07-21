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
global $xoopsDB;
$owner = $xoopsUser->uname();

$sql = sprintf('SELECT `name`, `owner`, `amount`, `id`, `total`, `image`  FROM `%s`', $xoopsDB->prefix('equipment_equipment'));

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
$xoopsTpl->display('db:admin/equipment_admin_equipment_vue.tpl');
xoops_cp_footer();
