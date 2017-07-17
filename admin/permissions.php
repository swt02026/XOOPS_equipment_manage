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
 * @author          XOOPS Development Team <name@site.com> - <http://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */
use Xmf\Module\Admin;
use Xmf\Request;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
require_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';
if ('' != Request::getString('submit', '')) {
    redirect_header( XOOPS_URL.'/modules/'.$GLOBALS['xoopsModule']->dirname().'/admin/permissions.php', 1, AM_EQUIPMENT_PERMISSIONS__GPERMUPDATED );
}
// Check admin have access to this page
/*$group = $GLOBALS['xoopsUser']->getGroups ();
$groups = xoops_getModuleOption ( 'admin_groups', $thisDirname );
if (count ( array_intersect ( $group, $groups ) ) <= 0) {
    redirect_header ( 'index.php', 3, _NOPERM );
}*/
$adminObject->displayNavigation(basename(__FILE__));

$permission = Request::getInt('permission',1,'POST');
$selected = array('', '', '', '');
$selected[$permission-1] = ' selected';

echo "
<form method='post' name='fselperm' action='permissions.php'>
    <table border=0>
        <tr>
            <td>
                <select name='permission' onChange='document.fselperm.submit()'>
                    <option value='1'".$selected[0].'>'.AM_EQUIPMENT_PERMISSIONS_GLOBAL."</option>
                    <option value='2'".$selected[1].'>'.AM_EQUIPMENT_PERMISSIONS_APPROVE."</option>
                    <option value='3'".$selected[2].'>'.AM_EQUIPMENT_PERMISSIONS_SUBMIT."</option>
                    <option value='4'".$selected[3].'>'.AM_EQUIPMENT_PERMISSIONS_VIEW.'</option>
                </select>
            </td>
        </tr>
    </table>
</form>';

$module_id = $GLOBALS['xoopsModule']->getVar('mid');
switch ($permission) {
    case 1:
        $formTitle = AM_EQUIPMENT_PERMISSIONS_GLOBAL;
        $permName = 'equipment_ac';
        $permDesc = AM_EQUIPMENT_PERMISSIONS_GLOBAL_DESC;
        $globalPerms = array(    '4' => AM_EQUIPMENT_PERMISSIONS_GLOBAL_4,
                                '8' => AM_EQUIPMENT_PERMISSIONS_GLOBAL_8,
                                '16' => AM_EQUIPMENT_PERMISSIONS_GLOBAL_16 );
        break;
    case 2:
        $formTitle = AM_EQUIPMENT_PERMISSIONS_APPROVE;
        $permName = 'equipment_approve';
        $permDesc = AM_EQUIPMENT_PERMISSIONS_APPROVE_DESC;
        break;
    case 3:
        $formTitle = AM_EQUIPMENT_PERMISSIONS_SUBMIT;
        $permName = 'equipment_submit';
        $permDesc = AM_EQUIPMENT_PERMISSIONS_SUBMIT_DESC;
        break;
    case 4:
        $formTitle = AM_EQUIPMENT_PERMISSIONS_VIEW;
        $permName = 'equipment_view';
        $permDesc = AM_EQUIPMENT_PERMISSIONS_VIEW_DESC;
        break;
}

$permform = new XoopsGroupPermForm($formTitle, $module_id, $permName, $permDesc, 'admin/permissions.php');
if (1 == $permission) {
    foreach ($globalPerms as $perm_id => $perm_name) {
        $permform->addItem($perm_id, $perm_name);
    }
    echo $permform->render();
    echo '<br><br>';
} else {
    $criteria = new CriteriaCompo();
    $criteria->setSort('id');
    $criteria->setOrder('ASC');
    $desc_count = $descHandler->getCount($criteria);
    $descArray = $descHandler->getObjects($criteria);
    unset($criteria);
    foreach (array_keys($descArray) as $i) {
        $permform->addItem($descArray[$i]->getVar('id'), $descArray[$i]->getVar('id'));
    }
    // Check if desc exist before rendering the form and redirect, if there aren't desc
    if ($desc_count > 0) {
        echo $permform->render();
        echo '<br><br>';
    } else {
        redirect_header ( 'desc.php?op=new', 3, AM_EQUIPMENT_PERMISSIONS_NOPERMSSET );
        //exit ();
    }
}
unset($permform);
require_once __DIR__ . '/admin_footer.php';
