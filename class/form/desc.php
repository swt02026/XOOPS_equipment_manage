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
    
use Xmf\Request;
use Xmf\Module\Helper;
use Xmf\Module\Helper\Permission;

require_once __DIR__ . '/../../include/config.php';

$moduleDirName = basename(dirname(dirname(__DIR__)));
$moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName);
$permHelper = new Permission($moduleDirName);

xoops_load('XoopsFormLoader');
/**
 * Class EquipmentDescForm
 */
class EquipmentDescForm extends XoopsThemeForm
{
    public $targetObject;
    /**
     * Constructor
     *
     * @param $target
     */
    public function __construct($target)
    {
        global $moduleHelper;
        $this->targetObject = $target;

        $title = $this->targetObject->isNew() ? sprintf(AM_EQUIPMENT_DESC_ADD) : sprintf(AM_EQUIPMENT_DESC_EDIT);
        parent::__construct($title, 'form', xoops_getenv('PHP_SELF'), 'post', true);
        $this->setExtra('enctype="multipart/form-data"');
        


        //include ID field, it's needed so the module knows if it is a new form or an edited form
        

        $hidden = new XoopsFormHidden('id', $this->targetObject->getVar('id'));
        $this->addElement($hidden);
        unset($hidden);
        
// Id
            $this->addElement(new XoopsFormLabel(AM_EQUIPMENT_DESC_ID, $this->targetObject->getVar('id'), 'id'));
            // Owner
        $this->addElement(new XoopsFormText(AM_EQUIPMENT_DESC_OWNER, 'owner', 50, 255, $this->targetObject->getVar('owner')), false);
        // Name
        $this->addElement(new XoopsFormText(AM_EQUIPMENT_DESC_NAME, 'name', 50, 255, $this->targetObject->getVar('name')), false);
        // Amount
        $this->addElement(new XoopsFormText(AM_EQUIPMENT_DESC_AMOUNT, 'amount', 50, 255, $this->targetObject->getVar('amount')), false);
        // Total
        $this->addElement(new XoopsFormText(AM_EQUIPMENT_DESC_TOTAL, 'total', 50, 255, $this->targetObject->getVar('total')), false);
        // Image_b64
        $image_b64 = $this->targetObject->getVar('image_b64') ?: 'blank.png';

        $uploadDir = '/uploads/equipment/images/';
        $imgtray = new XoopsFormElementTray(AM_EQUIPMENT_DESC_IMAGE_B64, '<br>');
        $imgpath = sprintf(AM_EQUIPMENT_FORMIMAGE_PATH, $uploadDir);
        $imageselect = new XoopsFormSelect($imgpath, 'image_b64', $image_b64);
        $imageArray = XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . $uploadDir);
        foreach ($imageArray as $image) {
            $imageselect->addOption("$image", $image);
        }
        $imageselect->setExtra("onchange='showImgSelected(\"image_image_b64\", \"image_b64\", \"".$uploadDir.'", "", "'.XOOPS_URL."\")'");
        $imgtray->addElement($imageselect);
        $imgtray->addElement(new XoopsFormLabel('', "<br><img src='".XOOPS_URL.'/'.$uploadDir.'/'.$image_b64."' name='image_image_b64' id='image_image_b64' alt='' />"));
        $fileseltray = new XoopsFormElementTray('', '<br>');
        $fileseltray->addElement(new XoopsFormFile(AM_EQUIPMENT_FORMUPLOAD, 'image_b64', xoops_getModuleOption('maxsize')));
        $fileseltray->addElement(new XoopsFormLabel(''));
        $imgtray->addElement($fileseltray);
        $this->addElement($imgtray);
                
        //permissions
        /** @var XoopsMemberHandler $memberHandler */
        $memberHandler =  xoops_getHandler('member');
        $groupList = $memberHandler->getGroupList();
        /** @var XoopsGroupPermHandler $gpermHandler */
        $gpermHandler = xoops_getHandler('groupperm');
        $fullList = array_keys($groupList);

//========================================================================

      $mid           = $GLOBALS['xoopsModule']->mid();
        $groupIdAdmin   = 0;
        $groupNameAdmin = '';
        
        // create admin checkbox
        foreach ($groupList as $groupId => $groupName) {
            if ($groupId == XOOPS_GROUP_ADMIN) {
                $groupIdAdmin   = $groupId;
                $groupNameAdmin = $groupName;
            }
        }

        $selectPermAdmin = new XoopsFormCheckBox('', 'admin', XOOPS_GROUP_ADMIN);
        $selectPermAdmin->addOption($groupIdAdmin, $groupNameAdmin);
        $selectPermAdmin->setExtra("disabled='disabled'"); //comment it out, if you want to allow to remove permissions for the admin

        // ********************************************************
        // permission view items
        $cat_gperms_read     =  $gpermHandler->getGroupIds('equipment_view', $this->targetObject->getVar('id'), $mid);
        $arr_cat_gperms_read = $this->targetObject->isNew() ? '0' : $cat_gperms_read;

