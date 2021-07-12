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

//Index
define('AM_EQUIPMENT_STATISTICS', 'Equipment statistics');
define('AM_EQUIPMENT_THEREARE_EQUIPMENT', "There are <span class='bold'>%s</span> Equipment in the database");
define('AM_EQUIPMENT_THEREARE_RENTALS', "There are <span class='bold'>%s</span> Rentals in the database");
define('AM_EQUIPMENT_THEREARE_CUSTOMER', "There are <span class='bold'>%s</span> Customer in the database");
//Buttons
define('AM_EQUIPMENT_ADD_EQUIPMENT', 'Add new Equipment');
define('AM_EQUIPMENT_EQUIPMENT_LIST', 'List of Equipment');
define('AM_EQUIPMENT_ADD_RENTALS', 'Add new Rentals');
define('AM_EQUIPMENT_RENTALS_LIST', 'List of Rentals');
define('AM_EQUIPMENT_ADD_CUSTOMER', 'Add new Customer');
define('AM_EQUIPMENT_CUSTOMER_LIST', 'List of Customer');
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

// Equipment
define('AM_EQUIPMENT_EQUIPMENT_ADD', 'Add a equipment');
define('AM_EQUIPMENT_EQUIPMENT_EDIT', 'Edit equipment');
define('AM_EQUIPMENT_EQUIPMENT_DELETE', 'Delete equipment');
define('AM_EQUIPMENT_EQUIPMENT_ID', 'ID');
define('AM_EQUIPMENT_EQUIPMENT_OWNER', 'Owner');
define('AM_EQUIPMENT_EQUIPMENT_NAME', 'Name');
define('AM_EQUIPMENT_EQUIPMENT_AMOUNT', 'Amount');
define('AM_EQUIPMENT_EQUIPMENT_TOTAL', 'Total');
define('AM_EQUIPMENT_EQUIPMENT_IMAGE', 'Image');
// Rentals
define('AM_EQUIPMENT_RENTALS_ADD', 'Add a rentals');
define('AM_EQUIPMENT_RENTALS_EDIT', 'Edit rentals');
define('AM_EQUIPMENT_RENTALS_DELETE', 'Delete rentals');
define('AM_EQUIPMENT_RENTALS_ID', 'ID');
define('AM_EQUIPMENT_RENTALS_CUSTOMERID', 'Customer');
define('AM_EQUIPMENT_RENTALS_EQUIPMENTID', 'Equipment');
define('AM_EQUIPMENT_RENTALS_QUANTITY', 'Quantity');
define('AM_EQUIPMENT_RENTALS_DATEFROM', 'From');
define('AM_EQUIPMENT_RENTALS_DATETO', 'To');
// Customer
define('AM_EQUIPMENT_CUSTOMER_ADD', 'Add a customer');
define('AM_EQUIPMENT_CUSTOMER_EDIT', 'Edit customer');
define('AM_EQUIPMENT_CUSTOMER_DELETE', 'Delete customer');
define('AM_EQUIPMENT_CUSTOMER_ID', 'ID');
define('AM_EQUIPMENT_CUSTOMER_FIRST', 'First Name');
define('AM_EQUIPMENT_CUSTOMER_LAST', 'Last Name');
define('AM_EQUIPMENT_CUSTOMER_ADDRESS', 'Address');
define('AM_EQUIPMENT_CUSTOMER_CITY', 'City');
define('AM_EQUIPMENT_CUSTOMER_COUNTRY', 'Country');
define('AM_EQUIPMENT_CUSTOMER_CREATED', 'Since');
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
define('AM_EQUIPMENT_PERMISSIONS_NOPERMSSET', 'Permission cannot be set: No customer created yet! Please create a customer first.');

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
