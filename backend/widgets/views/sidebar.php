<?php
   $uri = $_SERVER['REQUEST_URI'];
   $arr = explode('/' , $uri);
   $action = $arr[1];
?>
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="<?=\yii\helpers\Url::home()?>"><img src="/img/logo1.png" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item sidebar-nav-item <?=$action == 'student' ? 'active' : ''?>">
                <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Tovarlar</span></a>
                <ul class="nav sub-group-menu menu-open" style="display:<?=$action == 'student' ? 'block' : 'none'?>">
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

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/testimonial/index'])?>" class="nav-link"><i class="fas fa-comment"></i><span>Izohlar</span></a>
            </li>

        </ul>
    </div>
</div>