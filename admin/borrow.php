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

use Xmf\Module\Admin;
use Xmf\Database\Tables;
use Xmf\Debug;
use Xmf\Module\Helper;
use Xmf\Module\Helper\Permission;
use Xmf\Request;

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();
//It recovered the value of argument op in URL$
$op = Request::getString('op', 'list');
$order   = Request::getString('order', 'desc');
$sort     = Request::getString('sort', '');


$adminObject->displayNavigation(basename(__FILE__));
/** @var Permission $permHelper */
$permHelper = new Permission($moduleDirName);

switch ($op) {
    case 'list':
    default:
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_BORROW, 'borrow.php?op=new', 'add');
        echo $adminObject->displayButton('left');
        $start = Request::getInt('start', 0);
        $borrowPaginationLimit = $GLOBALS['xoopsModuleConfig']['userpager'];

        $criteria = new CriteriaCompo();
        $criteria->setSort('id ASC, borrower');
        $criteria->setOrder('ASC');
        $criteria->setLimit($borrowPaginationLimit);
        $criteria->setStart($start);
        $borrowTempRows = $borrowHandler->getCount();
        $borrowTempArray = $borrowHandler->getAll($criteria);/*
//
// 
                    <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."</th>
//                    </tr>";
//            $class = "odd";
*/

        // Display Page Navigation
        if ($borrowTempRows > $borrowPaginationLimit) {
            require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

            $pagenav = new XoopsPageNav($borrowTempRows, $borrowPaginationLimit, $start, 'start', 
            'op=list' . '&sort=' . $sort . '&order=' . $order 
		    . '');
            $GLOBALS['xoopsTpl']->assign('pagenav', null === $pagenav ? $pagenav->renderNav() : '');
        }

        $GLOBALS['xoopsTpl']->assign('borrowRows', $borrowTempRows);
         $borrowArray = array();

//    $fields = explode('|', id:smallint:5:unsigned:NOT NULL::primary:ID|borrower:varchar:10::NOT NULL::primary:Customer|amount:int:10:unsigned:NOT NULL:::Amount);
//    $fieldsCount    = count($fields);

$criteria = new CriteriaCompo();

//$criteria->setOrder('DESC');
$criteria->setSort($sort);
$criteria->setOrder($order);
$criteria->setLimit($borrowPaginationLimit);
$criteria->setStart($start);


$borrowCount = $borrowHandler->getCount($criteria);
$borrowTempArray = $borrowHandler->getAll($criteria);

