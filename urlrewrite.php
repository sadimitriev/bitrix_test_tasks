<?php
$arUrlRewrite = array(
  1 =>
  array (
    'CONDITION' => '#^/products/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'CODE=$1',
    'ID' => NULL,
    'PATH' => '/products/index.php',
    'SORT' => 100,
  )
);
