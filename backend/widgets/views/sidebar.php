<?php
   $uri = $_SERVER['REQUEST_URI'];
   $arr = explode('/' , $uri);
   $action = $arr[1];
?>
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="<?=\yii\helpers\Url::home()?>"> <?=  \yii\helpers\Html::img('img/logo1.png');?>
        </div>
    </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item sidebar-nav-item <?=in_array($action , ['product' , 'category' , 'brand']) ? 'active' : ''?>">
                <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Tovarlar</span></a>
                <ul class="nav sub-group-menu menu-open" style="display:<?=in_array($action , ['product' , 'category' , 'brand']) ? 'block' : 'none'?>">
                    <li class="nav-item">
                        <a href="<?=\yii\helpers\Url::to(['product/index'])?>" class="nav-link"><i class="fas fa-angle-right"></i>Tovarlar</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=\yii\helpers\Url::to(['category/index'])?>" class="nav-link"><i class="fas fa-angle-right"></i>Kategoriyalar</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=\yii\helpers\Url::to(['brand/index'])?>" class="nav-link"><i class="fas fa-angle-right"></i>Brandlar</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item sidebar-nav-item <?=in_array($action , ['order' , 'customer']) ? 'active' : ''?>">
                <a href="#" class="nav-link"><i class="fas fa-tags"></i><span>Buyurtmalar</span></a>
                <ul class="nav sub-group-menu menu-open" style="display:<?=in_array($action , ['order' , 'customer']) ? 'block' : 'none'?>">
                    <li class="nav-item">
                        <a href="<?=\yii\helpers\Url::to(['order/index'])?>" class="nav-link"><i class="fas fa-angle-right"></i>Buyurtmalar tarixi</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?=\yii\helpers\Url::to(['customer/index'])?>" class="nav-link"><i class="fas fa-angle-right"></i>Mijozlar</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/social/index'])?>" class="nav-link"><i class="fas fa-share-alt"></i><span>Ijtimoiy tarmoqlar</span></a>
            </li>

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/banner/index'])?>" class="nav-link"><i class="fas fa-rectangle-ad"></i><span>Bannerlar</span></a>
            </li>

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/product-comment/index'])?>" class="nav-link"><i class="fas fa-comment"></i><span>Izohlar</span></a>
            </li>

        </ul>
    </div>
</div>