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

$path = dirname(dirname(dirname(__DIR__)));
require_once $path . '/include/cp_header.php';
require_once $path . '/class/xoopsformloader.php';

require __DIR__ . '/../class/utility.php';

$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}

/** @var Xmf\Module\Admin $adminObject */
$adminObject = \Xmf\Module\Admin::getInstance();

$pathIcon16    = \Xmf\Module\Admin::iconUrl('', 16);
$pathIcon32    = \Xmf\Module\Admin::iconUrl('', 32);
$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

/** @var XoopsObjectHandler $equipmentHandler */
$equipmentHandler = xoops_getModuleHandler('equipment', $moduleDirName);
/** @var XoopsObjectHandler $rentalsHandler */
$rentalsHandler = xoops_getModuleHandler('rentals', $moduleDirName);
/** @var XoopsObjectHandler $customerHandler */
$customerHandler = xoops_getModuleHandler('customer', $moduleDirName);

$myts = MyTextSanitizer::getInstance();
if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new XoopsTpl();
}

// Load language files
$moduleHelper->loadLanguage('admin');
$moduleHelper->loadLanguage('modinfo');
$moduleHelper->loadLanguage('main');
