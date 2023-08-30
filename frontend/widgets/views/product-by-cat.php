<section class="stretch-full-width section-products-carousel-with-vertical-tabs">
    <header class="section-header">
        <h2 class="section-title">
            <strong>Tovarlar Kategoriya bo'yicha</h2>
    </header>
    <!-- /.section-header -->
    <div class="products-carousel-with-vertical-tabs row">
        <ul role="tablist" class="nav " id="tab_titles">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#<?=$category->id?>" data-toggle="tab">
                            <span class="category-title">
                                 <?=$category->name?>
                            </span>
                            <i class="tm tm-arrow-right"></i>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <div style="background-size: cover; background-position: center center; background-image: url(/images/default/bg-pr.png ); height: 552px;" class="tab-content" id="tab_content">
            <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <div id="<?=$category->id?>" class="tab-pane " role="tabpanel">
                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                        <div class="container-fluid">
                            <div class="woocommerce columns-5">
                                <div class="products">

                                    <?php if (!empty($category->childProducts)): ?>
                                    <?php foreach ($category->childProducts as $item): ?>
                                    <?php
                                        $image = \common\components\StaticFunctions::getImage($item , 'product' , 'image');
                                    ?>
                                    <div class="product">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="#" rel="nofollow" class="add_to_wishlist">Istaklarga qo'shish</a>
                                        </div>
                                        <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $item->slug])?>" class="woocommerce-LoopProduct-link">
                                            <img src="<?=$image?>" width="224" height="197" class="wp-post-image" alt="">
                                            <span class="price">
                                                <ins>
                                                    <span class="amount"> </span>
                                                </ins>
                                                <span class="amount"><?=number_format($item->price , '0' , ' ',' ')?> so'm</span>
                                            </span>
                                            <!-- /.price -->
                                            <h2 class="woocommerce-loop-product__title"><?=$item->name?></h2>
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
                            <!-- .woocommerce-->
                        </div>
                        <!-- .container-fluid -->
                    </div>
                    <!-- .products-carousel -->
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <!-- .tab-pane -->
        </div>
        <!-- .tab-content -->
    </div>
    <!-- /.products-carousel-with-vertical-tabs -->
</section>
<script>
   document.querySelector("#tab_titles").firstElementChild.firstElementChild.classList.add('active');
   document.querySelector("#tab_content").firstElementChild.classList.add('active');
</script>