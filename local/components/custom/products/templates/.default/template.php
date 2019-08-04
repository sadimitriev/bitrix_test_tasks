<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:37
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if ($arResult["ITEMS"]):?>
    <h4>Колличество товаров: <b><?=$arResult['COUNT']?></b></h4>
    <ul class="list-group">
<?
    foreach ($arResult["ITEMS"] as $item):
?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?=$item["NAME"]?>
            <span class="badge badge-primary badge-pill"><?=$item["PRICE"]?></span>
        </li>
<?  endforeach;?>
    </ul>
<?else:?>
    <div class="list-group">
        <div class="list-group-item list-group-item-action list-group-item-danger">Товаров не найдено</div>
    </div>
<?endif;?>