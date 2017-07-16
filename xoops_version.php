<?php
$moduleDirName = basename(__DIR__);
$modversion = [
    'version'       => '1.01',
    'module_status' => 'Beta 1',
    'release_date'  => '2017/07/05',
    'name'          => _MI_EQUIPMENT_NAME,
    'description'   => _MI_EQUIPMENT_NAME_DESC,
    'author'        => 'swt02026',
    'license'       => 'GPL 2.0 or later, and MIT',
    'license_url'   => 'www.gnu.org/licenses/gpl-2.0.html/',
    'help'          => 'page=help',
    'image'         => 'assets/images/logoModule.png',
    'dirname'       => basename(__DIR__),
    'modicons16'    => 'assets/images/icons/16',
    'modicons32'    => 'assets/images/icons/32',
    // ------------------- Min Requirements -------------------
    'min_php'       => '5.5',
    'min_xoops'     => '2.5.8',
    'min_admin'     => '1.2',
    'min_db'        => ['mysql' => '5.1'],
    // ------------------- Admin Menu -------------------
    'system_menu'   => 1,
    'hasAdmin'      => 1,
    'adminindex'    => 'admin/index.php',
    'adminmenu'     => 'admin/menu.php',
    // ------------------- Main Menu -------------------
    'hasMain'       => 1,
    'config'        => [],
    // ------------------- Install/Update -------------------
    'onInstall'     => 'include/oninstall.php',
    'onUpdate'      => 'include/onupdate.php',
    //  'onUninstall'         => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'       => ['mysql' => 'sql/mysql.sql'],
    // ------------------- Tables ----------------------------
    'tables'        => [
        $moduleDirName . '_' . 'desc',
        $moduleDirName . '_' . 'borrow',
    ],
];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = array(
    ['name' => _MI_EQUIPMENT_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_EQUIPMENT_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_EQUIPMENT_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_EQUIPMENT_SUPPORT, 'link' => 'page=support'],
);

$modversion['templates'] = [
    [
        'file'        => 'equipment_manage.tpl',
        'description' => 'equipment_manage.tpl'
    ],
    [
        'file'        => 'equipment_borrow_list.tpl',
        'description' => 'equipment_borrow_list.tpl'
    ],
    [
        'file'        => 'equipment_borrow.tpl',
        'description' => 'equipment_borrow.tpl'
    ],
    [
        'file'        => 'equipment_about.tpl',
        'description' => 'equipment_about.tpl'
    ]
];
