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

use Xmf\Module\Admin;

use Xmf\Request;

require_once __DIR__ . '/admin_header.php';
// Display Admin header
xoops_cp_header();
//count "total Equipment"
/** @var XoopsPersistableObjectHandler $equipmentHandler */
$totalEquipment = $equipmentHandler->getCount();
//count "total Rentals"
/** @var XoopsPersistableObjectHandler $rentalsHandler */
$totalRentals = $rentalsHandler->getCount();
//count "total Customer"
/** @var XoopsPersistableObjectHandler $customerHandler */
$totalCustomer = $customerHandler->getCount();
// InfoBox Statistics
$adminObject->addInfoBox(AM_EQUIPMENT_STATISTICS);

// InfoBox equipment
$adminObject->addInfoBoxLine(sprintf(AM_EQUIPMENT_THEREARE_EQUIPMENT, $totalEquipment));

// InfoBox rentals
$adminObject->addInfoBoxLine(sprintf(AM_EQUIPMENT_THEREARE_RENTALS, $totalRentals));

// InfoBox customer
$adminObject->addInfoBoxLine(sprintf(AM_EQUIPMENT_THEREARE_CUSTOMER, $totalCustomer));
// Render Index
//echo $adminObject->displayNavigation(basename(__FILE__));
//echo $adminObject->displayIndex();

//---------------- XMF -------------------
// code marker
$adminObject->displayNavigation(basename(__FILE__));
$adminObject->addConfigModuleVersion('system', 212);
//$adminObject->addConfigWarning('These are just examples!');
//$adminObject->addConfigBoxLine('notarealmodule', 'module');
//$adminObject->addConfigBoxLine(array('notarealmodule', 'warning'), 'module');

require_once __DIR__ . '/../testdata/index.php';
$adminObject->addItemButton(AM_EQUIPMENT_ADD_SAMPLEDATA, '__DIR__ . /../../testdata/index.php?op=load', 'add');
$adminObject->displayButton('left', '');

$adminObject->displayIndex();

require_once __DIR__ . '/admin_footer.php';
