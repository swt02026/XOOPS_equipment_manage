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
 * @author          swt02026 (https://github.com/swt02026/)
 * @author          XOOPS Development Team <http://xoops.org>
 * @copyright       {@link https://xoops.org/ XOOPS Project}
 * @license         GPL 2.0 or later
 * @link            https://xoops.org/
 * @since           1.0.0
 */

use Xmf\Module\Admin;
use Xmf\Database\Tables;
use Xmf\Debug;
use Xmf\Module\Helper;
use Xmf\Module\Helper\Permission;
use Xmf\Request;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
//It recovered the value of argument op in URL$
$op    = Request::getString('op', 'list');
$order = Request::getString('order', 'desc');
$sort  = Request::getString('sort', '');

$adminObject->displayNavigation(basename(__FILE__));
/** @var Permission $permHelper */
$permHelper = new Permission($moduleDirName);
$uploadDir  = XOOPS_UPLOAD_PATH . '/equipment/images/';
$uploadUrl  = XOOPS_UPLOAD_URL . '/equipment/images/';

switch ($op) {
    case 'list':
    default:
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_EQUIPMENT, 'equipment.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start                    = Request::getInt('start', 0);
        $equipmentPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

        $criteria = new CriteriaCompo();
        $criteria->setSort('id ASC, name');
        $criteria->setOrder('ASC');
        $criteria->setLimit($equipmentPaginationLimit);
        $criteria->setStart($start);
        $equipmentTempRows  = $equipmentHandler->getCount();
        $equipmentTempArray = $equipmentHandler->getAll($criteria);/*
//
//
                    <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($equipmentTempRows > $equipmentPaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($equipmentTempRows, $equipmentPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('equipmentRows', $equipmentTempRows);
        $equipmentArray = [];

        //    $fields = explode('|', id:smallint:5:unsigned:NOT NULL::primary:ID|owner:varchar:10::NOT NULL::index:Owner|name:varchar:30::NOT NULL::index:Name|amount:int:10:unsigned:NOT NULL:::Amount|total:int:10:unsigned:NOT NULL:::Total|image:varchar:100::NOT NULL:::Image);
        //    $fieldsCount    = count($fields);

        $criteria = new CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($equipmentPaginationLimit);
        $criteria->setStart($start);

        $equipmentCount     = $equipmentHandler->getCount($criteria);
        $equipmentTempArray = $equipmentHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($equipmentCount > 0) {
            foreach (array_keys($equipmentTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $selectorid = EquipmentUtility::selectSorting(AM_EQUIPMENT_EQUIPMENT_ID, 'id');
                $GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
                $equipmentArray['id'] = $equipmentTempArray[$i]->getVar('id');

                $selectorowner = EquipmentUtility::selectSorting(AM_EQUIPMENT_EQUIPMENT_OWNER, 'owner');
                $GLOBALS['xoopsTpl']->assign('selectorowner', $selectorowner);
                $equipmentArray['owner'] = $equipmentTempArray[$i]->getVar('owner');

                $selectorname = EquipmentUtility::selectSorting(AM_EQUIPMENT_EQUIPMENT_NAME, 'name');
                $GLOBALS['xoopsTpl']->assign('selectorname', $selectorname);
                $equipmentArray['name'] = $equipmentTempArray[$i]->getVar('name');

                $selectoramount = EquipmentUtility::selectSorting(AM_EQUIPMENT_EQUIPMENT_AMOUNT, 'amount');
                $GLOBALS['xoopsTpl']->assign('selectoramount', $selectoramount);
                $equipmentArray['amount'] = $equipmentTempArray[$i]->getVar('amount');

                $selectortotal = EquipmentUtility::selectSorting(AM_EQUIPMENT_EQUIPMENT_TOTAL, 'total');
                $GLOBALS['xoopsTpl']->assign('selectortotal', $selectortotal);
                $equipmentArray['total'] = $equipmentTempArray[$i]->getVar('total');

                $selectorimage = EquipmentUtility::selectSorting(AM_EQUIPMENT_EQUIPMENT_IMAGE, 'image');
                $GLOBALS['xoopsTpl']->assign('selectorimage', $selectorimage);
                $equipmentArray['image']       = "<img src='" . $uploadUrl . $equipmentTempArray[$i]->getVar('image') . "' name='" . 'name' . "' id=" . 'id' . " alt='' style='max-width:100px'>";
                $equipmentArray['edit_delete'] = "<a href='equipment.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='equipment.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='equipment.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('equipmentArrays', $equipmentArray);
                unset($equipmentArray);
            }
            unset($equipmentTempArray);
            // Display Navigation
            if ($equipmentCount > $equipmentPaginationLimit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new XoopsPageNav($equipmentCount, $equipmentPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            //                     echo "<td class='center width5'>

            //                    <a href='equipment.php?op=edit&id=".$i."'><img src=".$pathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
            //                    <a href='equipment.php?op=delete&id=".$i."'><img src=".$pathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
            //                    </td>";

            //                echo "</tr>";

            //            }

            //            echo "</table><br><br>";

            //        } else {

            //            echo "<table width='100%' cellspacing='1' class='outer'>

            //                    <tr>

            //                     <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."XXX</th>
            //                    </tr><tr><td class='errorMsg' colspan='7'>There are noXXX equipment</td></tr>";
            //            echo "</table><br><br>";

            //-------------------------------------------

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/equipment_admin_equipment.tpl');
        }

        break;

    case 'new':
        $adminObject->addItemButton(AM_EQUIPMENT_EQUIPMENT_LIST, 'equipment.php', 'list');
        echo $adminObject->displayButton('left');

        $equipmentObject = $equipmentHandler->create();
        $form            = $equipmentObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('equipment.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
            $equipmentObject = $equipmentHandler->get(Request::getInt('id', 0));
        } else {
            $equipmentObject = $equipmentHandler->create();
        }
        // Form save fields
        $equipmentObject->setVar('owner', Request::getVar('owner', ''));
        $equipmentObject->setVar('name', Request::getVar('name', ''));
        $equipmentObject->setVar('amount', Request::getVar('amount', ''));
        $equipmentObject->setVar('total', Request::getVar('total', ''));

        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploadDir = XOOPS_UPLOAD_PATH . '/equipment/images/';
        $uploader  = new XoopsMediaUploader($uploadDir, xoops_getModuleOption('mimetypes', 'equipment'), xoops_getModuleOption('maxsize', 'equipment'), null, null);
        if ($uploader->fetchMedia(Request::getArray('xoops_upload_file', '', 'POST')[0])) {

            //$extension = preg_replace( '/^.+\.([^.]+)$/sU' , '' , $_FILES['attachedfile']['name']);
            //$imgName = str_replace(' ', '', $_POST['']).'.'.$extension;

            $uploader->setPrefix('image_');
            $uploader->fetchMedia(Request::getArray('xoops_upload_file', '', 'POST')[0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $equipmentObject->setVar('image', $uploader->getSavedFileName());
            }
        } else {
            $equipmentObject->setVar('image', Request::getVar('image', ''));
        }

        //Permissions
        //===============================================================

        $mid = $GLOBALS['xoopsModule']->mid();
        /** @var XoopsGroupPermHandler $gpermHandler */
        $gpermHandler = xoops_getHandler('groupperm');
        $id           = Request::getInt('id', 0);

        /**
         * @param $myArray
         * @param $permissionGroup
         * @param $id
         * @param $gpermHandler
         * @param $permissionName
         * @param $mid
         */
        function setPermissions($myArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid)
        {
            $permissionArray = $myArray;
            if ($id > 0) {
                $sql = 'DELETE FROM `' . $GLOBALS['xoopsDB']->prefix('group_permission') . "` WHERE `gperm_name` = '" . $permissionName . "' AND `gperm_itemid`= $id;";
                $GLOBALS['xoopsDB']->query($sql);
            }
            //admin
            $gperm = $gpermHandler->create();
            $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
            $gperm->setVar('gperm_name', $permissionName);
            $gperm->setVar('gperm_modid', $mid);
            $gperm->setVar('gperm_itemid', $id);
            $gpermHandler->insert($gperm);
            unset($gperm);
            //non-Admin groups
            if (is_array($permissionArray)) {
                foreach ($permissionArray as $key => $cat_groupperm) {
                    if ($cat_groupperm > 0) {
                        $gperm = $gpermHandler->create();
                        $gperm->setVar('gperm_groupid', $cat_groupperm);
                        $gperm->setVar('gperm_name', $permissionName);
                        $gperm->setVar('gperm_modid', $mid);
                        $gperm->setVar('gperm_itemid', $id);
                        $gpermHandler->insert($gperm);
                        unset($gperm);
                    }
                }
            } elseif ($permissionArray > 0) {
                $gperm = $gpermHandler->create();
                $gperm->setVar('gperm_groupid', $permissionArray);
                $gperm->setVar('gperm_name', $permissionName);
                $gperm->setVar('gperm_modid', $mid);
                $gperm->setVar('gperm_itemid', $id);
                $gpermHandler->insert($gperm);
                unset($gperm);
            }
        }

        //setPermissions for View items
        $permissionGroup   = 'groupsRead';
        $permissionName    = 'equipment_view';
        $permissionArray   = Request::getArray($permissionGroup, '');
        $permissionArray[] = XOOPS_GROUP_ADMIN;
        //setPermissions($permissionArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid);
        $permHelper->savePermissionForItem($permissionName, $id, $permissionArray);

        //setPermissions for Submit items
        $permissionGroup   = 'groupsSubmit';
        $permissionName    = 'equipment_submit';
        $permissionArray   = Request::getArray($permissionGroup, '');
        $permissionArray[] = XOOPS_GROUP_ADMIN;
        //setPermissions($permissionArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid);
        $permHelper->savePermissionForItem($permissionName, $id, $permissionArray);

        //setPermissions for Approve items
        $permissionGroup   = 'groupsModeration';
        $permissionName    = 'equipment_approve';
        $permissionArray   = Request::getArray($permissionGroup, '');
        $permissionArray[] = XOOPS_GROUP_ADMIN;
        //setPermissions($permissionArray, $permissionGroup, $id, $gpermHandler, $permissionName, $mid);
        $permHelper->savePermissionForItem($permissionName, $id, $permissionArray);

        /*
                    //Form equipment_view
                    $arr_equipment_view = Request::getArray('cat_gperms_read');
                    if ($id > 0) {
                        $sql
                            =
                            'DELETE FROM `' . $GLOBALS['xoopsDB']->prefix('group_permission') . "` WHERE `gperm_name`='equipment_view' AND `gperm_itemid`=$id;";
                        $GLOBALS['xoopsDB']->query($sql);
                    }
                    //admin
                    $gperm = $gpermHandler->create();
                    $gperm->setVar('gperm_groupid', XOOPS_GROUP_ADMIN);
                    $gperm->setVar('gperm_name', 'equipment_view');
                    $gperm->setVar('gperm_modid', $mid);
                    $gperm->setVar('gperm_itemid', $id);
                    $gpermHandler->insert($gperm);
                    unset($gperm);
                    if (is_array($arr_equipment_view)) {
                        foreach ($arr_equipment_view as $key => $cat_groupperm) {
                            $gperm = $gpermHandler->create();
                            $gperm->setVar('gperm_groupid', $cat_groupperm);
                            $gperm->setVar('gperm_name', 'equipment_view');
                            $gperm->setVar('gperm_modid', $mid);
                            $gperm->setVar('gperm_itemid', $id);
                            $gpermHandler->insert($gperm);
                            unset($gperm);
                        }
                    } else {
                        $gperm = $gpermHandler->create();
                        $gperm->setVar('gperm_groupid', $arr_equipment_view);
                        $gperm->setVar('gperm_name', 'equipment_view');
                        $gperm->setVar('gperm_modid', $mid);
                        $gperm->setVar('gperm_itemid', $id);
                        $gpermHandler->insert($gperm);
                        unset($gperm);
                    }
        */

        //===============================================================

        if ($equipmentHandler->insert($equipmentObject)) {
            redirect_header('equipment.php?op=list', 2, AM_EQUIPMENT_FORMOK);
        }

        echo $equipmentObject->getHtmlErrors();
        $form = $equipmentObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_EQUIPMENT, 'equipment.php?op=new', 'add');
        $adminObject->addItemButton(AM_EQUIPMENT_EQUIPMENT_LIST, 'equipment.php', 'list');
        echo $adminObject->displayButton('left');
        $equipmentObject = $equipmentHandler->get(Request::getString('id', ''));
        $form            = $equipmentObject->getForm();
        $form->display();
        break;

    case 'delete':
        $equipmentObject = $equipmentHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('equipment.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($equipmentHandler->delete($equipmentObject)) {
                redirect_header('equipment.php', 3, AM_EQUIPMENT_FORMDELOK);
            } else {
                echo $equipmentObject->getHtmlErrors();
            }
        } else {
            xoops_confirm([
                              'ok' => 1,
                              'id' => Request::getString('id', ''),
                              'op' => 'delete'
                          ], Request::getCmd('REQUEST_URI', '', 'SERVER'), sprintf(AM_EQUIPMENT_FORMSUREDEL, $equipmentObject->getVar('name')));
        }
        break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if (EquipmentUtility::cloneRecord('equipment_equipment', 'id', $id_field)) {
            redirect_header('equipment.php', 3, AM_EQUIPMENT_CLONED_OK);
        } else {
            redirect_header('equipment.php', 3, AM_EQUIPMENT_CLONED_FAILED);
        }

        break;
}
require_once __DIR__ . '/admin_footer.php';
