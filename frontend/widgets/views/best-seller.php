<section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
    <div class="section-products-carousel-tabs-wrap">
        <header class="section-header">
            <h2 class="section-title">Eng ko'p sotilganlar</h2>
            <ul role="tablist" class="nav justify-content-end tab_titles">
                <?php if (!empty($brands)): ?>
                <?php foreach ($brands as $brand): ?>
                    <li class="nav-item"><a class="nav-link" href="#tab-<?=$brand->id?>" data-toggle="tab"><?=$brand->name?></a></li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </header>
        <!-- .section-header -->
        <div class="tab-content">
            <?php if (!empty($brands)): ?>
            <?php foreach ($brands as $brand): ?>
            <div id="tab-<?=$brand->id?>" class="tab-pane" role="tabpanel">
                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                    <div class="container-fluid">
                        <div class="woocommerce">
                            <div class="products">
                                <?php if (!empty($brand->products)): ?>
                                <?php foreach ($brand->products as $model): ?>
                                <?php
                                    $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
                                ?>
                                <div class="product">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <a href="#" rel="nofollow" class="add_to_wishlist"> Istaklarga qo'shish</a>
                                    </div>
                                    <a href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $model->slug])?>" class="woocommerce-LoopProduct-link">
                                        <img src="<?=$image?>" width="224" height="197" class="wp-post-image" alt="">
                                        <span class="price">
                                            <ins>
                                                <span class="amount"> </span>
                                            </ins>
                                            <span class="amount"><?=number_format($model->price , '0' , ' ' , ' ')?> so'm</span>
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
                    <!-- .container-fluid -->
                </div>
                <!-- .products-carousel -->
            </div>
            <!-- .tab-pane -->
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- .tab-content -->
    </div>
    <!-- .section-products-carousel-tabs-wrap -->
</section>


<script>
    let tabTitle = document.querySelector(".tab_titles");
    let firstChild = tabTitle.firstElementChild;
    let firstTab = document.querySelector(".tab-content");
    firstTab.firstElementChild.classList.add('active');
    firstChild.firstElementChild.classList.add('active');
</script>