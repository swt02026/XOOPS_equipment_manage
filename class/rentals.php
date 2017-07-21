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

use Xmf\Module\Helper\Permission;

$moduleDirName = basename(dirname(__DIR__));

$permHelper = new Permission($moduleDirName);

/**
 * Class EquipmentRentals
 */
class EquipmentRentals extends XoopsObject
{
    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('id', XOBJ_DTYPE_INT);
        $this->initVar('customerid', XOBJ_DTYPE_INT);
        $this->initVar('equipmentid', XOBJ_DTYPE_INT);
        $this->initVar('quantity', XOBJ_DTYPE_INT);
        $this->initVar('datefrom', XOBJ_DTYPE_TIMESTAMP);
        $this->initVar('dateto', XOBJ_DTYPE_TIMESTAMP);
    }

    /**
     * Get form
     *
     * @param null
     * @return EquipmentRentalsForm
     */
    public function getForm()
    {
        require_once XOOPS_ROOT_PATH . '/modules/equipment/class/form/rentals.php';

        $form = new EquipmentRentalsForm($this);
        return $form;
    }

    /**
     * @return array|null
     */
    public function getGroupsRead()
    {
        global $permHelper;
        //return $this->publisher->getHandler('permission')->getGrantedGroupsById('rentals_read', id);
        return $permHelper->getGroupsForItem('sbcolumns_read', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsSubmit()
    {
        global $permHelper;
        //        return $this->publisher->getHandler('permission')->getGrantedGroupsById('rentals_submit', id);
        return $permHelper->getGroupsForItem('sbcolumns_submit', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsModeration()
    {
        global $permHelper;
        //        return $this->publisher->getHandler('permission')->getGrantedGroupsById('rentals_moderation', id);
        return $permHelper->getGroupsForItem('sbcolumns_moderation', $this->getVar('id'));
    }
}

/**
 * Class EquipmentRentalsHandler
 */
class EquipmentRentalsHandler extends XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param null|XoopsDatabase $db
     */

    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'equipment_rentals', 'EquipmentRentals', 'id', 'customerid');
    }

    /**
     * @return string
     */
    public function getDataJson()
    {
        global $xoopsDB, $xoopsUser;

//        $borrow_sql = sprintf('SELECT `%1$s`.`amount`, `name`, `owner`
//                    FROM `%1$s`
//                    INNER JOIN `%2$s` ON `%1$s`.`id`=`%2$s`.`id` WHERE `%1$s`.`borrower`="%3$s"', $xoopsDB->prefix('equipment_rentals'), $xoopsDB->prefix('equipment_equipment'), $xoopsUser->uname());

        $borrow_sql = 'SELECT r.quantity, e.name, c.first, c.last FROM ' . $xoopsDB->prefix('equipment_equipment') . ' AS e, ' . $xoopsDB->prefix('equipment_customer') . ' AS c, '
                      . $xoopsDB->prefix('equipment_rentals') . ' AS r WHERE e.id = r.equipmentid AND c.id = r.customerid';

        $borrow_data = EquipmentUtility::getQueryDataToJSON($borrow_sql);

        return $borrow_data;
    }
}
