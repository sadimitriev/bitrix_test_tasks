<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:37
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

function getTreeSection($sections, $parent = 0) {
    $html = '';
    foreach ($sections[$parent] as $section):
        $html .= '<a class="nav-link" href="'.$section["CODE"].'">'.$section["NAME"].'</a>';
        if (!empty($sections[$section["ID"]])) :
            $html .= '<nav class="nav nav-pills flex-column ml-3 my-1">';
            $html .= getTreeSection($sections, $section["ID"]);
            $html .= '</nav>';
        endif;
    endforeach;
    return $html;
}
?>

<nav id="navbar-example3" class="navbar navbar-light bg-light">
    <nav class="nav nav-pills flex-column">

        <?
        if (!empty($arResult["SECTION_TREE"][0])):?>
            <?=getTreeSection($arResult["SECTION_TREE"]);?>
        <?endif;?>
    </nav>
</nav>