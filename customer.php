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

$GLOBALS['xoopsOption']['template_main'] = 'equipment_customer_list.tpl';
require_once __DIR__ . '/header.php';
$start = Request::getInt('start', 0);
// Define Stylesheet
$xoTheme->addStylesheet($stylesheet);
// Get Handler
/** @var XoopsObjectHandler $customerHandler */
$customerHandler         = xoops_getModuleHandler('customer', $moduleDirName);
$customerPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder('DESC');
$criteria->setLimit($customerPaginationLimit);
$criteria->setStart($start);

$customerCount = $customerHandler->getCount($criteria);
$customerArray = $customerHandler->getAll($criteria);
if ($customerCount > 0) {
    foreach (array_keys($customerArray) as $i) {
        $customer['id']      = $customerArray[$i]->getVar('id');
        $customer['first']   = $customerArray[$i]->getVar('first');
        $customer['last']    = $customerArray[$i]->getVar('last');
        $customer['address'] = $customerArray[$i]->getVar('address');
        $customer['city']    = $customerArray[$i]->getVar('city');
        $customer['country'] = $customerArray[$i]->getVar('country');
        $customer['created'] = date(_SHORTDATESTRING, strtotime($customerArray[$i]->getVar('created')));
        $GLOBALS['xoopsTpl']->append('customer', $customer);
        $keywords[] = $customerArray[$i]->getVar('last');
        unset($customer);
    }
    // Display Navigation
    if ($customerCount > $customerPaginationLimit) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($customerCount, $customerPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
    EquipmentUtility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName) . ', ' . implode(', ', $keywords));
}
//description
EquipmentUtility::meta_description(MD_EQUIPMENT_CUSTOMER_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', MD_EQUIPMENT_URL . '/customer.php');
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
