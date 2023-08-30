<?php
$image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
?>
<div class="media">
    <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?=$image?>">
    <div class="media-body">
        <div class="product-info">
            <div class="yith-wcwl-add-to-wishlist">
                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Istaklarga qo'shish</a>
            </div>
            <!-- .yith-wcwl-add-to-wishlist -->
            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?=\yii\helpers\Url::to(['/product/view' , 'slug' => $model->slug])?>">
                <h2 class="woocommerce-loop-product__title"><?=$model->name?></h2>
                <div class="techmarket-product-rating">
                    <div title="Rated 5.00 out of 5" class="star-rating">
                        <span style="width:100%">
                            <strong class="rating">5.00</strong> out of 5</span>
                    </div>
                    <span class="review-count">(<?=$model->commentCount?>)</span>
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
                <?=\common\components\StaticFunctions::getPartOfText($model->description , 500)?>
            </div>
            <!-- .woocommerce-product-details__short-description -->
            <span class="sku_wrapper">SKU:
                <span class="sku"><?=$model->sku?></span>
            </span>
        </div>
        <!-- .product-info -->
        <div class="product-actions">
            <div class="availability">
                Availability:
                <p class="stock in-stock">1000 in stock</p>
            </div>
            <span class="price">
            <?php if ($model->discount == NULL ): ?>
                <span class="woocommerce-Price-amount amount" style="font-size:20px;">
                    <span  class="woocommerce-Price-currencySymbol"></span><?=number_format($model->price , '0' , ' ' , ' ')?> so'm
                </span>
            <?php else: ?>
                <ins style="font-size:20px">
                    <span class="amount"><?=number_format($model->discount , '0' , ' ' , ' ')?> so'm</span>
                </ins>
                <br>
                <del>
                    <span class="amount"><?=number_format($model->price , '0' , ' ' , ' ')?> so'm</span>
                </del>
            <?php endif; ?>
        </span>
            <!-- .price -->
            <a class="button add_to_cart_button" href="cart.html">Savatga</a>
            <a class="add-to-compare-link" href="compare.html">Taqqoslash</a>
        </div>
        <!-- .product-actions -->
    </div>
    <!-- .media-body -->
</div>
<!-- .media -->
