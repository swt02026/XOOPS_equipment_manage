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

use Xmf\Language;

if ((!defined('XOOPS_ROOT_PATH')) || !$GLOBALS['xoopsUser'] instanceof XoopsUser
    || !$GLOBALS['xoopsUser']->IsAdmin()) {
    exit('Restricted access' . PHP_EOL);
}

/**
 * @param string $tablename
 *
 * @return bool
 */
function tableExists($tablename)
{
    $result = $GLOBALS['xoopsDB']->queryF("SHOW TABLES LIKE '$tablename'");

    return ($GLOBALS['xoopsDB']->getRowsNum($result) > 0);
}

/**
 *
 * Prepares system prior to attempting to install module
 * @param XoopsModule $module {@link XoopsModule}
 *
 * @return bool true if ready to install, false if not
 */
function xoops_module_pre_update_equipment(XoopsModule $module)
{
    $moduleDirName = basename(dirname(__DIR__));
    $className     = ucfirst($moduleDirName) . 'Utility';
    if (!class_exists($className)) {
        xoops_load('utility', $moduleDirName);
    }
    //check for minimum XOOPS version
    if (!$className::checkVerXoops($module)) {
        return false;
    }

    // check for minimum PHP version
    if (!$className::checkVerPhp($module)) {
        return false;
    }

    return true;
}

/**
 *
 * Performs tasks required during update of the module
 * @param XoopsModule $module {@link XoopsModule}
 * @param null        $previousVersion
 *
 * @return bool true if update successful, false if not
 */

function xoops_module_update_equipment(XoopsModule $module, $previousVersion = null)
{
    //    global $xoopsDB;
    $moduleDirName = basename(dirname(__DIR__));
    $capsDirName   = strtoupper($moduleDirName);

    if ($previousVersion < 240) {
        $configurator = include __DIR__ . '/config.php';
        $classUtility = ucfirst($moduleDirName) . 'Utility';
        if (!class_exists($classUtility)) {
            xoops_load('utility', $moduleDirName);
        }

        //delete old HTML templates
        if (count($configurator['templateFolders']) > 0) {
            foreach ($configurator['templateFolders'] as $folder) {
                $templateFolder = $GLOBALS['xoops']->path('modules/' . $moduleDirName . $folder);
                if (is_dir($templateFolder)) {
                    $templateList = array_diff(scandir($templateFolder, SCANDIR_SORT_NONE), array('..', '.'));
                    foreach ($templateList as $k => $v) {
                        $fileInfo = new SplFileInfo($templateFolder . $v);
                        if ($fileInfo->getExtension() === 'html' && $fileInfo->getFilename() !== 'index.html') {
                            if (file_exists($templateFolder . $v)) {
                                unlink($templateFolder . $v);
                            }
                        }
                    }
                }
            }
        }

        //  ---  DELETE OLD FILES ---------------
        if (count($configurator['oldFiles']) > 0) {
            //    foreach (array_keys($GLOBALS['uploadFolders']) as $i) {
            foreach (array_keys($configurator['oldFiles']) as $i) {
                $tempFile = $GLOBALS['xoops']->path('modules/' . $moduleDirName . $configurator['oldFiles'][$i]);
                if (is_file($tempFile)) {
                    unlink($tempFile);
                }
            }
        }

        //  ---  DELETE OLD FOLDERS ---------------
        xoops_load('XoopsFile');
        if (count($configurator['oldFolders']) > 0) {
            //    foreach (array_keys($GLOBALS['uploadFolders']) as $i) {
            foreach (array_keys($configurator['oldFolders']) as $i) {
                $tempFolder = $GLOBALS['xoops']->path('modules/' . $moduleDirName . $configurator['oldFolders'][$i]);
                /** @var XoopsObjectHandler $folderHandler */
                $folderHandler = XoopsFile::getHandler('folder', $tempFolder);
                $folderHandler->delete($tempFolder);
            }
        }

        //  ---  CREATE FOLDERS ---------------
        if (count($configurator['uploadFolders']) > 0) {
            //    foreach (array_keys($GLOBALS['uploadFolders']) as $i) {
            foreach (array_keys($configurator['uploadFolders']) as $i) {
                $classUtility::createFolder($configurator['uploadFolders'][$i]);
            }
        }

        //  ---  COPY blank.png FILES ---------------
        if (count($configurator['copyBlankFiles']) > 0) {
            $file = __DIR__ . '/../assets/images/blank.png';
            foreach (array_keys($configurator['copyBlankFiles']) as $i) {
                $dest = $configurator['copyBlankFiles'][$i] . '/blank.png';
                $classUtility::copyFile($file, $dest);
            }
        }

        //delete .html entries from the tpl table
        $sql = 'DELETE FROM ' . $GLOBALS['xoopsDB']->prefix('tplfile') . " WHERE `tpl_module` = '" . $module->getVar('dirname', 'n') . "' AND `tpl_file` LIKE '%.html%'";
        $GLOBALS['xoopsDB']->queryF($sql);
    }

    return true;
}
