<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 15:05
 */

class ProductsComponent extends CBitrixComponent{
    public function executeComponent(){
        $templatePage = 'sectionsTree';

        if (!empty($_REQUEST["CODE"])) :
            $templatePage = 'products';
        endif;

        $this->includeComponentTemplate($templatePage);
    }
}
?>