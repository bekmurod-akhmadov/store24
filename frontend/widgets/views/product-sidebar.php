<div id="secondary" class="widget-area shop-sidebar" role="complementary">
    <div id="techmarket_product_categories_widget-2" class="widget woocommerce widget_product_categories techmarket_widget_product_categories">
        <ul class="product-categories category-single">
            <li class="product_cat">
                <ul class="show-all-cat">
                    <li class="product_cat">
                        <span class="show-all-cat-dropdown">Barcha Kategoriyalar</span>
                        <ul>
                            <?php if (!empty($allCategories)): ?>
                            <?php foreach ($allCategories as $categoryItem): ?>
                            <li class="cat-item"><a href="<?=\yii\helpers\Url::to(['/product/category' , 'id' => $categoryItem->id])?>"><?=$categoryItem->name?></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                    </li>
                </ul>

            </li>
        </ul>
        <!-- .product-categories -->
    </div>
    <!-- .techmarket_widget_product_categories -->
    <div class="widget widget_techmarket_products_carousel_widget">
        <section id="single-sidebar-carousel" class="section-products-carousel">
            <header class="section-header">
                <h2 class="section-title">Chegirmadagi tovarlar</h2>
                <nav class="custom-slick-nav"></nav>
            </header>
            <!-- .section-header -->
            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                <div class="container-fluid">
                    <div class="woocommerce columns-1">
                        <div class="products">
                            <?php if (!empty($newProducts)): ?>
                                <?php foreach ($newProducts as $newProduct): ?>
                                    <?php
                                        $image = \common\components\StaticFunctions::getImage($newProduct , 'product' , 'image');
                                    ?>
                                    <div class="landscape-product-widget product">
                                        <a class="woocommerce-LoopProduct-link" href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $newProduct->slug])?>">
                                            <div class="media">
                                                <img class="wp-post-image" src="<?=$image?>" alt="product-image">
                                                <div class="media-body">
                                                    <span class="price">
                                                        <ins>
                                                            <span class="amount"><?=number_format($newProduct->discount , '0' , ' ' , ' ')?> so'm</span>
                                                        </ins>
                                                        <br>
                                                        <del>
                                                            <span class="amount"><?=number_format($newProduct->price , '0' , ' ' , ' ')?> so'm</span>
                                                        </del>
                                                    </span>
                                                    <!-- .price -->
                                                    <h2 class="woocommerce-loop-product__title"><?=$newProduct->name?></h2>
                                                    <div class="techmarket-product-rating">
                                                        <div title="Rated 0 out of 5" class="star-rating">
                                                            <span style="width:0%">
                                                                <strong class="rating">0</strong> out of 5
                                                        </span>
                                                    </div>
                                                        <span class="review-count">(0)</span>
                                                    </div>
                                                    <!-- .techmarket-product-rating -->
                                                </div>
                                                <!-- .media-body -->
                                            </div>
                                            <!-- .media -->
                                        </a>
                                        <!-- .woocommerce-LoopProduct-link -->
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                        <!-- .products -->
                    </div>
                    <!-- .woocommerce -->
                </div>
                <!-- .container-fluid -->
            </div>
            <!-- .products-carousel -->
        </section>
        <!-- .section-products-carousel -->
    </div>
    <!-- .widget_techmarket_products_carousel_widget -->
</div>