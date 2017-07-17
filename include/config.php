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
$capsDirName = strtoupper($moduleDirName);

//if (!defined($moduleDirName . '_DIRNAME')) {
if (@!defined('MD_' . constant($capsDirName . '_DIRNAME'))) {
    define('MD_' . $capsDirName . '_DIRNAME', $moduleDirName);
    define('MD_' . $capsDirName . '_PATH', XOOPS_ROOT_PATH . '/modules/' . constant('MD_' . $capsDirName . '_DIRNAME'));
    define('MD_' . $capsDirName . '_URL', XOOPS_URL . '/modules/' . constant('MD_' . $capsDirName . '_DIRNAME'));
 // define('MD_' . $capsDirName . '_ADMIN', constant('MD_' . $capsDirName . '_URL') . '/admin/index.php');
    define('MD_' . $capsDirName . '_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . constant('MD_' . $capsDirName . '_DIRNAME'));
  //define('MD_' . $capsDirName . '_AUTHOR_LOGOIMG', constant($capsDirName . '_URL') . '/assets/images/logoModule.png');
    define($capsDirName . '_AUTHOR_LOGOIMG', $pathIcon32 . '/xoopsmicrobutton.gif');
}

// Define here the place where main upload path

//$img_dir = $GLOBALS['xoopsModuleConfig']['uploadDir'];

define($capsDirName . '_UPLOAD_URL', XOOPS_UPLOAD_URL . '/' .$moduleDirName); // WITHOUT Trailing slash
//define("XXXXXX_UPLOAD_PATH", $img_dir); // WITHOUT Trailing slash
define($capsDirName . '_UPLOAD_PATH', XOOPS_UPLOAD_PATH . '/' . $moduleDirName); // WITHOUT Trailing slash

// module information
//$copyright = "<a href='{$mod_a_w_url}' title='{$mod_a_w_name}' target='_blank'>
//                     <img src='".{$stu_mn}_AUTHOR_LOGOIMG."' alt='{$mod_a_w_name}' /></a>";                     
$copyright = "<a href='https://xoops.org' title='XOOPS Project' target='_blank'>  
                      <img src='" .  constant($capsDirName . '_AUTHOR_LOGOIMG') . "' alt='XOOPS Project' /></a>";
                                       
      

//constant($cloned_lang . '_CATEGORY_NOTIFY')
/*
$uploadFolders = array(
    constant($capsDirName . '_UPLOAD_PATH'),
    constant($capsDirName . '_UPLOAD_PATH') . '/images',
    constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
);


$copyFiles = array(
    constant($capsDirName . '_UPLOAD_PATH'),
    constant($capsDirName . '_UPLOAD_PATH') . '/images',
    constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
);

$oldFiles = array(
    '/include/update_functions.php',
    '/include/install_functions.php'
);
*/

//Configurator
return array(
    'name'          => 'Module Configurator',
    'uploadFolders' => array(
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/images',
        constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
    ),
    'copyBlankFiles'     => array(
        constant($capsDirName . '_UPLOAD_PATH'),
        constant($capsDirName . '_UPLOAD_PATH') . '/images',
        constant($capsDirName . '_UPLOAD_PATH') . '/images/thumbnails'
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
    'oldFolders'        => array(
        '/images',
        '/css',
        '/js',
        '/tcpdf',
        '/images',
    ),
);