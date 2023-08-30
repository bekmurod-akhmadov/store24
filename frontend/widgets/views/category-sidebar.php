<!-- #primary -->
<div id="secondary" class="widget-area shop-sidebar" role="complementary">
    <div class="widget woocommerce widget_product_categories techmarket_widget_product_categories" id="techmarket_product_categories_widget-2">
        <ul class="product-categories ">
            <li class="product_cat">
                <span>Barcha Kategoriyalar</span>
                <ul>

                    <?php if (!empty($allCategories)): ?>
                    <?php foreach ($allCategories as $allCategory): ?>
                        <li class="cat-item">
                            <a href="<?=\yii\helpers\Url::to(['/product/category' , 'id' => $allCategory->id])?>">
                                <span class="no-child"></span><?=$allCategory->name?>
                            </a>
                        </li>
                    <?php endforeach;?>
                    <?php endif;?>

                </ul>
            </li>
        </ul>
    </div>
    <div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
        <span class="gamma widget-title">Filterlar</span>
        <div class="widget woocommerce widget_price_filter" id="woocommerce_price_filter-2">
            <p>
                <span class="gamma widget-title">Filter by price</span>
            <div class="price_slider_amount">
                <input id="amount" type="text" placeholder="Min price" data-min="6" value="33" name="min_price" style="display: none;">
                <button class="button" type="submit">Filter</button>
            </div>
            <div id="slider-range" class="price_slider"></div>
        </div>
        <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-2">
            <span class="gamma widget-title">Brands</span>
            <ul>
                <li class="wc-layered-nav-term ">
                    <a href="#">apple</a>
                    <span class="count">(2)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">bosch</a>
                    <span class="count">(1)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">cannon</a>
                    <span class="count">(1)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">connect</a>
                    <span class="count">(1)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">galaxy</a>
                    <span class="count">(3)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">gopro</a>
                    <span class="count">(1)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">kinova</a>
                    <span class="count">(1)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">samsung</a>
                    <span class="count">(1)</span>
                </li>
            </ul>
        </div>
        <!-- .woocommerce widget_layered_nav -->
        <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-3">
            <span class="gamma widget-title">Color</span>
            <ul>
                <li class="wc-layered-nav-term "><a href="#">Black</a>
                    <span class="count">(4)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Blue</a>
                    <span class="count">(4)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Green</a>
                    <span class="count">(5)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Orange</a>
                    <span class="count">(5)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Red</a>
                    <span class="count">(4)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                    <span class="count">(5)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Green</a>
                    <span class="count">(5)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Orange</a>
                    <span class="count">(5)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Red</a>
                    <span class="count">(4)</span>
                </li>
                <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                    <span class="count">(5)</span>
                </li>
            </ul>
        </div>
        <!-- .woocommerce widget_layered_nav -->
</div>
<!-- #secondary -->