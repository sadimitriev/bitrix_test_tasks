<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:09
 */
define("IBLOCK_PRODUCTS" , 1);
define("IBLOCK_OFFERS" , 2);

function d($dump) {
    ob_start();
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    $page = ob_get_contents();
    ob_end_clean();
    echo $page;
}
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "cacheUpdate"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass", "cacheUpdate"));
AddEventHandler("iblock", "OnAfterIBlockElementDelete", Array("MyClass", "cacheUpdate"));

AddEventHandler("iblock", "OnBeforeIBlockSectionAdd", Array("MyClass", "cacheUpdate"));
AddEventHandler("iblock", "OnBeforeIBlockSectionUpdate", Array("MyClass", "cacheUpdate"));
AddEventHandler("iblock", "OnBeforeIBlockSectionDelete", Array("MyClass", "cacheUpdate"));


class MyClass {
    function cacheUpdate(&$arFields) {
        $obCache = new CPHPCache();
        $obCache->CleanDir('/iblockCache_' . IBLOCK_PRODUCTS);
    }
}


