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
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_CUSTOMER, 'customer.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start                   = Request::getInt('start', 0);
        $customerPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

        $criteria = new CriteriaCompo();
        $criteria->setSort('id ASC, last');
        $criteria->setOrder('ASC');
        $criteria->setLimit($customerPaginationLimit);
        $criteria->setStart($start);
        $customerTempRows  = $customerHandler->getCount();
        $customerTempArray = $customerHandler->getAll($criteria);/*
//
// 
                    <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($customerTempRows > $customerPaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($customerTempRows, $customerPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('customerRows', $customerTempRows);
        $customerArray = array();

        //    $fields = explode('|', id:int:8::NOT NULL::primary:ID|first:varchar:30::NOT NULL::unique:First Name|last:varchar:50::NOT NULL::unique:Last Name|address:varchar:100::NOT NULL::unique:Address|city:varchar:100::NOT NULL:::City|country:varchar:20::NOT NULL:::Country|created:datetime:::NOT NULL:::Since);
        //    $fieldsCount    = count($fields);

        $criteria = new CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($customerPaginationLimit);
        $criteria->setStart($start);

        $customerCount     = $customerHandler->getCount($criteria);
        $customerTempArray = $customerHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($customerCount > 0) {
            foreach (array_keys($customerTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $selectorid = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_ID, 'id');
                $GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
                $customerArray['id'] = $customerTempArray[$i]->getVar('id');

                $selectorfirst = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_FIRST, 'first');
                $GLOBALS['xoopsTpl']->assign('selectorfirst', $selectorfirst);
                $customerArray['first'] = $customerTempArray[$i]->getVar('first');

                $selectorlast = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_LAST, 'last');
                $GLOBALS['xoopsTpl']->assign('selectorlast', $selectorlast);
                $customerArray['last'] = $customerTempArray[$i]->getVar('last');

                $selectoraddress = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_ADDRESS, 'address');
                $GLOBALS['xoopsTpl']->assign('selectoraddress', $selectoraddress);
                $customerArray['address'] = $customerTempArray[$i]->getVar('address');

                $selectorcity = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_CITY, 'city');
                $GLOBALS['xoopsTpl']->assign('selectorcity', $selectorcity);
                $customerArray['city'] = $customerTempArray[$i]->getVar('city');

                $selectorcountry = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_COUNTRY, 'country');
                $GLOBALS['xoopsTpl']->assign('selectorcountry', $selectorcountry);
                $customerArray['country'] = $customerTempArray[$i]->getVar('country');

                $selectorcreated = EquipmentUtility::selectSorting(AM_EQUIPMENT_CUSTOMER_CREATED, 'created');
                $GLOBALS['xoopsTpl']->assign('selectorcreated', $selectorcreated);
                $customerArray['created']     = date(_SHORTDATESTRING, strtotime($customerTempArray[$i]->getVar('created')));
                $customerArray['edit_delete'] = "<a href='customer.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='customer.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='customer.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('customerArrays', $customerArray);
                unset($customerArray);
            }
            unset($customerTempArray);
            // Display Navigation
            if ($customerCount > $customerPaginationLimit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new XoopsPageNav($customerCount, $customerPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            //                     echo "<td class='center width5'>

            //                    <a href='customer.php?op=edit&id=".$i."'><img src=".$pathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
            //                    <a href='customer.php?op=delete&id=".$i."'><img src=".$pathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
            //                    </td>";

            //                echo "</tr>";

            //            }

            //            echo "</table><br><br>";

            //        } else {

            //            echo "<table width='100%' cellspacing='1' class='outer'>

            //                    <tr>

            //                     <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."XXX</th>
            //                    </tr><tr><td class='errorMsg' colspan='8'>There are noXXX customer</td></tr>";
            //            echo "</table><br><br>";

            //-------------------------------------------

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/equipment_admin_customer.tpl');
        }

        break;

    case 'new':
        $adminObject->addItemButton(AM_EQUIPMENT_CUSTOMER_LIST, 'customer.php', 'list');
        echo $adminObject->displayButton('left');

        $customerObject = $customerHandler->create();
        $form           = $customerObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('customer.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
            $customerObject = $customerHandler->get(Request::getInt('id', 0));
        } else {
            $customerObject = $customerHandler->create();
        }
        // Form save fields
        $customerObject->setVar('first', Request::getVar('first', ''));
        $customerObject->setVar('last', Request::getVar('last', ''));
        $customerObject->setVar('address', Request::getVar('address', ''));
        $customerObject->setVar('city', Request::getVar('city', ''));
        $customerObject->setVar('country', Request::getVar('country', ''));
        $customerObject->setVar('created', $_REQUEST['created']);
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

        if ($customerHandler->insert($customerObject)) {
            redirect_header('customer.php?op=list', 2, AM_EQUIPMENT_FORMOK);
        }

        echo $customerObject->getHtmlErrors();
        $form = $customerObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_CUSTOMER, 'customer.php?op=new', 'add');
        $adminObject->addItemButton(AM_EQUIPMENT_CUSTOMER_LIST, 'customer.php', 'list');
        echo $adminObject->displayButton('left');
        $customerObject = $customerHandler->get(Request::getString('id', ''));
        $form           = $customerObject->getForm();
        $form->display();
        break;

    case 'delete':
        $customerObject = $customerHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('customer.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($customerHandler->delete($customerObject)) {
                redirect_header('customer.php', 3, AM_EQUIPMENT_FORMDELOK);
            } else {
                echo $customerObject->getHtmlErrors();
            }
        } else {
            xoops_confirm(array(
                              'ok' => 1,
                              'id' => Request::getString('id', ''),
                              'op' => 'delete'
                          ), Request::getCmd('REQUEST_URI', '', 'SERVER'), sprintf(AM_EQUIPMENT_FORMSUREDEL, $customerObject->getVar('last')));
        }
        break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if (EquipmentUtility::cloneRecord('equipment_customer', 'id', $id_field)) {
            redirect_header('customer.php', 3, AM_EQUIPMENT_CLONED_OK);
        } else {
            redirect_header('customer.php', 3, AM_EQUIPMENT_CLONED_FAILED);
        }

        break;
}
require_once __DIR__ . '/admin_footer.php';
