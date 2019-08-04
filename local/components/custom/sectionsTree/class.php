<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:05
 */

class treeCatalogList extends CBitrixComponent{

    public function getSectionListTree($IBLOCK_ID) {
        $result = array();
        $arFilter = array('IBLOCK_ID' => $IBLOCK_ID, 'ACTIVE' => 'Y');

        $arSelect = array();
        $rsSection = CIBlockSection::GetTreeList($arFilter, $arSelect);
        while($arSection = $rsSection->Fetch()) {
            $parent = (!empty($arSection["IBLOCK_SECTION_ID"])) ? $arSection["IBLOCK_SECTION_ID"] : 0;
            $result[$parent][] = $arSection;
        }
        return $result;
    }

    public function executeComponent(){
        CModule::IncludeModule("iblock");

        $CACHE_TIME = $this->arParams['CACHE_TIME'];
        $IBLOCK_ID = $this->arParams['IBLOCK_ID'];

        $cache = Bitrix\Main\Data\Cache::createInstance();

        if ($cache->initCache($CACHE_TIME, 'iblockCache', '/iblockCache_' . $IBLOCK_ID)) :
            $this->arResult['SECTION_TREE'] = $cache->getVars();
        elseif($cache->startDataCache()) :
            $cache->startDataCache();
            $this->arResult['SECTION_TREE'] = $this->getSectionListTree($IBLOCK_ID);
            $cache->endDataCache($this->arResult['SECTION_TREE']);
        endif;
        $this->includeComponentTemplate();
    }
}