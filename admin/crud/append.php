<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/1
 * Time: 下午 02:29
 */
include __DIR__ . '/../../../../mainfile.php';
include __DIR__ . '/../../../../class/uploader.php';
/*
function getImageInBase64()
{
    $tmp_name   = $_FILES['image']['tmp_name'];
    $file_name  = $_FILES['image']['name'];
    $verify_img = getimagesize($tmp_name);
    $file_mime  = $verify_img['mime'];

    if (file_exists($tmp_name)
        && false !== strpos($file_mime, 'image/')) {
        $file_path = '../../../../uploads/$filename';
        move_uploaded_file($tmp_name, $file_path);
        $img_data = base64_encode(file_get_contents($file_path));
        unlink($file_path);

        return "data:$file_mime;base64,$img_data";
    }

    return '';
}
*/

$append_data = array_map('htmlspecialchars', array_map('addslashes', $_POST));
global $xoopsDB, $xoopsUser;
if (strlen($append_data['name'])
    && strlen($append_data['amount'])
    && (int)$append_data['amount'] > 0) {
    $post_data_name   = $append_data['name'];
    $post_data_amount = (int)$append_data['amount'];
    $owner            = $xoopsUser->uname();
    $totalAmount      = $post_data_amount;

    $image = $append_data['image'];

    $sql = sprintf("INSERT INTO %s(`name`, `owner`, `amount`, `total`, `image`) 
                        VALUES('{$post_data_name}',
                          '{$owner}',
                          {$post_data_amount},
                          {$post_data_amount}, 
                          '{$image}');", $xoopsDB->prefix('equipment_equipment'));

    $xoopsDB->queryF($sql);
}

header('location:../equipment_vue.php');
//echo "<script>window.location.href='../manage.php';</script>";
