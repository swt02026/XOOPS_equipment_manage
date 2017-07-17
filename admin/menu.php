<?php

$icon_dir  = substr(XOOPS_VERSION, 6, 3) === '2.6' ? '' : 'images/';

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


$adminmenu = [
    [
        'title' => _MI_EQUIPMENT_MENU0,
        'link'  => 'admin/index.php',
        'desc'  => _MI_EQUIPMENT_MENU0_DESC,
        'icon'  => $pathIcon32 . '/home.png'
    ],

    [
        'title' => _MI_EQUIPMENT_MENU1,
        'link'  => 'admin/manage.php',
        'desc'  => _MI_EQUIPMENT_MENU1_DESC,
        'icon'  => $pathIcon32 . '/delivery.png'
    ],
    [
        'title' => _MI_EQUIPMENT_MENU2,
        'link'  => 'admin/borrow_manage.php',
        'desc'  => _MI_EQUIPMENT_MENU2_DESC,
        'icon'  => $pathIcon32 . '/index.png'
    ],
    [
        'title' => _MI_EQUIPMENT_MENU3,
        'link'  => 'index.php',
        'desc'  => _MI_EQUIPMENT_MENU3_DESC,
        'icon'  => $pathIcon32 . '/cart_add.png'
    ],
    [
        'title' => MI_EQUIPMENT_ADMENU5,
        'link'  => 'admin/desc.php',
        'desc'  => MI_EQUIPMENT_ADMENU5_DESC,
        'icon'  => $pathIcon32 . '/cart_add.png'
    ],
    [
        'title' => MI_EQUIPMENT_ADMENU6,
        'link' => 'admin/borrow.php',
        'desc'  => MI_EQUIPMENT_ADMENU6_DESC,
        'icon'  => $pathIcon32 . '/user-icon.png'
    ],
    [
        'title' => MI_EQUIPMENT_ADMENU7,
        'link' => 'admin/permissions.php',
        'desc'  => MI_EQUIPMENT_ADMENU7_DESC,
        'icon'  => $pathIcon32 . '/permissions.png'
    ],
    [
        'title' => _MI_EQUIPMENT_MENU4,
        'link'  => 'admin/about.php',
        'desc'  => _MI_EQUIPMENT_MENU4_DESC,
        'icon'  => $pathIcon32 . '/about.png'
    ]

];
