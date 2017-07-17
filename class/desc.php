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
 * Class EquipmentDesc
 */
class EquipmentDesc extends XoopsObject
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
        $this->initVar('owner', XOBJ_DTYPE_TXTBOX);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('amount', XOBJ_DTYPE_INT);
        $this->initVar('total', XOBJ_DTYPE_INT);
        $this->initVar('image_b64', XOBJ_DTYPE_TXTAREA);
     }

    /**
     * Get form
     *
     * @param null
     * @return EquipmentDescForm
     */
    public function getForm()
    {
         require_once XOOPS_ROOT_PATH . '/modules/equipment/class/form/desc.php';

        $form = new EquipmentDescForm($this);
        return $form;
    }
    
        /**
     * @return array|null
     */
    public function getGroupsRead()
    {
        global $permHelper;
        //return $this->publisher->getHandler('permission')->getGrantedGroupsById('desc_read', id);
        return $permHelper->getGroupsForItem('sbcolumns_read', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsSubmit()
    {
          global $permHelper;
//        return $this->publisher->getHandler('permission')->getGrantedGroupsById('desc_submit', id);
          return $permHelper->getGroupsForItem('sbcolumns_submit', $this->getVar('id'));
    }

    /**
     * @return array|null
     */
    public function getGroupsModeration()
    {
          global $permHelper;
//        return $this->publisher->getHandler('permission')->getGrantedGroupsById('desc_moderation', id);
        return $permHelper->getGroupsForItem('sbcolumns_moderation', $this->getVar('id'));
    }
}

        /**
         * Class EquipmentDescHandler
         */
class EquipmentDescHandler extends XoopsPersistableObjectHandler
{
    /**
     * Constructor
     * @param null|XoopsDatabase $db
     */

    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'equipment_desc', 'EquipmentDesc', 'id', 'id');
    }

    public function getDataJson(){
        global $xoopsDB;
        $sql = sprintf('SELECT `name`, `owner`, `amount`, `id`, `image_b64`  FROM `%s`', $xoopsDB->prefix('equipment_desc'));

        $json_data = EquipmentUtility::getQueryDataToJSON($sql);

        return $json_data;
    }
}
