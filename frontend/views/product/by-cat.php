<?php
    $this->title = $mainCategory->name;
?>
<nav class="woocommerce-breadcrumb">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <span class="delimiter">
        <i class="tm tm-breadcrumbs-arrow-right"></i>
        <span style="font-size:15px;font-weight: 500;"><?=!empty($mainCategory) ? $mainCategory->name : ""?></span>
    </span>
</nav>
<section class="section-product-categories">
    <header class="section-header">
        <h1 class="woocommerce-products-header__title page-title"><?=$mainCategory->name?></h1>
    </header>
    <div class="woocommerce columns-5">
        <div class="product-loop-categories">
            <?php if (!empty($models)): ?>
            <?php foreach ($models as $model): ?>
            <?php
                $image = \common\components\StaticFunctions::getImage($model , 'category' , 'image')
            ?>
            <div class="product-category product first">
                <a href="<?=\yii\helpers\Url::to(['/product/category' , 'id' => $model->id])?>">
                    <img src="<?=$image?>" alt="Ultrabooks" width="224" height="197">
                    <h2 class="woocommerce-loop-category__title"> <?=$model->name?>
                        <mark class="count">(5)</mark>
                    </h2>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- .product-loop-categories -->
    </div>
    <!-- .woocommerce -->
</section>

<!-- .section-products-carousel -->
<section class="section-products-carousel new-arrival-carousel" id="section-products-carousel-7">
    <header class="section-header">
        <h2 class="section-title">Eng yangi qo'shilgan tovarlar</h2>
        <nav class="custom-slick-nav"></nav>
    </header>
    <!-- .section-header -->
    <div class="products-carousel 7-column-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#section-products-carousel-7 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:650,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
        <div class="container-fluid">
            <div class="woocommerce columns-7">
                <div class="products">
                    <?php if (!empty($newProducts)): ?>
                        <?php foreach ($newProducts as $model): ?>
                            <?php
                            $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
                            ?>
                            <div class="product">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Istaklarga qo'shish</a>
                                </div>
                                <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $model->slug])?>" class="woocommerce-LoopProduct-link">
                                    <img src="<?=$image?>" width="224" height="197" class="wp-post-image" alt="">
                                    <span class="price" style="font-size:12px;">
                                           <?php if ($model->discount == NULL ): ?>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"></span><?=number_format($model->price , '0' , ' ' , ' ')?>
                                                </span>
                                           <?php else: ?>
                                                <ins>
                                                    <span class="amount"><?=number_format($model->discount , '0' , ' ' , ' ')?> so'm</span>
                                                </ins>
                                                <br>
                                                <del>
                                                    <span class="amount"><?=number_format($model->price , '0' , ' ' , ' ')?> so'm</span>
                                                </del>
                                           <?php endif; ?>
                                    </span>
                                    <!-- /.price -->
                                    <h2 class="woocommerce-loop-product__title"><?=$model->name?></h2>
                                </a>
                                <div class="hover-area">
                                    <a class="button add_to_cart_button" href="#" rel="nofollow">Savatga</a>
                                    <a class="add-to-compare-link" href="#">Taqqoslash</a>
                                </div>
                            </div>
                            <!-- /.product-outer -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- .woocommerce -->
        </div>
        <!-- .row -->
    </div>
    <!-- .products-carousel -->
</section>
<!-- .section-products-carousel -->