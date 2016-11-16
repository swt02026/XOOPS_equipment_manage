<?php

    $modversion = [
        'name' => "設備管理",
        'version' => '1.00',
        'description' => '設備管理',
        'author' => 'swt02026',
        'image' => 'images/logo.jpg',
        'dirname' => basename(dirname(__FILE__)),
        'system_menu' => 1,
        'hasMain' => 1,
        'hasAdmin' => 1,
        'adminindex' => 'admin/index.php',
        'adminmenu' => 'admin/menu.php',
        'config' => []

    ];

    $modversion['templates'] = [

        [
            'file' => 'equipment_manage.html',
            'description' => 'equipment_manage.html'
        ],
        [
            'file' => 'equipment_borrow.html',
            'description' => 'equipment_borrow.html'
        ]
    ];

    $modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

    $modversion['tables'] = [
        "equipment_desc"
        //"equipment_amount",
        //"equipment_borrower"
    ];

?>