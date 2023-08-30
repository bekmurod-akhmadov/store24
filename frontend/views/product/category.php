<?php
    $this->title = $mainCategory ->name;
?>
<nav class="woocommerce-breadcrumb mb-0">
    <a href="<?=\yii\helpers\Url::home()?>">Asosiy</a>
    <i class="tm tm-breadcrumbs-arrow-right"></i>
    <?php if (isset($parentCategory)): ?>
    <a href="<?=\yii\helpers\Url::to(['/product/by-cat' , 'id' => $parentCategory->id])?>"><?=$parentCategory->name?></a>
    <i class="tm tm-breadcrumbs-arrow-right"></i>
    <?php endif; ?>
    <span class="delimiter">
        <span style="font-size:15px;font-weight: 500;"><?=!empty($mainCategory) ? $mainCategory ->name : ""?></span>
    </span>
</nav>

<!-- .shop-archive-header -->
<div class="shop-control-bar">
    <div class="handheld-sidebar-toggle">
        <button type="button" class="btn sidebar-toggler">
            <i class="fa fa-sliders"></i>
            <span>Filters</span>
        </button>
    </div>
    <!-- .handheld-sidebar-toggle -->
    <ul role="tablist" class="shop-view-switcher nav nav-tabs" id="tablist">
        <li class="nav-item">
            <a href="#grid-extended" title="Grid Extended View" data-toggle="tab" class="nav-link ">
                <i class="tm tm-grid"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="#list-view-large" title="List View Large" data-toggle="tab" class="nav-link ">
                <i class="tm tm-listing-large"></i>
            </a>
        </li>
    </ul>
    <!-- .shop-view-switcher -->
<!--    <form class="form-techmarket-wc-ppp" method="POST">-->
<!--        <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp">-->
<!--            <option value="20">Show 20</option>-->
<!--            <option value="40">Show 40</option>-->
<!--            <option value="-1">Show All</option>-->
<!--        </select>-->
<!--        <input type="hidden" value="5" name="shop_columns">-->
<!--        <input type="hidden" value="15" name="shop_per_page">-->
<!--        <input type="hidden" value="right-sidebar" name="shop_layout">-->
<!--    </form>-->
    <!-- .form-techmarket-wc-ppp -->
    <!-- .woocommerce-ordering -->
    <nav class="techmarket-advanced-pagination">
        <form class="form-adv-pagination" method="post">
            <input type="number" value="1" class="form-control" step="1" max="5" min="1" size="2" id="goto-page">
        </form> of 5<a href="#" class="next page-numbers">→</a>
    </nav>
    <!-- .techmarket-advanced-pagination -->
