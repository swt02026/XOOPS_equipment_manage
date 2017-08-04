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
require_once dirname(dirname(dirname(__DIR__))) . '/mainfile.php';

// get path to icons
$pathIcon32 = Xmf\Module\Admin::menuIconPath('');

$moduleDirName = basename(dirname(__DIR__));
$capsDirName   = strtoupper($moduleDirName);

$dirVarName = 'MD_' . $capsDirName . '_DIRNAME';
if (@!defined($dirVarName)) {
    define('MD_' . $capsDirName . '_DIRNAME', $moduleDirName);
    define('MD_' . $capsDirName . '_PATH', XOOPS_ROOT_PATH . '/modules/' . $moduleDirName);
    define('MD_' . $capsDirName . '_URL', XOOPS_URL . '/modules/' . $moduleDirName);
    define('MD_' . $capsDirName . '_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . $moduleDirName);
    //define('MD_' . $capsDirName . '_AUTHOR_LOGOIMG', constant($capsDirName . '_URL') . '/assets/images/logoModule.png');
    define($capsDirName . '_AUTHOR_LOGOIMG', $pathIcon32 . '/xoopsmicrobutton.gif');
    // Define here the place where main upload path
    define($capsDirName . '_UPLOAD_URL', XOOPS_UPLOAD_URL . '/' . $moduleDirName); // WITHOUT Trailing slash
    define($capsDirName . '_UPLOAD_PATH', XOOPS_UPLOAD_PATH . '/' . $moduleDirName); // WITHOUT Trailing slash
}



// module information

$copyright = "<a href='https://xoops.org' title='XOOPS Project' target='_blank'>  
                      <img src='" . constant($capsDirName . '_AUTHOR_LOGOIMG') . "' alt='XOOPS Project' ></a>";

echo $copyright;
//Configurator
return array(
    'name'           => 'Module Configurator',
    'uploadFolders'  => array(
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/images',
        constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
    ),
    'copyBlankFiles' => array(
        //        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/images',
        constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
    ),

    'copyTestFolders' => array(
        //        constant($capsDirName . '_UPLOAD_PATH'),
        array(
            constant('MD_' . $capsDirName . '_PATH') . '/testdata/images',
            constant($capsDirName . '_UPLOAD_PATH') . '/images',
        )
    ),

    'templateFolders' => array(
        '/templates/',
        '/templates/blocks/',
        '/templates/admin/'

    ),
    'oldFiles'        => array(
        '/include/update_functions.php',
        '/include/install_functions.php'
    ),
    'oldFolders'      => array(
        '/images',
        '/css',
        '/js',
        '/tcpdf',
        '/images',
    ),
);
