<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:37
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent(
    "custom:sectionsTree",
    ".default",
    array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "CACHE_TIME" => $arParams["CACHE_TIME"]
    ),
    false
);
?>