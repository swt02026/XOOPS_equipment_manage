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

$GLOBALS['xoopsOption']['template_main'] = 'equipment_rentals_list.tpl';
require_once __DIR__ . '/header.php';
$start = Request::getInt('start', 0);
// Define Stylesheet
$xoTheme->addStylesheet($stylesheet);
// Get Handler
/** @var EquipmentRentalsHandler $rentalsHandler */
$rentalsHandler         = xoops_getModuleHandler('rentals', $moduleDirName);
$rentalsPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($rentalsPaginationLimit);
$criteria->setStart($start);

$rentalsCount = $rentalsHandler->getCount($criteria);
$rentalsArray = $rentalsHandler->getAll($criteria);
if ($rentalsCount > 0) {
    foreach (array_keys($rentalsArray) as $i) {
        /** @var EquipmentRentals[]  $rentalsArray[$i] */
        $rentals['id'] = $rentalsArray[$i]->getVar('id');

        /** @var XoopsObjectHandler $customerHandler */
        $customerHandler       = xoops_getModuleHandler('customer', $moduleDirName);
        $rentals['customerid'] = $customerHandler->get($rentalsArray[$i]->getVar('customerid'))->getVar('last');
        /** @var XoopsObjectHandler $equipmentHandler */

        $equipmentHandler       = xoops_getModuleHandler('equipment', $moduleDirName);
        $rentals['equipmentid'] = $equipmentHandler->get($rentalsArray[$i]->getVar('equipmentid'))->getVar('name');
        $rentals['quantity']    = $rentalsArray[$i]->getVar('quantity');
        $rentals['datefrom']    = date(_SHORTDATESTRING, strtotime($rentalsArray[$i]->getVar('datefrom')));
        $rentals['dateto']      = date(_SHORTDATESTRING, strtotime($rentalsArray[$i]->getVar('dateto')));
        $GLOBALS['xoopsTpl']->append('rentals', $rentals);
        $keywords[] = $rentalsArray[$i]->getVar('customerid');
        unset($rentals);
    }
    // Display Navigation
    if ($rentalsCount > $rentalsPaginationLimit) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($rentalsCount, $rentalsPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
    EquipmentUtility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName) . ', ' . implode(', ', $keywords));
}
//description
EquipmentUtility::meta_description(MD_EQUIPMENT_RENTALS_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', MD_EQUIPMENT_URL . '/rentals.php');
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
