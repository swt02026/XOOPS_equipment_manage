<?php

$icon_dir  = substr(XOOPS_VERSION, 6, 3) === '2.6' ? '' : 'images/';
$adminmenu = [
    [
        'title' => '設備管理',
        'link'  => 'admin/manage.php',
        'desc'  => '設備管理',
        'icon'  => 'image/admin/manage.jpg'
    ],
    [
        'title' => '借用清單',
        'link'  => 'admin/borrow_manage.php',
        'desc'  => '借用清單',
        'icon'  => 'image/admin/list.jpg'
    ],
    [
        'title' => '設備借用',
        'link'  => 'index.php',
        'desc'  => '設備借用',
        'icon'  => 'image/admin/index.jpg'
    ],
    [
        'title' => '關於',
        'link'  => 'admin/about.php',
        'desc'  => '關於',
        'icon'  => 'image/admin/about.jpg'
    ]

];
