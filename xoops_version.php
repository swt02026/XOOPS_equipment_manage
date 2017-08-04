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

$moduleDirName = basename(__DIR__);

$modversion = array(
    'version'             => 1.1,
    'module_status'       => 'Beta 1',
    'release_date'        => '2017/07/20',
    'name'                => MI_EQUIPMENT_NAME,
    'description'         => MI_EQUIPMENT_DESC,
    'release'             => '2017-07-20',
    'author'              => 'swt02026, XOOPS Development Team',
    'author_mail'         => 'name@site.com',
    'author_website_url'  => 'http://xoops.org',
    'author_website_name' => 'XOOPS Project',
    'credits'             => 'XOOPS Development Team',
    //    'license' => 'GPL 2.0 or later',
    'help'                => 'page=help',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html',

    'release_info' => 'release_info',
    'release_file' => XOOPS_URL . "/modules/{$moduleDirName}/docs/release_info file",

    'manual'              => 'Installation.txt',
    'manual_file'         => XOOPS_URL . "/modules/{$moduleDirName}/docs/link to manual file",
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.8',
    'min_admin'           => '1.2',
    'min_db'              => array('mysql' => '5.5'),
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => $moduleDirName,
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    //About
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'http://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    // Admin system menu
    'system_menu'         => 1,
    // Admin things
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // Menu
    'hasMain'             => 1,
    'sub'                 => [
        [
            'name' => MI_EQUIPMENT_VIEW_INDEX,
            'url'  => 'index.php'
        ],
        [
            'name' => MI_EQUIPMENT_VIEW_INDEXVUE,
            'url'  => 'indexvue.php'
        ],
    ],
    // Scripts to run upon installation or update
    'onInstall'           => 'include/oninstall.php',
    'onUpdate'            => 'include/onupdate.php',
    'onUninstall'         => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'             => array('mysql' => 'sql/mysql.sql'),
    // ------------------- Tables ----------------------------
    'tables'              => array(
        $moduleDirName . '_' . 'equipment',
        $moduleDirName . '_' . 'rentals',
        $moduleDirName . '_' . 'customer',
    ),
);
// ------------------- Search -----------------------------//
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'equipment_search';
//  ------------------- Comments -----------------------------//
$modversion['hasComments']          = 1;
$modversion['comments']['itemName'] = 'com_id';
$modversion['comments']['pageName'] = 'comments.php';
// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'equipment_com_approve';
$modversion['comments']['callback']['update']  = 'equipment_com_update';
//  ------------------- Templates -----------------------------//
$modversion['templates'][] = array(
    'file'        => 'equipment_header.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'equipment_index.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'equipment_equipment.tpl',
    'description' => ''
);

$modversion['templates'][] = array(
    'file'        => 'equipment_equipment_list.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'equipment_rentals.tpl',
    'description' => ''
);

$modversion['templates'][] = array(
    'file'        => 'equipment_rentals_list.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'equipment_customer.tpl',
    'description' => ''
);

$modversion['templates'][] = array(
    'file'        => 'equipment_customer_list.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'equipment_footer.tpl',
    'description' => ''
);

$modversion['templates'][] = array(
    'file'        => 'admin/equipment_admin_about.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'admin/equipment_admin_help.tpl',
    'description' => ''
);
$modversion['templates'][] = array(
    'file'        => 'admin/equipment_admin_customer.tpl',
    'description' => ''
);

$modversion['templates'][] = array('file' => 'equipment_desc.tpl', 'description' => '');

