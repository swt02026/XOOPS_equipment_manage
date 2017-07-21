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
 * @author          XOOPS Development Team <name@site.com> - <http://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

use Xmf\Language;

// comment callback functions

/**
 * @param $category
 * @param $item_id
 * @return null
 */
function equipment_notify_iteminfo($category, $item_id)
{
    $moduleDirName = basename(dirname(__DIR__));

    if (empty($GLOBALS['xoopsModule']) || $GLOBALS['xoopsModule']->getVar('dirname') !== 'equipment') {
        /** @var XoopsModuleHandler $moduleHandler */
        $moduleHandler = xoops_getHandler('module');
        $module        = $moduleHandler->getByDirname('equipment');
        /** @var XoopsConfigHandler $configHandler */
        $configHandler = xoops_getHandler('config');
        $config        =& $configHandler->getConfigsByCat(0, $module->getVar('mid'));
    } else {
        $module = $GLOBALS['xoopsModule'];
        $config = $GLOBALS['xoopsModuleConfig'];
    }

    Language::load('main', $moduleDirName);

    if ('global' === $category) {
        $item['name'] = '';
        $item['url']  = '';

        return $item;
    }

    if ('category' === $category) {
        // Assume we have a valid category id
        $sql           = 'SELECT _title FROM ' . $GLOBALS['xoopsDB']->prefix('equipment_cat') . ' WHERE _cid = ' . $item_id;
        $result        = $GLOBALS['xoopsDB']->query($sql); // TODO: error check
        $resultArrayay = $GLOBALS['xoopsDB']->fetchArray($result);
        $item['name']  = $resultArrayay['_title'];
        $item['url']   = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/cat_view.php?_cid=' . $item_id;

        return $item;
    }

    if ('' == $category) {
        // Assume we have a valid link id
        $sql           = 'SELECT _cid, _title FROM ' . $GLOBALS['xoopsDB']->prefix('equipment_rentals') . ' WHERE _lid = ' . $item_id;
        $result        = $GLOBALS['xoopsDB']->query($sql); // TODO: error check
        $resultArrayay = $GLOBALS['xoopsDB']->fetchArray($result);
        $item['name']  = $resultArrayay['title'];
        $item['url']   = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/equipment_visit.php?_cid=' . $resultArrayay['_cid'] . '&amp;_lid=' . $item_id;

        return $item;
    }
    return null;
}
