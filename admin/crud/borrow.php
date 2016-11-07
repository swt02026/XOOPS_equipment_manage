<?php
/**
 * Created by PhpStorm.
 * User: jjes
 * Date: 2016/11/7
 * Time: 下午 02:40
 */

    $append_data = array_map("htmlspecialchars" ,array_map("addslashes", $_POST));
    var_dump($append_data);