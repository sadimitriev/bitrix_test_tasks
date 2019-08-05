<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:05
 */

class productsList extends CBitrixComponent{

    public function getTreeLine($arr, $id) {
        $result = array();
        foreach ($arr[$id] as $item) :
            $resultById = $this->getTreeLine($arr, $item["ID"]);
            $result[$item["ID"]] = $item["ID"];
            $result = array_merge($result, $resultById);
        endforeach;
        return $result;
    }

    public function executeComponent(){
        CModule::IncludeModule("iblock");

        $CACHE_TIME = $this->arParams['CACHE_TIME'];
        $IBLOCK_ID = $this->arParams['IBLOCK_ID'];
        $SECTION = $this->arParams["CODE"];

        $cache = Bitrix\Main\Data\Cache::createInstance();

        if ($cache->initCache($CACHE_TIME, 'iblockCacheSection_'.$SECTION, '/iblockCache_' . $IBLOCK_ID)) :
            $this->arResult['ITEMS'] = $cache->getVars();
        elseif($cache->startDataCache()) :
            $cache->startDataCache();

            $arFilter = array(
                'IBLOCK_ID' => $IBLOCK_ID,
                'CODE' => $SECTION
            );
            $rsSect = CIBlockSection::GetList([],$arFilter);
            if ($arSect = $rsSect->GetNext()) :

                $items = array();
                $arFilter = array('IBLOCK_ID' => $IBLOCK_ID, 'ACTIVE' => 'Y');

                $arSelect = array();
                $rsSection = CIBlockSection::GetTreeList($arFilter, $arSelect);
                while($arSection = $rsSection->Fetch()) {
                    $parent = (!empty($arSection["IBLOCK_SECTION_ID"])) ? $arSection["IBLOCK_SECTION_ID"] : 0;
                    $result[$parent][] = $arSection;
                }

                $allSections = array(
                    $arSect["ID"]
                );
                $sectionsLine = $this->getTreeLine($result, $arSect["ID"]);

                $allSections = array_merge($allSections, $sectionsLine);

                $arFilterProducts = Array(
                    "IBLOCK_ID" => $IBLOCK_ID,
                    "ACTIVE" => "Y",
                    "IBLOCK_SECTION_ID" => $allSections
                );
                $res = CIBlockElement::GetList(
                    array("SORT"=>"ASC"),
                    $arFilterProducts,
                    array("ID", "NAME")
                );
                $count = $res->SelectedRowsCount();
                $idsForPrice = array();
                while($ar_fields = $res->GetNext()) :
                    $idsForPrice[] = $ar_fields["ID"];
                    $items[$ar_fields["ID"]]["NAME"] = $ar_fields["NAME"];
                endwhile;


                if ($idsForPrice) :
                    $db_res = CPrice::GetList(
                        array(),
                        array(
                            "PRODUCT_ID" => $idsForPrice
                        )
                    );
                    while ($ar_res = $db_res->Fetch()) :
                        $items[$ar_res["ID"]]["PRICE"] = $ar_res["PRICE"];
                    endwhile;
                endif;
            else:

            endif;
            $this->arResult['ITEMS'] = $items;
            $this->arResult['COUNT'] = $count;
            $cache->endDataCache($this->arResult['ITEMS']);
        endif;
        $this->includeComponentTemplate();
    }
}