        $permsTray = new XoopsFormElementTray(AM_EQUIPMENT_PERMISSIONS_VIEW, '');
        
        $selectAllReadCheckbox = new XoopsFormCheckBox('', 'adminbox1', 1);
        $selectAllReadCheckbox->addOption('allbox', _AM_SYSTEM_ALL);
        $selectAllReadCheckbox->setExtra(" onclick='xoopsCheckGroup(\"form\", \"adminbox1\" , \"groupsRead[]\");' ");
        $selectAllReadCheckbox->setClass('xo-checkall');
        $permsTray->addElement($selectAllReadCheckbox);
        
        // checkbox webmaster
        $permsTray->addElement($selectPermAdmin, false);
        // checkboxes other groups
        //$selectPerm = new XoopsFormCheckBox('', 'cat_gperms_read', $arr_cat_gperms_read);
        //$selectPerm = new XoopsFormCheckBox('', 'groupsRead[]', $this->targetObject->getGroupsRead());
        $selectPerm = new XoopsFormCheckBox('', 'groupsRead[]', $arr_cat_gperms_read);
        foreach ($groupList as $groupId => $groupName) {
            if ($groupId != XOOPS_GROUP_ADMIN) {
                $selectPerm->addOption($groupId, $groupName);
            }
        }
        $permsTray->addElement($selectPerm, false);
        $this->addElement($permsTray, false);
        unset($permsTray, $selectPerm);

        // ********************************************************
        // permission submit item
        $cat_gperms_create     = $gpermHandler->getGroupIds('equipment_submit', $this->targetObject->getVar('id'), $mid);
        $arr_cat_gperms_create = $this->targetObject->isNew() ? '0' : $cat_gperms_create;

        $permsTray = new XoopsFormElementTray(AM_EQUIPMENT_PERMISSIONS_SUBMIT, '');
        
        $selectAllSubmitCheckbox = new XoopsFormCheckBox('', 'adminbox2', 1);
        $selectAllSubmitCheckbox->addOption('allbox', _AM_SYSTEM_ALL);
        $selectAllSubmitCheckbox->setExtra(" onclick='xoopsCheckGroup(\"form\", \"adminbox2\" , \"groupsSubmit[]\");' ");
        $selectAllSubmitCheckbox->setClass('xo-checkall');
        $permsTray->addElement($selectAllSubmitCheckbox);
        
        // checkbox webmaster
        $permsTray->addElement($selectPermAdmin, false);
        // checkboxes other groups
        //$selectPerm = new XoopsFormCheckBox('', 'cat_gperms_create', $arr_cat_gperms_create);
        $selectPerm = new XoopsFormCheckBox('', 'groupsSubmit[]', $arr_cat_gperms_create);
        foreach ($groupList as $groupId => $groupName) {
            if ($groupId != XOOPS_GROUP_ADMIN) {
                $selectPerm->addOption($groupId, $groupName);
            }
        }
        $permsTray->addElement($selectPerm, false);
        $this->addElement($permsTray, false);
        unset($permsTray, $selectPerm);

        // ********************************************************
        // permission approve items
        $cat_gperms_admin     = $gpermHandler->getGroupIds('equipment_approve', $this->targetObject->getVar('id'), $mid);
        $arr_cat_gperms_admin = $this->targetObject->isNew() ? '0' : $cat_gperms_admin;

        $permsTray = new XoopsFormElementTray(AM_EQUIPMENT_PERMISSIONS_APPROVE, '');
        
        $selectAllModerateCheckbox = new XoopsFormCheckBox('', 'adminbox3', 1);
        $selectAllModerateCheckbox->addOption('allbox', _AM_SYSTEM_ALL);
        $selectAllModerateCheckbox->setExtra(" onclick='xoopsCheckGroup(\"form\", \"adminbox3\" , \"groupsModeration[]\");' ");
        $selectAllModerateCheckbox->setClass('xo-checkall');
        $permsTray->addElement($selectAllModerateCheckbox);
        
        // checkbox webmaster
        $permsTray->addElement($selectPermAdmin, false);
        // checkboxes other groups
        //$selectPerm = new XoopsFormCheckBox('', 'cat_gperms_admin', $arr_cat_gperms_admin);
        $selectPerm = new XoopsFormCheckBox('', 'groupsModeration[]', $arr_cat_gperms_admin);
        foreach ($groupList as $groupId => $groupName) {
            if ($groupId != XOOPS_GROUP_ADMIN && $groupId != XOOPS_GROUP_ANONYMOUS) {
                $selectPerm->addOption($groupId, $groupName);
            }
        }
        $permsTray->addElement($selectPerm, false);
        $this->addElement($permsTray, false);
        unset($permsTray, $selectPerm);

//=========================================================================
        $this->addElement(new XoopsFormHidden('op', 'save'));
        $this->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
    }
}
