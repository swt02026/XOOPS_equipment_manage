<?php

$modversion = [
    'name'        => '設備管理',
    'version'     => '1.00',
    'description' => '設備管理',
    'author'      => 'swt02026',
    'image'       => 'image/index.jpg',
    'dirname'     => basename(__DIR__),
    'system_menu' => 1,
    'hasMain'     => 1,
    'hasAdmin'    => 1,
    'adminindex'  => 'admin/index.php',
    'adminmenu'   => 'admin/menu.php',
    'config'      => []

];

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

$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

$modversion['tables'] = [
    'equipment_desc',
    'equipment_borrow'
];
