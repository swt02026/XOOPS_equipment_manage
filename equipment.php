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

use Xmf\Request;
use Xmf\Language;
use Xmf\Module\Admin;

$GLOBALS['xoopsOption']['template_main'] = 'equipment_equipment_list.tpl';
require_once __DIR__ . '/header.php';
$start = Request::getInt('start', 0);
// Define Stylesheet
$xoTheme->addStylesheet($stylesheet);
// Get Handler
/** @var XoopsObjectHandler $equipmentHandler */
$equipmentHandler         = xoops_getModuleHandler('equipment', $moduleDirName);
$equipmentPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($equipmentPaginationLimit);
$criteria->setStart($start);

$equipmentCount = $equipmentHandler->getCount($criteria);
$equipmentArray = $equipmentHandler->getAll($criteria);
if ($equipmentCount > 0) {
    foreach (array_keys($equipmentArray) as $i) {
        $equipment['id']     = $equipmentArray[$i]->getVar('id');
        $equipment['owner']  = $equipmentArray[$i]->getVar('owner');
        $equipment['name']   = $equipmentArray[$i]->getVar('name');
        $equipment['amount'] = $equipmentArray[$i]->getVar('amount');
        $equipment['total']  = $equipmentArray[$i]->getVar('total');
        $equipment['image']  = $equipmentArray[$i]->getVar('image');
        $GLOBALS['xoopsTpl']->append('equipment', $equipment);
        $keywords[] = $equipmentArray[$i]->getVar('name');
        unset($equipment);
    }
    // Display Navigation
    if ($equipmentCount > $equipmentPaginationLimit) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($equipmentCount, $equipmentPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
    EquipmentUtility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName) . ', ' . implode(', ', $keywords));
}
//description
EquipmentUtility::meta_description(MD_EQUIPMENT_EQUIPMENT_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', MD_EQUIPMENT_URL . '/equipment.php');
$GLOBALS['xoopsTpl']->assign('equipment_url', MD_EQUIPMENT_URL);
$GLOBALS['xoopsTpl']->assign('adv', xoops_getModuleOption('advertise', $moduleDirName));
//
$GLOBALS['xoopsTpl']->assign('bookmarks', xoops_getModuleOption('bookmarks', $moduleDirName));
$GLOBALS['xoopsTpl']->assign('fbcomments', xoops_getModuleOption('fbcomments', $moduleDirName));
//
$GLOBALS['xoopsTpl']->assign('admin', MD_EQUIPMENT_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
require_once XOOPS_ROOT_PATH . '/footer.php';
