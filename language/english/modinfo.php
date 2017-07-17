<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    XOOPS Project https://xoops.org/
 * @license      GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package
 * @since
 * @author     XOOPS Development Team
 */

// The name of this module
define('_MI_EQUIPMENT_NAME', 'Equipment Rental');

define('_MI_EQUIPMENT_NAME_DESC', 'Module for Equipment Rental Management'); // '設備管理'

//Help
define('_MI_EQUIPMENT_DIRNAME', basename(dirname(dirname(__DIR__))));
define('_MI_EQUIPMENT_HELP_HEADER', __DIR__.'/help/helpheader.html');
define('_MI_EQUIPMENT_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_EQUIPMENT_OVERVIEW', 'Overview');

//define('_MI_EQUIPMENT_HELP_DIR', __DIR__);

//help multi-page
define('_MI_EQUIPMENT_DISCLAIMER', 'Disclaimer');
define('_MI_EQUIPMENT_LICENSE', 'License');
define('_MI_EQUIPMENT_SUPPORT', 'Support');

define('_MI_EQUIPMENT_MENU0', 'Home');
define('_MI_EQUIPMENT_MENU1', 'Equipment');
define('_MI_EQUIPMENT_MENU2', 'Rental List');
define('_MI_EQUIPMENT_MENU3', 'Equipment Rented');
define('_MI_EQUIPMENT_MENU4', 'About');
define('_MI_EQUIPMENT_MENU0_DESC', 'Home Tab');
define('_MI_EQUIPMENT_MENU1_DESC', 'Equipment Management');
define('_MI_EQUIPMENT_MENU2_DESC', 'Rental List');
define('_MI_EQUIPMENT_MENU3_DESC', 'Equipment Rented');
define('_MI_EQUIPMENT_MENU4_DESC', 'About');

define('_MI_EQUIPMENT_EQUIPMENT_NOT_RETURNED', 'The following equipment has not been returned');
define('_MI_EQUIPMENT_MODIFY', 'Modify');
define('_MI_EQUIPMENT_BORROWER', 'Borrower');
define('_MI_EQUIPMENT_BORROWED_QUANTITY', 'Your Order');
define('_MI_EQUIPMENT_BORROWING_CONFIRMATION', 'Confirm Order');
define('_MI_EQUIPMENT_ALL_RETURNED', 'All returned');
define('_MI_EQUIPMENT_DELETE', 'Delete');
define('_MI_EQUIPMENT_CANCEL', 'Cancel');
define('_MI_EQUIPMENT_CAN_BE_BORROWED', 'You can borrow');
//define('_MI_EQUIPMENT_NAME', 'Name');
define('_MI_EQUIPMENT_THE_HOLDER', 'The holder');
define('_MI_EQUIPMENT_OPERATING', 'Operating');
define('_MI_EQUIPMENT_ADDED', 'Added');
define('_MI_EQUIPMENT_ADD_INFORMATION', 'Add information');
define('_MI_EQUIPMENT_NUMBER_OF_RETURNS', 'The number of returns');
define('_MI_EQUIPMENT_RETURN_CONFIRMATION', 'Return confirmation');
define('_MI_EQUIPMENT_NO_PICTURE', 'No picture');
define('_MI_EQUIPMENT_ITEM_NAME', 'Item Name');
define('_MI_EQUIPMENT_PHOTO', 'Photo');
define('_MI_EQUIPMENT_CONFIRM', 'Confirm');
define('_MI_EQUIPMENT_CONFIRM_DELETION', 'Confirm deletion');
define('_MI_EQUIPMENT_CONFIRM_DELIVERY', 'Confirm delivery');
define('_MI_EQUIPMENT_TOTAL', 'Total');
define('_MI_EQUIPMENT_EQUIPMENT_BORROWING', 'Equipment Rental');
define('_MI_EQUIPMENT_SENT_OUT', 'Sent out');
define('_MI_EQUIPMENT_PART_OF_THE_RETURN', 'Part of the return');
define('_MI_EQUIPMENT_SHUT_DOWN', 'Exit');
define('_MI_EQUIPMENT_HOLDER', 'Owner');
define('_MI_EQUIPMENT_QUANTITY', 'Available');

//1.0 Beta 1
//Menu

define('MI_EQUIPMENT_ADMENU5', 'Equipment');
define('MI_EQUIPMENT_ADMENU5_DESC', 'Equipment Management');
define('MI_EQUIPMENT_ADMENU6', 'Customers');
define('MI_EQUIPMENT_ADMENU6_DESC', 'Customers Management');
define('MI_EQUIPMENT_ADMENU7', 'Permissions');
define('MI_EQUIPMENT_ADMENU7_DESC', 'Permissions Management');


// Admin
define('MI_EQUIPMENT_NAME', 'Equipment');
define('MI_EQUIPMENT_DESC', 'This module is for doing following...');
//Menu
define('MI_EQUIPMENT_ADMENU1', 'Home');
define('MI_EQUIPMENT_ADMENU2', 'Equipment');
define('MI_EQUIPMENT_ADMENU3', 'Customers');
define('MI_EQUIPMENT_ADMENU4', 'Permissions');

