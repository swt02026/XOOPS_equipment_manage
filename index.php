<?php

$GLOBALS['xoopsOption']['template_main'] = 'equipment_borrow.tpl';
require_once __DIR__ . '/header.php';
//require_once XOOPS_ROOT_PATH.'/header.php';
require_once __DIR__ . '/include/config.php';

/** @var EquipmentDescHandler $descHandler */
$json_data = $descHandler->getDataJson();
$xoopsTpl->assign('json_data', $json_data);

/** @var EquipmentBorrowHandler $borrowHandler */
$borrow_data = $borrowHandler->getDataJson();
$xoopsTpl->assign('borrow_data', $borrow_data);

include_once XOOPS_ROOT_PATH . '/footer.php';
