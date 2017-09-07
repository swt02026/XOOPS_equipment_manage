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
function showEquipmentEquipment($options)
{
    require_once dirname(__DIR__) . '/class/equipment.php';
    $moduleDirName = basename(dirname(__DIR__));
    //$myts = MyTextSanitizer::getInstance();

    $block          = [];
    $blockType      = $options[0];
    $equipmentCount = $options[1];
    //$titleLenght = $options[2];

    /** @var XoopsObjectHandler $equipmentHandler */
    $equipmentHandler = xoops_getModuleHandler('equipment', $moduleDirName);
    $criteria         = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    if ($blockType) {
        $criteria->add(new Criteria('id', 0, '!='));
        $criteria->setSort('id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($equipmentCount);
    $equipmentArray = $equipmentHandler->getAll($criteria);
    foreach (array_keys($equipmentArray) as $i) {
        $block[$i]['owner'] = $equipmentArray[$i]->getVar('owner');
        $block[$i]['name']  = $equipmentArray[$i]->getVar('name');
    }

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function editEquipmentEquipment($options)
{
    require_once dirname(__DIR__) . '/class/equipment.php';
    $moduleDirName = basename(dirname(__DIR__));

    $form = MB_EQUIPMENT_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='" . $options[0] . "' >";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' type='text' >&nbsp;<br>";
    $form .= MB_EQUIPMENT_TITLELENGTH . " : <input name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' type='text' ><br><br>";

    /** @var XoopsObjectHandler $'. equipment . 'Handler */
    $equipmentHandler = xoops_getModuleHandler('equipment', $moduleDirName);
    $criteria         = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('id', 0, '!='));
    $criteria->setSort('id');
    $criteria->setOrder('ASC');
    $equipmentArray = $equipmentHandler->getAll($criteria);
    $form           .= MB_EQUIPMENT_CATTODISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form           .= "<option value='0' " . (in_array(0, $options) === false ? '' : "selected='selected'") . '>' . MB_EQUIPMENT_ALLCAT . '</option>';
    foreach (array_keys($equipmentArray) as $i) {
        $id   = $equipmentArray[$i]->getVar('id');
        $form .= "<option value='" . $id . "' " . (in_array($id, $options) === false ? '' : "selected='selected'") . '>' . $equipmentArray[$i]->getVar('name') . '</option>';
    }
    $form .= '</select>';

    return $form;
}
