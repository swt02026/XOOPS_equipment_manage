<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/1
 * Time: 下午 02:29
 */
    include '../../../../mainfile.php';
    include '../../../../class/uploader.php';

    $append_data = array_map("htmlspecialchars" ,array_map("addslashes", $_POST));

    /*if(strlen( $append_data["name"]) &&
        strlen($append_data["amount"]) &&
        intval($append_data["amount"]) > 0) {

        $post_data_name = $append_data["name"];
        $post_data_amount = intval($append_data["amount"]);
        $owner = $xoopsUser->uname();
        $totalAmount = $post_data_amount;

        $sql = sprintf("INSERT INTO %s(`name`, `owner`, `amount`, `total`) 
                        VALUES('{$post_data_name}', '{$owner}', {$post_data_amount}, {$post_data_amount});"
            , $xoopsDB->prefix('equipment_desc'));

        $xoopsDB->queryF($sql);
    }*/


    //echo "<script>window.location.href='../manage.php';</script>";
    $img_data = '';
    $tmp_name = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $img_path = "$tmp_name/$file_name";
    echo $img_path;
    $img_data = base64_encode(file_get_contents($img_path));
    $img_mime = mime_content_type($img_path);
    $src = "data:$img_mime;base64,$img_data";
    echo "<img src={$src}>";