//    for ($i = 0; $i < $fieldsCount; ++$i) {
 if ($borrowCount > 0) {
     foreach (array_keys($borrowTempArray) as $i) {


//        $field = explode(':', $fields[$i]);

$selectorid = EquipmentUtility::selectSorting(AM_EQUIPMENT_BORROW_ID, 'id');
$GLOBALS['xoopsTpl']->assign('selectorid', $selectorid);
 $borrowArray['id'] = $borrowTempArray[$i]->getVar('id');

$selectorborrower = EquipmentUtility::selectSorting(AM_EQUIPMENT_BORROW_BORROWER, 'borrower');
$GLOBALS['xoopsTpl']->assign('selectorborrower', $selectorborrower);
 $borrowArray['borrower'] = $borrowTempArray[$i]->getVar('borrower');

$selectoramount = EquipmentUtility::selectSorting(AM_EQUIPMENT_BORROW_AMOUNT, 'amount');
$GLOBALS['xoopsTpl']->assign('selectoramount', $selectoramount);
 $borrowArray['amount'] = $borrowTempArray[$i]->getVar('amount');
            $borrowArray['edit_delete'] =
              "<a href='borrow.php?op=edit&id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
               <a href='borrow.php?op=delete&id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
               <a href='borrow.php?op=clone&id=" . $i . "'><img src=" . $pathIcon16 . "/editcopy.png alt='" . _CLONE . "' title='". _CLONE . "'></a>";


 $GLOBALS['xoopsTpl']->append_by_ref('borrowArrays', $borrowArray);
unset($borrowArray);
    }
unset($borrowTempArray);
    // Display Navigation
    if ($borrowCount > $borrowPaginationLimit) {
        require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($borrowCount, $borrowPaginationLimit, $start, 'start', 
        'op=list' . '&sort=' . $sort . '&order=' . $order 
		. '');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }


//                     echo "<td class='center width5'>

//                    <a href='borrow.php?op=edit&id=".$i."'><img src=".$pathIcon16."/edit.png alt='"._EDIT."' title='"._EDIT."'></a>
//                    <a href='borrow.php?op=delete&id=".$i."'><img src=".$pathIcon16."/delete.png alt='"._DELETE."' title='"._DELETE."'></a>
//                    </td>";

//                echo "</tr>";

//            }

//            echo "</table><br><br>";

//        } else {

//            echo "<table width='100%' cellspacing='1' class='outer'>

//                    <tr>

 //                     <th class='center width5'>".AM_EQUIPMENT_FORM_ACTION."XXX</th>
//                    </tr><tr><td class='errorMsg' colspan='4'>There are noXXX borrow</td></tr>";
//            echo "</table><br><br>";

//-------------------------------------------

        echo $GLOBALS['xoopsTpl']->fetch(
            XOOPS_ROOT_PATH . '/modules/' . $GLOBALS['xoopsModule']->getVar('dirname') . '/templates/admin/equipment_admin_borrow.tpl'
        );
}

    
    break;

    case 'new':
        $adminObject->addItemButton(AM_EQUIPMENT_BORROW_LIST, 'borrow.php', 'list');
        echo $adminObject->displayButton('left');

        $borrowObject = $borrowHandler->create();
        $form = $borrowObject->getForm();
        $form->display();
        break;

    case 'save':
        if ( !$GLOBALS['xoopsSecurity']->check() ) {
           redirect_header('borrow.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (0 != Request::getInt('id', 0)) {
           $borrowObject = $borrowHandler->get(Request::getInt('id', 0));
        } else {
           $borrowObject = $borrowHandler->create();
        }
// Form save fields
        $borrowObject->setVar('borrower',  Request::getVar('borrower', ''));
        $borrowObject->setVar('amount',  Request::getVar('amount', ''));
        if ($borrowHandler->insert($borrowObject)) {
           redirect_header('borrow.php?op=list', 2, AM_EQUIPMENT_FORMOK);
        }

        echo $borrowObject->getHtmlErrors();
        $form = $borrowObject->getForm();
        $form->display();
    break;

    case 'edit':
        $adminObject->addItemButton(AM_EQUIPMENT_ADD_BORROW, 'borrow.php?op=new', 'add');
        $adminObject->addItemButton(AM_EQUIPMENT_BORROW_LIST, 'borrow.php', 'list');
        echo $adminObject->displayButton('left');
        $borrowObject = $borrowHandler->get(Request::getString('id', ''));
        $form = $borrowObject->getForm();
        $form->display();
    break;

    case 'delete':
        $borrowObject = $borrowHandler->get(Request::getString('id', ''));
        if (1 == Request::getInt('ok', 0))  {
            if ( !$GLOBALS['xoopsSecurity']->check() ) {
                redirect_header('borrow.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($borrowHandler->delete($borrowObject)) {
                redirect_header('borrow.php', 3, AM_EQUIPMENT_FORMDELOK);
            } else {
                echo $borrowObject->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'id' => Request::getString('id', ''), 'op' => 'delete'), Request::getCmd('REQUEST_URI','', 'SERVER'), sprintf(AM_EQUIPMENT_FORMSUREDEL, $borrowObject->getVar('borrower')));
        }
    break;

    case 'clone':

        $id_field = Request::getString('id', '');

        if (EquipmentUtility::cloneRecord('equipment_borrow', 'id', $id_field )) {
        redirect_header('borrow.php', 3, AM_EQUIPMENT_CLONED_OK);
        } else {
            redirect_header('borrow.php', 3, AM_EQUIPMENT_CLONED_FAILED);
        }

     break;
}
require_once __DIR__ . '/admin_footer.php';
