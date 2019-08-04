<?php
/**
 * Created by PhpStorm.
 * User: sadim
 * Date: 02.08.2019
 * Time: 14:41
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title><?=$APPLICATION->ShowTitle()?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <?php $APPLICATION->ShowHead();?>
        <?php $APPLICATION->ShowPanel();?>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/products/">Продукция</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
