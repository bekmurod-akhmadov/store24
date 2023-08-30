<section class="section-top-categories section-categories-carousel" id="categories-carousel-1">
    <header class="section-header">
        <h4 class="pre-title">Tanlangan</h4>
        <h2 class="section-title">Top Kategoriyalar</h2>
        <nav class="custom-slick-nav"></nav>
        <!-- .custom-slick-nav -->
        <a class="readmore-link" href="<?=\yii\helpers\Url::to(['/product/categories'])?>">Barcha Kategoriyalar</a>
    </header>
    <!-- .section-header -->
    <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-1 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
        <div class="woocommerce columns-5">
            <div class="products">

                <?php if (!empty($models)): ?>

                    <?php foreach ($models as $model): ?>
                        <?php
                            $image = \common\components\StaticFunctions::getImage($model , 'category' , 'image');
                        ?>
                        <!-- .product-category -->
                        <div class="product-category product">
                            <a href="<?=\yii\helpers\Url::to(['/product/by-cat' , 'id' => $model->id])?>">
                                <img style="width:224px;height:197px;object-fit: cover;" alt="Audio &amp; Music" src="<?=$image?>">
                                <h2 class="woocommerce-loop-category__title">
                                    <?=$model->name?>
                                </h2>
                            </a>
                        </div>
                        <!-- .product-category -->
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
            <!-- .products -->
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .product-categories-carousel -->
</section>
<!-- .section-categories-carousel -->