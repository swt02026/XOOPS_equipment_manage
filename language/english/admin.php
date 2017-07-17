<?php

//1.0 Beta 1
define('AM_EQUIPMENT_SUMMARY', 'Summary');
//Index
define('AM_EQUIPMENT_STATISTICS', 'Equipment statistics');
define('AM_EQUIPMENT_THEREARE_EQUIPMENT', "There are <span class='bold'>%s</span> Equipment in the database");
define('AM_EQUIPMENT_THEREARE_CUSTOMERS', "There are <span class='bold'>%s</span> Customers in the database");

//Buttons
define('AM_EQUIPMENT_ADD_DESC', 'Add new Equipment');
define('AM_EQUIPMENT_DESC_LIST', 'List of Equipment');
define('AM_EQUIPMENT_ADD_BORROW', 'Add new Customers');
define('AM_EQUIPMENT_BORROW_LIST', 'List of Customers');
//General
define('AM_EQUIPMENT_FORMOK', 'Registered successfull');
define('AM_EQUIPMENT_FORMDELOK', 'Deleted successfull');
define('AM_EQUIPMENT_FORMSUREDEL', "Are you sure to Delete: <span class='bold red'>%s</span></b>");
define('AM_EQUIPMENT_FORMSURERENEW', "Are you sure to Renew: <span class='bold red'>%s</span></b>");
define('AM_EQUIPMENT_FORMUPLOAD', 'Upload');
define('AM_EQUIPMENT_FORMIMAGE_PATH', 'File presents in %s');
define('AM_EQUIPMENT_FORM_ACTION', 'Action');
define('AM_EQUIPMENT_SELECT', 'Select action for selected item(s)');
define('AM_EQUIPMENT_SELECTED_DELETE', 'Delete selected item(s)');
define('AM_EQUIPMENT_SELECTED_ACTIVATE', 'Activate selected item(s)');
define('AM_EQUIPMENT_SELECTED_DEACTIVATE', 'De-activate selected item(s)');
define('AM_EQUIPMENT_SELECTED_ERROR', 'You selected nothing to delete');
define('AM_EQUIPMENT_CLONED_OK', 'Record cloned successfully');
define('AM_EQUIPMENT_CLONED_FAILED', 'Cloning of the record has failed');

// Desc
define('AM_EQUIPMENT_DESC_ADD', 'Add a desc');
define('AM_EQUIPMENT_DESC_EDIT', 'Edit desc');
define('AM_EQUIPMENT_DESC_DELETE', 'Delete desc');
define('AM_EQUIPMENT_DESC_ID', 'ID');
define('AM_EQUIPMENT_DESC_OWNER', 'Owner');
define('AM_EQUIPMENT_DESC_NAME', 'Name');
define('AM_EQUIPMENT_DESC_AMOUNT', 'Amount');
define('AM_EQUIPMENT_DESC_TOTAL', 'Total');
define('AM_EQUIPMENT_DESC_IMAGE_B64', 'Image');
// Borrow
define('AM_EQUIPMENT_BORROW_ADD', 'Add a borrow');
define('AM_EQUIPMENT_BORROW_EDIT', 'Edit borrow');
define('AM_EQUIPMENT_BORROW_DELETE', 'Delete borrow');
define('AM_EQUIPMENT_BORROW_ID', 'ID');
define('AM_EQUIPMENT_BORROW_BORROWER', 'Customer');
define('AM_EQUIPMENT_BORROW_AMOUNT', 'Amount');
//Blocks.php
//Permissions
define('AM_EQUIPMENT_PERMISSIONS_GLOBAL', 'Global permissions');
define('AM_EQUIPMENT_PERMISSIONS_GLOBAL_DESC', 'Only users in the group that you select may global this');
define('AM_EQUIPMENT_PERMISSIONS_GLOBAL_4', 'Rate from user');
define('AM_EQUIPMENT_PERMISSIONS_GLOBAL_8', 'Submit from user side');
define('AM_EQUIPMENT_PERMISSIONS_GLOBAL_16', 'Auto approve');
define('AM_EQUIPMENT_PERMISSIONS_APPROVE', 'Permissions to approve');
define('AM_EQUIPMENT_PERMISSIONS_APPROVE_DESC', 'Only users in the group that you select may approve this');
define('AM_EQUIPMENT_PERMISSIONS_VIEW', 'Permissions to view');
define('AM_EQUIPMENT_PERMISSIONS_VIEW_DESC', 'Only users in the group that you select may view this');
define('AM_EQUIPMENT_PERMISSIONS_SUBMIT', 'Permissions to submit');
define('AM_EQUIPMENT_PERMISSIONS_SUBMIT_DESC', 'Only users in the group that you select may submit this');
define('AM_EQUIPMENT_PERMISSIONS_GPERMUPDATED', 'Permissions have been changed successfully');
define('AM_EQUIPMENT_PERMISSIONS_NOPERMSSET', 'Permission cannot be set: No borrow created yet! Please create a borrow first.');

//Errors
define('AM_EQUIPMENT_UPGRADEFAILED0', "Update failed - couldn't rename field '%s'");
define('AM_EQUIPMENT_UPGRADEFAILED1', "Update failed - couldn't add new fields");
define('AM_EQUIPMENT_UPGRADEFAILED2', "Update failed - couldn't rename table '%s'");
define('AM_EQUIPMENT_ERROR_COLUMN', 'Could not create column in database : %s');
define('AM_EQUIPMENT_ERROR_BAD_XOOPS', 'This module requires XOOPS %s+ (%s installed)');
define('AM_EQUIPMENT_ERROR_BAD_PHP', 'This module requires PHP version %s+ (%s installed)');
define('AM_EQUIPMENT_ERROR_TAG_REMOVAL', 'Could not remove tags from Tag Module');
//directories
define('AM_EQUIPMENT_AVAILABLE', "<span style='color : green;'>Available. </span>");
define('AM_EQUIPMENT_NOTAVAILABLE', "<span style='color : red;'>is not available. </span>");
define('AM_EQUIPMENT_NOTWRITABLE', "<span style='color : red;'>" . ' should have permission ( %1$d ), but it has ( %2$d )' . '</span>');
define('AM_EQUIPMENT_CREATETHEDIR', 'Create it');
define('AM_EQUIPMENT_SETMPERM', 'Set the permission');
define('AM_EQUIPMENT_DIRCREATED', 'The directory has been created');
define('AM_EQUIPMENT_DIRNOTCREATED', 'The directory can not be created');
define('AM_EQUIPMENT_PERMSET', 'The permission has been set');
define('AM_EQUIPMENT_PERMNOTSET', 'The permission can not be set');
define('AM_EQUIPMENT_VIDEO_EXPIREWARNING', 'The publishing date is after expiration date!!!');
//Sample Data
define('AM_EQUIPMENT_ADD_SAMPLEDATA', 'Add Sample Data (will delete ALL current data)');
define('AM_EQUIPMENT_SAMPLEDATA_SUCCESS', 'Sample Date uploaded successfully');

//Error NoFrameworks
define('_AM_ERROR_NOFRAMEWORKS', 'Error: You don&#39;t use the Frameworks \'admin module\'. Please install this Frameworks');
define('AM_EQUIPMENT_MAINTAINEDBY', 'is maintained by the');

