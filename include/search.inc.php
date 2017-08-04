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
/**
 *  equipment_search
 *
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return array|bool
 */
function equipment_search($queryarray, $andor, $limit, $offset, $userid)
{
    $sql = 'SELECT id, last FROM ' . $GLOBALS['xoopsDB']->prefix('equipment_customer') . ' WHERE _online = 1';

    if ($userid !== 0) {
        $sql .= ' AND _submitter=' . (int)$userid;
    }

    if (is_array($queryarray) && $count = count($queryarray)) {
        $sql .= ' AND ((address LIKE ' . $queryarray[0] . ' OR city LIKE ' . $queryarray[0] . ' OR country LIKE ' . $queryarray[0] . ')';

        for ($i = 1; $i < $count; ++$i) {
            $sql .= " $andor ";
            $sql .= '(address LIKE ' . $queryarray[$i] . ' OR city LIKE ' . $queryarray[$i] . ' OR country LIKE ' . $queryarray[0] . ')';
        }
        $sql .= ')';
    }

    $sql    .= ' ORDER BY id DESC';
    $result = $GLOBALS['xoopsDB']->query($sql, $limit, $offset);
    $ret    = array();
    $i      = 0;
    while (false !== ($myrow = $GLOBALS['xoopsDB']->fetchArray($result))) {
        $ret[$i]['image'] = 'assets/images/icons/32/_search.png';
        $ret[$i]['link']  = 'customer.php?id=' . $myrow['id'];
        $ret[$i]['title'] = $myrow['last'];
        ++$i;
    }

    return $ret;
}