</div>
<!-- .shop-control-bar -->
<div class="tab-content" id="tab_content">
    <div id="grid-extended" class="tab-pane" role="tabpanel">
        <div class="woocommerce columns-5">

                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dateProvider,
                    'itemView' => '_category',
                    'options' => ['class' => 'products' , 'id' => 'prducts_block'], // Удаляем класс list-view
                    'layout' => "{items}\n{summary}\n{pager}",
                    'itemOptions' => function ($model, $key, $index, $widget) {
                        return ['class' => 'product first']; // Указываем класс элемента и убираем атрибут data-key
                    },
                    'summaryOptions' => ['class' => 'summary mt-4'],
                    'pager' => [
                        'options' => ['class' => 'page-numbers mt-4'], // Добавьте класс к пагинации
                        'linkOptions' => ['class' => 'page-numbers current'],
                    ],
                ])
                ?>

        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .tab-pane -->
    <div id="list-view-large" class="tab-pane" role="tabpanel">
        <div class="woocommerce columns-1">
            <div class="products">
                <div class="product list-view-large first ">
                    <div class="media">
                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="/images/products/1.jpg">
                        <div class="media-body">
                            <div class="product-info">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                </div>
                                <!-- .yith-wcwl-add-to-wishlist -->
                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                    <div class="techmarket-product-rating">
                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span style="width:100%">
                                                                                <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review-count">(1)</span>
                                    </div>
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                                <div class="brand">
                                    <a href="#">
                                        <img alt="galaxy" src="/images/brands/5.png">
                                    </a>
                                </div>
                                <!-- .brand -->
                                <div class="woocommerce-product-details__short-description">
                                    <ul>
                                        <li>CUJO smart firewall brings business-level Internet security to protect all of your home devices</li>
                                        <li>Internet Security: Guard your network and smart devices against hacks, malware, and cyber threats</li>
                                        <li>Mobile App: Monitor your wired and wireless network activity with a sleek iPhone or Android app</li>
                                        <li>CUJO connects to your wireless router with an ethernet cable. CUJO is not compatible with Luma and does not support Google Wifi Mesh. CUJO works with Eero in Bridge mode.</li>
                                    </ul>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <span class="sku_wrapper">SKU:
                                                                    <span class="sku">5487FB8/13</span>
                                                                </span>
                            </div>
                            <!-- .product-info -->
                            <div class="product-actions">
                                <div class="availability">
                                    Availability:
                                    <p class="stock in-stock">1000 in stock</p>
                                </div>
                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                                </span>
                                <!-- .price -->
                                <a class="button add_to_cart_button" href="cart.html">Add to Cart</a>
                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .product -->
                <div class="product list-view-large ">
                    <div class="media">
                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="/images/products/2.jpg">
                        <div class="media-body">
                            <div class="product-info">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                </div>
                                <!-- .yith-wcwl-add-to-wishlist -->
                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                    <div class="techmarket-product-rating">
                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span style="width:100%">
                                                                                <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review-count">(1)</span>
                                    </div>
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                                <div class="brand">
                                    <a href="#">
                                        <img alt="galaxy" src="/images/brands/5.png">
                                    </a>
                                </div>
                                <!-- .brand -->
                                <div class="woocommerce-product-details__short-description">
                                    <ul>
                                        <li>CUJO smart firewall brings business-level Internet security to protect all of your home devices</li>
                                        <li>Internet Security: Guard your network and smart devices against hacks, malware, and cyber threats</li>
                                        <li>Mobile App: Monitor your wired and wireless network activity with a sleek iPhone or Android app</li>
                                        <li>CUJO connects to your wireless router with an ethernet cable. CUJO is not compatible with Luma and does not support Google Wifi Mesh. CUJO works with Eero in Bridge mode.</li>
                                    </ul>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <span class="sku_wrapper">SKU:
                                                                    <span class="sku">5487FB8/13</span>
                                                                </span>
                            </div>
                            <!-- .product-info -->
                            <div class="product-actions">
                                <div class="availability">
                                    Availability:
                                    <p class="stock in-stock">1000 in stock</p>
                                </div>
                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                                </span>
                                <!-- .price -->
                                <a class="button add_to_cart_button" href="cart.html">Add to Cart</a>
                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .product -->
                <div class="product list-view-large ">
                    <div class="media">
                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="/images/products/3.jpg">
                        <div class="media-body">
                            <div class="product-info">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                </div>
                                <!-- .yith-wcwl-add-to-wishlist -->
                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                    <div class="techmarket-product-rating">
                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span style="width:100%">
                                                                                <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review-count">(1)</span>
                                    </div>
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                                <div class="brand">
                                    <a href="#">
                                        <img alt="galaxy" src="/images/brands/5.png">
                                    </a>
                                </div>
                                <!-- .brand -->
                                <div class="woocommerce-product-details__short-description">
                                    <ul>
                                        <li>CUJO smart firewall brings business-level Internet security to protect all of your home devices</li>
                                        <li>Internet Security: Guard your network and smart devices against hacks, malware, and cyber threats</li>
                                        <li>Mobile App: Monitor your wired and wireless network activity with a sleek iPhone or Android app</li>
                                        <li>CUJO connects to your wireless router with an ethernet cable. CUJO is not compatible with Luma and does not support Google Wifi Mesh. CUJO works with Eero in Bridge mode.</li>
                                    </ul>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <span class="sku_wrapper">SKU:
                                                                    <span class="sku">5487FB8/13</span>
                                                                </span>
                            </div>
                            <!-- .product-info -->
                            <div class="product-actions">
                                <div class="availability">
                                    Availability:
                                    <p class="stock in-stock">1000 in stock</p>
                                </div>
                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                                </span>
                                <!-- .price -->
                                <a class="button add_to_cart_button" href="cart.html">Add to Cart</a>
                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .product -->
                <div class="product list-view-large ">
                    <div class="media">
                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="/images/products/4.jpg">
                        <div class="media-body">
                            <div class="product-info">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                </div>
                                <!-- .yith-wcwl-add-to-wishlist -->
                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                    <div class="techmarket-product-rating">
                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span style="width:100%">
                                                                                <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review-count">(1)</span>
                                    </div>
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                                <div class="brand">
                                    <a href="#">
                                        <img alt="galaxy" src="/images/brands/5.png">
                                    </a>
                                </div>
                                <!-- .brand -->
                                <div class="woocommerce-product-details__short-description">
                                    <ul>
                                        <li>CUJO smart firewall brings business-level Internet security to protect all of your home devices</li>
                                        <li>Internet Security: Guard your network and smart devices against hacks, malware, and cyber threats</li>
                                        <li>Mobile App: Monitor your wired and wireless network activity with a sleek iPhone or Android app</li>
                                        <li>CUJO connects to your wireless router with an ethernet cable. CUJO is not compatible with Luma and does not support Google Wifi Mesh. CUJO works with Eero in Bridge mode.</li>
                                    </ul>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <span class="sku_wrapper">SKU:
                                                                    <span class="sku">5487FB8/13</span>
                                                                </span>
                            </div>
                            <!-- .product-info -->
                            <div class="product-actions">
                                <div class="availability">
                                    Availability:
                                    <p class="stock in-stock">1000 in stock</p>
                                </div>
                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                                </span>
                                <!-- .price -->
                                <a class="button add_to_cart_button" href="cart.html">Add to Cart</a>
                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .product -->
                <div class="product list-view-large last">
                    <div class="media">
                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="/images/products/5.jpg">
                        <div class="media-body">
                            <div class="product-info">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                </div>
                                <!-- .yith-wcwl-add-to-wishlist -->
                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                    <div class="techmarket-product-rating">
                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span style="width:100%">
                                                                                <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review-count">(1)</span>
                                    </div>
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                                <div class="brand">
                                    <a href="#">
                                        <img alt="galaxy" src="/images/brands/5.png">
                                    </a>
                                </div>
                                <!-- .brand -->
                                <div class="woocommerce-product-details__short-description">
                                    <ul>
                                        <li>CUJO smart firewall brings business-level Internet security to protect all of your home devices</li>
                                        <li>Internet Security: Guard your network and smart devices against hacks, malware, and cyber threats</li>
                                        <li>Mobile App: Monitor your wired and wireless network activity with a sleek iPhone or Android app</li>
                                        <li>CUJO connects to your wireless router with an ethernet cable. CUJO is not compatible with Luma and does not support Google Wifi Mesh. CUJO works with Eero in Bridge mode.</li>
                                    </ul>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <span class="sku_wrapper">SKU:
                                                                    <span class="sku">5487FB8/13</span>
                                                                </span>
                            </div>
                            <!-- .product-info -->
                            <div class="product-actions">
                                <div class="availability">
                                    Availability:
                                    <p class="stock in-stock">1000 in stock</p>
                                </div>
                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                                </span>
                                <!-- .price -->
                                <a class="button add_to_cart_button" href="cart.html">Add to Cart</a>
                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .product -->
                <div class="product list-view-large first ">
                    <div class="media">
                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="/images/products/6.jpg">
                        <div class="media-body">
                            <div class="product-info">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                </div>
                                <!-- .yith-wcwl-add-to-wishlist -->
                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="single-product-fullwidth.html">
                                    <h2 class="woocommerce-loop-product__title">60UH6150 60-Inch 4K Ultra HD Smart LED TV</h2>
                                    <div class="techmarket-product-rating">
                                        <div title="Rated 5.00 out of 5" class="star-rating">
                                                                            <span style="width:100%">
                                                                                <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                        <span class="review-count">(1)</span>
                                    </div>
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                                <div class="brand">
                                    <a href="#">
                                        <img alt="galaxy" src="/images/brands/5.png">
                                    </a>
                                </div>
                                <!-- .brand -->
                                <div class="woocommerce-product-details__short-description">
                                    <ul>
                                        <li>CUJO smart firewall brings business-level Internet security to protect all of your home devices</li>
                                        <li>Internet Security: Guard your network and smart devices against hacks, malware, and cyber threats</li>
                                        <li>Mobile App: Monitor your wired and wireless network activity with a sleek iPhone or Android app</li>
                                        <li>CUJO connects to your wireless router with an ethernet cable. CUJO is not compatible with Luma and does not support Google Wifi Mesh. CUJO works with Eero in Bridge mode.</li>
                                    </ul>
                                </div>
                                <!-- .woocommerce-product-details__short-description -->
                                <span class="sku_wrapper">SKU:
                                                                    <span class="sku">5487FB8/13</span>
                                                                </span>
                            </div>
                            <!-- .product-info -->
                            <div class="product-actions">
                                <div class="availability">
                                    Availability:
                                    <p class="stock in-stock">1000 in stock</p>
                                </div>
                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                                </span>
                                <!-- .price -->
                                <a class="button add_to_cart_button" href="cart.html">Add to Cart</a>
                                <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                            </div>
                            <!-- .product-actions -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .product -->
            </div>
            <!-- .products -->
        </div>
        <!-- .woocommerce -->
    </div>

</div>
<!-- .tab-content -->
<div class="shop-control-bar-bottom">

    <nav class="woocommerce-pagination">
        <ul class="page-numbers">
            <li>
                <span class="page-numbers current">1</span>
            </li>
            <li><a href="#" class="page-numbers">2</a></li>
            <li><a href="#" class="page-numbers">3</a></li>
            <li><a href="#" class="page-numbers">4</a></li>
            <li><a href="#" class="page-numbers">5</a></li>
            <li><a href="#" class="next page-numbers">→</a></li>
        </ul>
        <!-- .page-numbers -->
    </nav>
    <!-- .woocommerce-pagination -->
</div>
<!-- .shop-control-bar-bottom -->

<script>
    document.querySelector("#tablist").firstElementChild.firstElementChild.classList.add('active');
    document.querySelector("#tab_content").firstElementChild.classList.add('active');
</script>