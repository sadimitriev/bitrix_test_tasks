<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 14:39
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");
?>
    <div class="container">
        <?$APPLICATION->IncludeComponent(
            "custom:catalog",
            ".default",
            array(
                "IBLOCK_ID" => IBLOCK_PRODUCTS,
                "CACHE_TIME" => "3600"
            ),
            false
        );?>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>