//Blocks
define('MI_EQUIPMENT_EQUIPMENT_BLOCK', 'Equipment block');
define('MI_EQUIPMENT_CUSTOMERS_BLOCK', 'Customers block');
define('MI_EQUIPMENT_DESC_BLOCK ', 'Equipment block');
define('MI_EQUIPMENT_BORROW_BLOCK ', 'Customers block');

//Config
define('MI_EQUIPMENT_EDITOR_ADMIN', 'Editor: Admin');
define('MI_EQUIPMENT_EDITOR_ADMIN_DESC', 'Select the Editor to use by the Admin');
define('MI_EQUIPMENT_EDITOR_USER', 'Editor: User');
define('MI_EQUIPMENT_EDITOR_USER_DESC', 'Select the Editor to use by the User');
define('MI_EQUIPMENT_KEYWORDS', 'Keywords');
define('MI_EQUIPMENT_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
define('MI_EQUIPMENT_ADMINPAGER', 'Admin: records / page');
define('MI_EQUIPMENT_ADMINPAGER_DESC', 'Admin: # of records shown per page');
define('MI_EQUIPMENT_USERPAGER', 'User: records / page');
define('MI_EQUIPMENT_USERPAGER_DESC', 'User: # of records shown per page');
define('MI_EQUIPMENT_MAXSIZE', 'Max size');
define('MI_EQUIPMENT_MAXSIZE_DESC', 'Set a number of max size uploads file in byte');
define('MI_EQUIPMENT_MIMETYPES', 'Mime Types');
define('MI_EQUIPMENT_MIMETYPES_DESC', 'Set the mime types selected');
define('MI_EQUIPMENT_IDPAYPAL', 'Paypal ID');
define('MI_EQUIPMENT_IDPAYPAL_DESC', 'Insert here your PayPal ID for donactions.');
define('MI_EQUIPMENT_ADVERTISE', 'Advertisement Code');
define('MI_EQUIPMENT_ADVERTISE_DESC', 'Insert here the advertisement code');
define('MI_EQUIPMENT_BOOKMARKS', 'Social Bookmarks');
define('MI_EQUIPMENT_BOOKMARKS_DESC', 'Show Social Bookmarks in the form');
define('MI_EQUIPMENT_FBCOMMENTS', 'Facebook comments');
define('MI_EQUIPMENT_FBCOMMENTS_DESC', 'Allow Facebook comments in the form');
// Notifications
define('MI_EQUIPMENT_GLOBAL_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_FILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_FILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEMODIFY_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILEBROKEN_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_GLOBAL_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_FILESUBMIT_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_CATEGORY_NEWFILE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_FILE_APPROVE_NOTIFY', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_FILE_APPROVE_NOTIFY_CAPTION', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_FILE_APPROVE_NOTIFY_DESC', 'Allow Facebook comments in the form');
define('MI_EQUIPMENT_FILE_APPROVE_NOTIFY_SUBJECT', 'Allow Facebook comments in the form');

// Help
define('MI_EQUIPMENT_DIRNAME', basename(dirname(dirname(__DIR__))));
define('MI_EQUIPMENT_HELP_HEADER', __DIR__.'/help/helpheader.html');
define('MI_EQUIPMENT_BACK_2_ADMIN', 'Back to Administration of ');
define('MI_EQUIPMENT_OVERVIEW', 'Overview');
// The name of this module
//define('MI_EQUIPMENT_NAME', 'YYYYY Module Name');


//define('MI_EQUIPMENT_HELP_DIR', __DIR__);


//help multi-page
define('MI_EQUIPMENT_DISCLAIMER', 'Disclaimer');
define('MI_EQUIPMENT_LICENSE', 'License');
define('MI_EQUIPMENT_SUPPORT', 'Support');
//define('MI_EQUIPMENT_REQUIREMENTS', 'Requirements');
//define('MI_EQUIPMENT_CREDITS', 'Credits');
//define('MI_EQUIPMENT_HOWTO', 'How To');
//define('MI_EQUIPMENT_UPDATE', 'Update');
//define('MI_EQUIPMENT_INSTALL', 'Install');
//define('MI_EQUIPMENT_HISTORY', 'History');
//define('MI_EQUIPMENT_HELP1', 'YYYYY');
//define('MI_EQUIPMENT_HELP2', 'YYYYY');
//define('MI_EQUIPMENT_HELP3', 'YYYYY');
//define('MI_EQUIPMENT_HELP4', 'YYYYY');
//define('MI_EQUIPMENT_HELP5', 'YYYYY');
//define('MI_EQUIPMENT_HELP6', 'YYYYY');

// Permissions Groups
define('MI_EQUIPMENT_GROUPS', 'Groups access');
define('MI_EQUIPMENT_GROUPS_DESC', 'Select general access permission for groups.');
define('MI_EQUIPMENT_ADMINGROUPS', 'Admin Group Permissions');
define('MI_EQUIPMENT_ADMINGROUPS_DESC', 'Which groups have access to tools and permissions page');
