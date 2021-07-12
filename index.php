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

$GLOBALS['xoopsOption']['template_main'] = 'equipment_index.tpl';
require_once __DIR__ . '/header.php';
require_once XOOPS_ROOT_PATH . '/header.php';
require_once __DIR__ . '/include/config.php';
// Define Stylesheet
$xoTheme->addStylesheet($stylesheet);
// keywords
EquipmentUtility::meta_keywords(xoops_getModuleOption('keywords', $moduleDirName));
// description
EquipmentUtility::meta_description(MD_EQUIPMENT_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', MD_EQUIPMENT_URL . '/index.php');
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
