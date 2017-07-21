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
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_RENTALS, 'rentals.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start                  = Request::getInt('start', 0);
        $rentalsPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

        $criteria = new CriteriaCompo();
        $criteria->setSort('id ASC, customerid');
        $criteria->setOrder('ASC');
        $criteria->setLimit($rentalsPaginationLimit);
        $criteria->setStart($start);
    /** @var EquipmentRentalsHandler $rentalsHandler */
        $rentalsTempRows = $rentalsHandler->getCount();
        $rentalsTempArray = $rentalsHandler->getAll($criteria);/*
//
// 
                    <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($rentalsTempRows > $rentalsPaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($rentalsTempRows, $rentalsPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('rentalsRows', $rentalsTempRows);
        $rentalsArray = array();

        //    $fields = explode('|', id:smallint:5:unsigned:NOT NULL::primary:ID|customerid:int:5::NOT NULL::primary:Customer|equipmentid:int:10:unsigned:NOT NULL:::Equipment|quantity:int:8::NOT NULL:::Quantity|datefrom:datetime:::NOT NULL:::From|dateto:datetime:::NOT NULL:::To);
        //    $fieldsCount    = count($fields);

        $criteria = new CriteriaCompo();

        //$criteria->setOrder('DESC');
        $criteria->setSort($sort);
        $criteria->setOrder($order);
        $criteria->setLimit($rentalsPaginationLimit);
        $criteria->setStart($start);

        $rentalsCount     = $rentalsHandler->getCount($criteria);
        $rentalsTempArray = $rentalsHandler->getAll($criteria);

        //    for ($i = 0; $i < $fieldsCount; ++$i) {
        if ($rentalsCount > 0) {
            foreach (array_keys($rentalsTempArray) as $i) {


                //        $field = explode(':', $fields[$i]);

                $selectorid = EquipmentUtility::selectSorting(AM_EQUIPMENT_RENTALS_ID, 'id');
                $GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
                $rentalsArray['id'] = $rentalsTempArray[$i]->getVar('id');

                $selectorcustomerid = EquipmentUtility::selectSorting(AM_EQUIPMENT_RENTALS_CUSTOMERID, 'customerid');
                $GLOBALS['xoopsTpl']->assign('selectorcustomerid', $selectorcustomerid);
                if(null !==($customerHandler->get($rentalsTempArray[$i]->getVar('customerid')))) {
                    $rentalsArray['customerid'] = $customerHandler->get($rentalsTempArray[$i]->getVar('customerid'))->getVar('last');
                }

                $selectorequipmentid = EquipmentUtility::selectSorting(AM_EQUIPMENT_RENTALS_EQUIPMENTID, 'equipmentid');
                $GLOBALS['xoopsTpl']->assign('selectorequipmentid', $selectorequipmentid);
                if(null !==($equipmentHandler->get($rentalsTempArray[$i]->getVar('equipmentid')))) {
                    $rentalsArray['equipmentid'] = $equipmentHandler->get($rentalsTempArray[$i]->getVar('equipmentid'))->getVar('name');
                }

                $selectorquantity = EquipmentUtility::selectSorting(AM_EQUIPMENT_RENTALS_QUANTITY, 'quantity');
                $GLOBALS['xoopsTpl']->assign('selectorquantity', $selectorquantity);
                $rentalsArray['quantity'] = $rentalsTempArray[$i]->getVar('quantity');

                $selectordatefrom = EquipmentUtility::selectSorting(AM_EQUIPMENT_RENTALS_DATEFROM, 'datefrom');
                $GLOBALS['xoopsTpl']->assign('selectordatefrom', $selectordatefrom);
                $rentalsArray['datefrom'] = date(_SHORTDATESTRING, strtotime($rentalsTempArray[$i]->getVar('datefrom')));

                $selectordateto = EquipmentUtility::selectSorting(AM_EQUIPMENT_RENTALS_DATETO, 'dateto');
                $GLOBALS['xoopsTpl']->assign('selectordateto', $selectordateto);
                $rentalsArray['dateto']      = date(_SHORTDATESTRING, strtotime($rentalsTempArray[$i]->getVar('dateto')));
                $rentalsArray['edit_delete'] = "<a href='rentals.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='rentals.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='rentals.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='" . _CLONE . "'></a>";

                $GLOBALS['xoopsTpl']->append_by_ref('rentalsArrays', $rentalsArray);
                unset($rentalsArray);
            }
            unset($rentalsTempArray);
            // Display Navigation
            if ($rentalsCount > $rentalsPaginationLimit) {
                require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new XoopsPageNav($rentalsCount, $rentalsPaginationLimit, $start, 'start', 'op=list' . '&sort=' . $sort . '&order=' . $order . '');
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
            }

            //                     echo "<td class='center width5'>

            //                    <a href='rentals.php?op=edit&id=".$i."'><img src=".$pathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
            //                    <a href='rentals.php?op=delete&id=".$i."'><img src=".$pathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
            //                    </td>";

            //                echo "</tr>";

            //            }

            //            echo "</table><br><br>";

            //        } else {

            //            echo "<table width='100%' cellspacing='1' class='outer'>

            //                    <tr>

            //                     <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."XXX</th>
            //                    </tr><tr><td class='errorMsg' colspan='7'>There are noXXX rentals</td></tr>";
            //            echo "</table><br><br>";

            //-------------------------------------------

            echo $GLOBALS['xoopsTpl']->fetch(XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/equipment_admin_rentals.tpl');
        }

        break;

    case 'new':
        $adminObject->addItemButton(AM_EQUIPMENT_RENTALS_LIST, 'rentals.php', 'list');
        echo $adminObject->displayButton('left');

        $rentalsObject = $rentalsHandler->create();
        $form          = $rentalsObject->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('rentals.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
            $rentalsObject = $rentalsHandler->get(Request::getInt('id', 0));
        } else {
            $rentalsObject = $rentalsHandler->create();
        }
        // Form save fields
        $rentalsObject->setVar('customerid', Request::getVar('customerid', ''));
        $rentalsObject->setVar('equipmentid', Request::getVar('equipmentid', ''));
        $rentalsObject->setVar('quantity', Request::getVar('quantity', ''));
        $rentalsObject->setVar('datefrom', $_REQUEST['datefrom']);
        $rentalsObject->setVar('dateto', $_REQUEST['dateto']);
        if ($rentalsHandler->insert($rentalsObject)) {
            redirect_header('rentals.php?op=list', 2, AM_EQUIPMENT_FORMOK);
        }

        echo $rentalsObject->getHtmlErrors();
        $form = $rentalsObject->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_RENTALS, 'rentals.php?op=new', 'add');
        $adminObject->addItemButton(AM_EQUIPMENT_RENTALS_LIST, 'rentals.php', 'list');
        echo $adminObject->displayButton('left');
        $rentalsObject = $rentalsHandler->get(Request::getString('id', ''));
        $form          = $rentalsObject->getForm();
        $form->display();
        break;

    case 'delete':
        $rentalsObject = $rentalsHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0)) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('rentals.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($rentalsHandler->delete($rentalsObject)) {
                redirect_header('rentals.php', 3, AM_EQUIPMENT_FORMDELOK);
            } else {
                echo $rentalsObject->getHtmlErrors();
            }
        } else {
            xoops_confirm(array(
                              'ok' => 1,
                              'id' => Request::getString('id', ''),
                              'op' => 'delete'
                          ), Request::getCmd('REQUEST_URI', '', 'SERVER'), sprintf(AM_EQUIPMENT_FORMSUREDEL, $rentalsObject->getVar('customerid')));
        }
        break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if (EquipmentUtility::cloneRecord('equipment_rentals', 'id', $id_field)) {
            redirect_header('rentals.php', 3, AM_EQUIPMENT_CLONED_OK);
        } else {
            redirect_header('rentals.php', 3, AM_EQUIPMENT_CLONED_FAILED);
        }

        break;
}
require_once __DIR__ . '/admin_footer.php';
