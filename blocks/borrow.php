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
function showEquipmentBorrow($options)
{
    require_once dirname(__DIR__) . '/class/borrow.php';
    $moduleDirName = basename(dirname(__DIR__));
    //$myts = MyTextSanitizer::getInstance();

    $block = array();
    $blockType = $options[0];
    $borrowCount = $options[1];
    //$titleLenght = $options[2];

    /** @var XoopsObjectHandler $borrowHandler */
    $borrowHandler = xoops_getModuleHandler('borrow', $moduleDirName);
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    if ($blockType) {
        $criteria->add(new Criteria('id', 0, '!='));
        $criteria->setSort('id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($borrowCount);
    $borrowArray = $borrowHandler->getAll($criteria);
    foreach (array_keys($borrowArray) as $i) {
        $block[$i]['borrower'] = $borrowArray[$i]->getVar('borrower');
    }

    return $block;
}
/**
 * @param $options
 *
 * @return string
 */
function editEquipmentBorrow($options)
{
    require_once dirname(__DIR__) . '/class/borrow.php';
    $moduleDirName = basename(dirname(__DIR__));

    $form = MB_EQUIPMENT_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' />";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='".$options[1]."' type='text' />&nbsp;<br>";
    $form .= MB_EQUIPMENT_TITLELENGTH." : <input name='options[2]' size='5' maxlength='255' value='".$options[2]."' type='text' /><br><br>";
    
    /** @var XoopsObjectHandler $'. borrow . 'Handler */
    $borrowHandler = xoops_getModuleHandler('borrow', $moduleDirName);
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('id', 0, '!='));
    $criteria->setSort('id');
    $criteria->setOrder('ASC');
    $borrowArray = $borrowHandler->getAll($criteria);
    $form .= MB_EQUIPMENT_CATTODISPLAY."<br><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (in_array(0, $options) === false ? '' : "selected='selected'") . '>' .MB_EQUIPMENT_ALLCAT . '</option>';
    foreach (array_keys($borrowArray) as $i) {
        $id = $borrowArray[$i]->getVar('id');
        $form .= "<option value='" . $id . "' " . (in_array($id, $options) === false ? '' : "selected='selected'") . '>'.$borrowArray[$i]->getVar('borrower').'</option>';
    }
    $form .= '</select>';

    return $form;
}
