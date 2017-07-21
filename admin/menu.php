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

$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}
$adminObject = \Xmf\Module\Admin::getInstance();

$pathIcon32    = \Xmf\Module\Admin::menuIconPath('');
$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

// Load language files
$moduleHelper->loadLanguage('admin');
$moduleHelper->loadLanguage('modinfo');
$moduleHelper->loadLanguage('main');

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_ADMENU1,
    'link'  => 'admin/index.php',
    'icon'  => "{$pathIcon32}/home.png"
);

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_MENU1,
    'link'  => 'admin/equipment_vue.php',
    'desc'  => MI_EQUIPMENT_MENU1_DESC,
    'icon'  => $pathIcon32 . '/delivery.png'
);
$adminmenu[] = array(
    'title' => MI_EQUIPMENT_MENU2,
    'link'  => 'admin/rentals_vue.php',
    'desc'  => MI_EQUIPMENT_MENU2_DESC,
    'icon'  => $pathIcon32 . '/index.png'
);
$adminmenu[] = array(
    'title' => MI_EQUIPMENT_MENU3,
    'link'  => 'indexvue.php',
    'desc'  => MI_EQUIPMENT_MENU3_DESC,
    'icon'  => $pathIcon32 . '/cart_add.png'
);

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_ADMENU2,
    'link'  => 'admin/equipment.php',
    'icon'  => "{$pathIcon32}/delivery.png"
);

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_ADMENU3,
    'link'  => 'admin/rentals.php',
    'icon'  => "{$pathIcon32}/cart_add.png"
);

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_ADMENU4,
    'link'  => 'admin/customer.php',
    'icon'  => "{$pathIcon32}/user-icon.png"
);

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_ADMENU5,
    'link'  => 'admin/permissions.php',
    'icon'  => "{$pathIcon32}/permissions.png"
);

$adminmenu[] = array(
    'title' => MI_EQUIPMENT_ADMENU6,
    'link'  => 'admin/about.php',
    'icon'  => "{$pathIcon32}/about.png"
);
