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

$GLOBALS['xoopsOption']['template_main'] = 'equipment_borrow.tpl';
require_once __DIR__ . '/header.php';
//require_once XOOPS_ROOT_PATH.'/header.php';
require_once __DIR__ . '/include/config.php';

/** @var EquipmentEquipmentHandler $equipmentHandler */
$json_data = $equipmentHandler->getDataJson();
$xoopsTpl->assign('json_data', $json_data);

/** @var EquipmentRentalsHandler $rentalsHandler */
$borrow_data = $rentalsHandler->getDataJson();
$xoopsTpl->assign('borrow_data', $borrow_data);

include_once XOOPS_ROOT_PATH . '/footer.php';
