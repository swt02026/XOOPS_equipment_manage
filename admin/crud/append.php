<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/1
 * Time: 下午 02:29
 */
    include '../../../../mainfile.php';
    include '../../../../class/uploader.php';


    function getImageInBase64(){

        $tmp_name = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];

        $file_path = '../../../../uploads/$filename';
        move_uploaded_file($tmp_name, $file_path);

        $img_data = base64_encode(file_get_contents($file_path));
        $img_mime = mime_content_type($file_path);
        unlink($file_path);

        return "data:$img_mime;base64,$img_data";
    }

    $append_data = array_map("htmlspecialchars" ,array_map("addslashes", $_POST));

    if(strlen( $append_data["name"]) &&
        strlen($append_data["amount"]) &&
        intval($append_data["amount"]) > 0) {

        $post_data_name = $append_data["name"];
        $post_data_amount = intval($append_data["amount"]);
        $owner = $xoopsUser->uname();
        $totalAmount = $post_data_amount;

        $image_b64 = getImageInBase64();

        $sql = sprintf("INSERT INTO %s(`name`, `owner`, `amount`, `total`, `image_b64`) 
                        VALUES('{$post_data_name}',
                          '{$owner}',
                          {$post_data_amount},
                          {$post_data_amount}, 
                          '{$image_b64}');"
            , $xoopsDB->prefix('equipment_desc'));

        $xoopsDB->queryF($sql);
        echo "<img src='$image_b64'>";
    }

    //echo "<script>window.location.href='../manage.php';</script>";
