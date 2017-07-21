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

//use Xmf\Request;
//use Xmf\Module\Helper;
use Xmf\Module\Helper\Permission;

require_once __DIR__ . '/../../include/config.php';

$moduleDirName = basename(dirname(dirname(__DIR__)));
$moduleHelper  = Xmf\Module\Helper::getHelper($moduleDirName);
$permHelper    = new Permission($moduleDirName);

xoops_load('XoopsFormLoader');

/**
 * Class EquipmentRentalsForm
 */
class EquipmentRentalsForm extends XoopsThemeForm
{
    public $targetObject;

    /**
     * Constructor
     *
     * @param $target
     */
    public function __construct($target)
    {
//        global $moduleHelper;
        $this->targetObject = $target;

        $title = $this->targetObject->isNew() ? sprintf(AM_EQUIPMENT_RENTALS_ADD) : sprintf(AM_EQUIPMENT_RENTALS_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'), 'post', true);
        $this->setExtra('enctype="multipart/form-data"');

        //include ID field, it's needed so the module knows if it is a new form or an edited form

        $hidden = new XoopsFormHidden('id', $this->targetObject->getVar('id'));
        $this->addElement($hidden);
        unset($hidden);

        // Id
        $this->addElement(new XoopsFormLabel(AM_EQUIPMENT_RENTALS_ID, $this->targetObject->getVar('id'), 'id'));
        // Customerid
        $customerHandler    = xoops_getModuleHandler('customer', 'equipment');
        $customer_id_select = new XoopsFormSelect(AM_EQUIPMENT_RENTALS_CUSTOMERID, 'customerid', $this->targetObject->getVar('customerid'));
        $customer_id_select->addOptionArray($customerHandler->getList());
        $this->addElement($customer_id_select, false);
        // Equipmentid
        $equipmentHandler    = xoops_getModuleHandler('equipment', 'equipment');
        $equipment_id_select = new XoopsFormSelect(AM_EQUIPMENT_RENTALS_EQUIPMENTID, 'equipmentid', $this->targetObject->getVar('equipmentid'));
        $equipment_id_select->addOptionArray($equipmentHandler->getList());
        $this->addElement($equipment_id_select, false);
        // Quantity
        $this->addElement(new XoopsFormText(AM_EQUIPMENT_RENTALS_QUANTITY, 'quantity', 50, 255, $this->targetObject->getVar('quantity')), false);
        // Datefrom
        $this->addElement(new XoopsFormTextDateSelect(AM_EQUIPMENT_RENTALS_DATEFROM, 'datefrom', '', strtotime($this->targetObject->getVar('datefrom'))));
        // Dateto
        $this->addElement(new XoopsFormTextDateSelect(AM_EQUIPMENT_RENTALS_DATETO, 'dateto', '', strtotime($this->targetObject->getVar('dateto'))));

        $this->addElement(new XoopsFormHidden('op', 'save'));
        $this->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
