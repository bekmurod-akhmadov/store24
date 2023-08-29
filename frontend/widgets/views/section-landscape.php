<section class="section-landscape-products-carousel 4-column-landscape-carousel" id="landscape-products-carousel">
    <header class="section-header">
        <h2 class="section-title">Kompyuter aksessuarlari va extiyot qismlari</h2>
        <nav class="custom-slick-nav"></nav>
    </header>
    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#landscape-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}}]}">
        <div class="container-fluid">
            <div class="woocommerce columns-5">
                <div class="products">
                    <?php if (!empty($models)): ?>
                        <?php foreach ($models as $model): ?>
                        <?php $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image')?>
                        <div class="landscape-product product">
                            <a class="woocommerce-LoopProduct-link" href="single-product-fullwidth.html">
                                <div class="media">
                                    <img class="wp-post-image" src="<?=$image?>" alt="">
                                    <div class="media-body">
                                        <span class="price">
                                            <ins>
                                                <span class="amount"> </span>
                                            </ins>
                                            <span class="amount"> $500</span>
                                        </span>
                                        <!-- .price -->
                                        <h2 class="woocommerce-loop-product__title">Headset 3D Glasses VR for Android</h2>
                                        <div class="techmarket-product-rating">
                                            <div title="Rated 0 out of 5" class="star-rating">
                                                                                <span style="width:0%">
                                                                                    <strong class="rating">0</strong> out of 5</span>
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
                        <!-- .landscape-product -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.woocommerce -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.products-carousel -->
</section>