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
 * Class EquipmentBorrow
 */
class EquipmentBorrow extends XoopsObject
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
        $this->initVar('borrower', XOBJ_DTYPE_TXTBOX);
        $this->initVar('amount', XOBJ_DTYPE_INT);
    }

    /**
     * Get form
     *
     * @param null
     * @return EquipmentBorrowForm
     */
    public function getForm()
    {
        require_once XOOPS_ROOT_PATH . '/modules/equipment/class/form/borrow.php';

        $form = new EquipmentBorrowForm($this);

        return $form;
    }

    /**
     * @return array|null
     */
    public function getGroupsRead()
    {
        global $permHelper;

        //return $this->publisher->getHandler('permission')->getGrantedGroupsById('borrow_read', id);
        return $permHelper->getGroupsForItem('sbcolumns_read', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsSubmit()
    {
        global $permHelper;

        //        return $this->publisher->getHandler('permission')->getGrantedGroupsById('borrow_submit', id);
        return $permHelper->getGroupsForItem('sbcolumns_submit', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsModeration()
    {
        global $permHelper;

        //        return $this->publisher->getHandler('permission')->getGrantedGroupsById('borrow_moderation', id);
        return $permHelper->getGroupsForItem('sbcolumns_moderation', $this->getVar('id'));
    }
}

/**
 * Class EquipmentBorrowHandler
 */
class EquipmentBorrowHandler extends XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param null|XoopsDatabase $db
     */

    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'equipment_borrow', 'EquipmentBorrow', 'id', 'borrower');
    }

    public function getDataJson()
    {
        global $xoopsDB, $xoopsUser;
        $borrow_sql = sprintf('SELECT `%1$s`.`amount`, `name`, `owner`  
                    FROM `%1$s` 
                    INNER JOIN `%2$s` ON `%1$s`.`id`=`%2$s`.`id` WHERE `%1$s`.`borrower`="%3$s"', $xoopsDB->prefix('equipment_borrow'), $xoopsDB->prefix('equipment_desc'), $xoopsUser->uname());

        $borrow_data = EquipmentUtility::getQueryDataToJSON($borrow_sql);

        return $borrow_data;
    }
}
