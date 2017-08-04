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

require_once dirname(__DIR__) . '/class/utility.php';
/**
 * @param $options
 *
 * @return array
 */
function showEquipmentRentals($options)
{
    require_once dirname(__DIR__) . '/class/rentals.php';
    $moduleDirName = basename(dirname(__DIR__));
    //$myts = MyTextSanitizer::getInstance();

    $block        = array();
    $blockType    = $options[0];
    $rentalsCount = $options[1];
    //$titleLenght = $options[2];

    /** @var XoopsObjectHandler $rentalsHandler */
    $rentalsHandler = xoops_getModuleHandler('rentals', $moduleDirName);
    $criteria       = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    if ($blockType) {
        $criteria->add(new Criteria('id', 0, '!='));
        $criteria->setSort('id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($rentalsCount);
    $rentalsArray = $rentalsHandler->getAll($criteria);
    foreach (array_keys($rentalsArray) as $i) {
        $block[$i]['customerid'] = $rentalsArray[$i]->getVar('customerid');
    }

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function editEquipmentRentals($options)
{
    require_once dirname(__DIR__) . '/class/rentals.php';
    $moduleDirName = basename(dirname(__DIR__));

    $form = MB_EQUIPMENT_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='" . $options[0] . "' >";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' type='text' >&nbsp;<br>";
    $form .= MB_EQUIPMENT_TITLELENGTH . " : <input name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' type='text' ><br><br>";

    /** @var XoopsObjectHandler $'. rentals . 'Handler */
    $rentalsHandler = xoops_getModuleHandler('rentals', $moduleDirName);
    $criteria       = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('id', 0, '!='));
    $criteria->setSort('id');
    $criteria->setOrder('ASC');
    $rentalsArray = $rentalsHandler->getAll($criteria);
    $form         .= MB_EQUIPMENT_CATTODISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form         .= "<option value='0' " . (in_array(0, $options) === false ? '' : "selected='selected'") . '>' . MB_EQUIPMENT_ALLCAT . '</option>';
    foreach (array_keys($rentalsArray) as $i) {
        $id   = $rentalsArray[$i]->getVar('id');
        $form .= "<option value='" . $id . "' " . (in_array($id, $options) === false ? '' : "selected='selected'") . '>' . $rentalsArray[$i]->getVar('customerid') . '</option>';
    }
    $form .= '</select>';

    return $form;
}
