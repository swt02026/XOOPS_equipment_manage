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

use Xmf\Language;
use Xmf\Module\Helper;

//require_once dirname(dirname(__DIR__)) . '/mainfile.php';

$path = dirname(dirname(__DIR__));
require_once $path . '/include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/header.php';

$moduleDirName = basename(__DIR__);

$moduleHelper = Helper::getHelper($moduleDirName);

$modulePath = XOOPS_ROOT_PATH . '/modules/' . $moduleDirName;
require_once __DIR__ . '/include/config.php';
require_once __DIR__ . '/class/utility.php';

$myts       = MyTextSanitizer::getInstance();
$stylesheet = "modules/{$moduleDirName}/assets/css/style.css";
if (file_exists($GLOBALS['xoops']->path($stylesheet))) {
    $GLOBALS['xoTheme']->addStylesheet($GLOBALS['xoops']->url("www/{$stylesheet}"));
}
/** @var XoopsObjectHandler $equipmentHandler */
$equipmentHandler = xoops_getModuleHandler('equipment', $moduleDirName);
/** @var XoopsObjectHandler $rentalsHandler */
$rentalsHandler = xoops_getModuleHandler('rentals', $moduleDirName);
/** @var XoopsObjectHandler $customerHandler */
$customerHandler = xoops_getModuleHandler('customer', $moduleDirName);

// Load language files
$moduleHelper->loadLanguage('blocks');
$moduleHelper->loadLanguage('modinfo');
$moduleHelper->loadLanguage('main');