$modversion['templates'][] = array('file' => 'equipment_desc_list.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'equipment_borrow.tpl', 'description' => '');

$modversion['templates'][] = array('file' => 'equipment_borrow_list.tpl', 'description' => '');

$modversion['templates'][] = array('file' => 'admin/equipment_admin_borrow.tpl', 'description' => '');

$modversion['templates'][] = array('file' => 'admin/equipment_admin_rentals_vue.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'admin/equipment_admin_equipment_vue.tpl', 'description' => '');

// ------------------- Help files ------------------- //
$modversion['helpsection'] = array(
    array(
        'name' => MI_EQUIPMENT_OVERVIEW,
        'link' => 'page=help'
    ),
    array(
        'name' => MI_EQUIPMENT_DISCLAIMER,
        'link' => 'page=disclaimer'
    ),
    array(
        'name' => MI_EQUIPMENT_LICENSE,
        'link' => 'page=license'
    ),
    array(
        'name' => MI_EQUIPMENT_SUPPORT,
        'link' => 'page=support'
    ),
);

// ------------------- Blocks -----------------------------//
$modversion['blocks'][] = array(
    'file'        => 'equipment.php',
    'name'        => MI_EQUIPMENT_EQUIPMENT_BLOCK,
    'description' => '',
    'show_func'   => 'showEquipmentEquipment',
    'edit_func'   => 'editEquipmentEquipment',
    'options'     => '|5|25|0',
    'template'    => 'equipment_equipment_block.tpl'
);

$modversion['blocks'][] = array(
    'file'        => 'rentals.php',
    'name'        => MI_EQUIPMENT_RENTALS_BLOCK,
    'description' => '',
    'show_func'   => 'showEquipmentRentals',
    'edit_func'   => 'editEquipmentRentals',
    'options'     => '|5|25|0',
    'template'    => 'equipment_rentals_block.tpl'
);

$modversion['blocks'][] = array(
    'file'        => 'customer.php',
    'name'        => MI_EQUIPMENT_CUSTOMER_BLOCK,
    'description' => '',
    'show_func'   => 'showEquipmentCustomer',
    'edit_func'   => 'editEquipmentCustomer',
    'options'     => '|5|25|0',
    'template'    => 'equipment_customer_block.tpl'
);

// ------------------- Config Options -----------------------------//
xoops_load('xoopseditorhandler');
$editorHandler          = XoopsEditorHandler::getInstance();
$modversion['config'][] = array(
    'name'        => 'equipmentEditorAdmin',
    'title'       => 'MI_EQUIPMENT_EDITOR_ADMIN',
    'description' => 'MI_EQUIPMENT_EDITOR_DESC_ADMIN',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'tinymce'
);

$modversion['config'][] = array(
    'name'        => 'equipmentEditorUser',
    'title'       => 'MI_EQUIPMENT_EDITOR_USER',
    'description' => 'MI_EQUIPMENT_EDITOR_DESC_USER',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'dhtmltextarea'
);

// -------------- Get groups --------------
/** @var XoopsMemberHandler $memberHandler */
$memberHandler = xoops_getHandler('member');
$xoopsGroups   = $memberHandler->getGroupList();
foreach ($xoopsGroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = array(
    'name'        => 'groups',
    'title'       => 'MI_EQUIPMENT_GROUPS',
    'description' => 'MI_EQUIPMENT_GROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $groups,
    'default'     => $groups
);

// -------------- Get Admin groups --------------
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('group_type', 'Admin'));
/** @var XoopsMemberHandler $memberHandler */
$memberHandler    = xoops_getHandler('member');
$adminXoopsGroups = $memberHandler->getGroupList($criteria);
foreach ($adminXoopsGroups as $key => $adminGroup) {
    $admin_groups[$adminGroup] = $key;
}
$modversion['config'][] = array(
    'name'        => 'admin_groups',
    'title'       => 'MI_EQUIPMENT_ADMINGROUPS',
    'description' => 'MI_EQUIPMENT_ADMINGROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $admin_groups,
    'default'     => $admin_groups
);

$modversion['config'][] = array(
    'name'        => 'keywords',
    'title'       => 'MI_EQUIPMENT_KEYWORDS',
    'description' => 'MI_EQUIPMENT_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'equipment,equipment, rentals, customer'
);

// --------------Uploads : maxsize of image --------------
$modversion['config'][] = array(
    'name'        => 'maxsize',
    'title'       => 'MI_EQUIPMENT_MAXSIZE',
    'description' => 'MI_EQUIPMENT_MAXSIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 5000000
);

// --------------Uploads : mimetypes of image --------------
$modversion['config'][] = array(
    'name'        => 'mimetypes',
    'title'       => 'MI_EQUIPMENT_MIMETYPES',
    'description' => 'MI_EQUIPMENT_MIMETYPES_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => array(
        'image/gif',
        'image/jpeg',
        'image/png'
    ),
    'options'     => array(
        'bmp'   => 'image/bmp',
        'gif'   => 'image/gif',
        'pjpeg' => 'image/pjpeg',
        'jpeg'  => 'image/jpeg',
        'jpg'   => 'image/jpg',
        'jpe'   => 'image/jpe',
        'png'   => 'image/png'
    )
);

$modversion['config'][] = array(
    'name'        => 'adminpager',
    'title'       => 'MI_EQUIPMENT_ADMINPAGER',
    'description' => 'MI_EQUIPMENT_ADMINPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
);

$modversion['config'][] = array(
    'name'        => 'userpager',
    'title'       => 'MI_EQUIPMENT_USERPAGER',
    'description' => 'MI_EQUIPMENT_USERPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
);

$modversion['config'][] = array(
    'name'        => 'advertise',
    'title'       => 'MI_EQUIPMENT_ADVERTISE',
    'description' => 'MI_EQUIPMENT_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
);

$modversion['config'][] = array(
    'name'        => 'bookmarks',
    'title'       => 'MI_EQUIPMENT_BOOKMARKS',
    'description' => 'MI_EQUIPMENT_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'fbcomments',
    'title'       => 'MI_EQUIPMENT_FBCOMMENTS',
    'description' => 'MI_EQUIPMENT_FBCOMMENTS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

// -------------- Notifications equipment --------------
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'equipment_notify_iteminfo';

$modversion['notification']['category'][] = array(
    'name'           => 'global',
    'title'          => MI_EQUIPMENT_GLOBAL_NOTIFY,
    'description'    => MI_EQUIPMENT_GLOBAL_NOTIFY_DESC,
    'subscribe_from' => array(
        'index.php',
        'viewcat.php',
        'singlefile.php'
    )
);

$modversion['notification']['category'][] = array(
    'name'           => 'category',
    'title'          => MI_EQUIPMENT_CATEGORY_NOTIFY,
    'description'    => MI_EQUIPMENT_CATEGORY_NOTIFY_DESC,
    'subscribe_from' => array(
        'viewcat.php',
        'singlefile.php'
    ),
    'item_name'      => 'cid',
    'allow_bookmark' => 1
);

$modversion['notification']['category'][] = array(
    'name'           => 'file',
    'title'          => MI_EQUIPMENT_FILE_NOTIFY,
    'description'    => MI_EQUIPMENT_FILE_NOTIFY_DESC,
    'subscribe_from' => 'singlefile.php',
    'item_name'      => 'lid',
    'allow_bookmark' => 1
);

$modversion['notification']['event'][] = array(
    'name'          => 'new_category',
    'category'      => 'global',
    'title'         => MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY,
    'caption'       => MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY_DESC,
    'mail_template' => 'global_newcategory_notify',
    'mail_subject'  => MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'file_modify',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY,
    'caption'       => MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY_DESC,
    'mail_template' => 'global_filemodify_notify',
    'mail_subject'  => MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'file_broken',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY,
    'caption'       => MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY_DESC,
    'mail_template' => 'global_filebroken_notify',
    'mail_subject'  => MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'file_submit',
    'category'      => 'global',
    'admin_only'    => 1,
    'title'         => MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY,
    'caption'       => MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'global_filesubmit_notify',
    'mail_subject'  => MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'new_file',
    'category'      => 'global',
    'title'         => MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY,
    'caption'       => MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'global_newfile_notify',
    'mail_subject'  => MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'file_submit',
    'category'      => 'category',
    'admin_only'    => 1,
    'title'         => MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY,
    'caption'       => MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY_DESC,
    'mail_template' => 'category_filesubmit_notify',
    'mail_subject'  => MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'new_file',
    'category'      => 'category',
    'title'         => MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY,
    'caption'       => MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY_DESC,
    'mail_template' => 'category_newfile_notify',
    'mail_subject'  => MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY_SUBJECT
);

$modversion['notification']['event'][] = array(
    'name'          => 'approve',
    'category'      => 'file',
    'admin_only'    => 1,
    'title'         => MI_EQUIPMENT_FILE_APPROVE_NOTIFY,
    'caption'       => MI_EQUIPMENT_FILE_APPROVE_NOTIFY_CAPTION,
    'description'   => MI_EQUIPMENT_FILE_APPROVE_NOTIFY_DESC,
    'mail_template' => 'file_approve_notify',
    'mail_subject'  => MI_EQUIPMENT_FILE_APPROVE_NOTIFY_SUBJECT
);
