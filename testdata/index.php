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
 * @author          XOOPS Development Team <http://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

require_once __DIR__ . '/../../../mainfile.php';

$op = \Xmf\Request::getCmd('op', '');

switch ($op) {
    case 'load':
        loadSampleData();
        break;
}

// XMF TableLoad for SAMPLE data

function loadSampleData()
{
    $moduleDirName = basename(dirname(__DIR__));
    xoops_loadLanguage('admin', $moduleDirName);

    $equipmentData = \Xmf\Yaml::readWrapped('equipment.yml');
    \Xmf\Database\TableLoad::truncateTable($moduleDirName . '_equipment');
    \Xmf\Database\TableLoad::loadTableFromArray($moduleDirName . '_equipment', $equipmentData);

    $rentalsData = \Xmf\Yaml::readWrapped('rentals.yml');
    \Xmf\Database\TableLoad::truncateTable($moduleDirName . '_rentals');
    \Xmf\Database\TableLoad::loadTableFromArray($moduleDirName . '_rentals', $rentalsData);

    $customerData = \Xmf\Yaml::readWrapped('customer.yml');
    \Xmf\Database\TableLoad::truncateTable($moduleDirName . '_customer');
    \Xmf\Database\TableLoad::loadTableFromArray($moduleDirName . '_customer', $customerData);

    redirect_header('../admin/index.php', 1, AM_EQUIPMENT_SAMPLEDATA_SUCCESS);
}
